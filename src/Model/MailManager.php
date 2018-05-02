<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 02/05/18
 * Time: 15:00
 */

namespace Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class MailManager
{
    //Info to be return (array)
    private $return;

    /**
     * Get one row from database by ID.
     *
     * @param  string $sender
     * @param  string $subject
     * @param  string $mailBody
     *
     * @return array
     */
    public function sendMail($sender, $subject, $mailBody)
    {
        //Vérification de l'intégrité du champ email
        if (!empty($sender)) {
            if (!filter_var($sender, FILTER_VALIDATE_EMAIL)) {
                $this->return['emailForm']['error'] = '- Veuillez entrer une adresse email valide.<br>';
            }
        } else {
            $this->return['emailForm']['error'] =
                '- Vous devez entrer une adresse email pour pouvoir être contacté par l\'équipe en retour.<br>';
        }

        //Vérification du contenu du message
        if (empty($mailBody)) {
            $this->return['emailForm']['error'] =
                $this->return['emailForm']['error'] . '- Veuillez taper un message à envoyer.<br>';
        }

        // S'il n'y a pas d'erreur d'intégrité, on peut envoyer le message
        if (empty($this->return['emailForm']['error'])) {


            $mail = new PHPMailer(false);               // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = MAIL_ADDR;                          // SMTP username
                $mail->Password = MAIL_PWD;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom(MAIL_ADDR, $sender);
                $mail->addAddress(MAIL_ADDR);
                $mail->addReplyTo($sender);

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "From $sender - $subject";
                $mail->Body = $mailBody;

                //Envoyer l'email
                $mail->send();
                $this->return['sendEmail'] = 'successful';
            } catch (Exception $e) {
                $this->return['sendEmail'] = $mail->ErrorInfo;
            } catch (\Exception $e) { //The leading slash means the Global PHP Exception class will be caught
                $this->return['sendEmail'] = $e->getMessage(); //Boring error messages from anything else!
            }
        } else { // Sinon on retourne sur le formulaire en renvoyant les champs à préremplir.

            $this->return['emailForm']['email'] = (isset($sender)) ? $sender : "";
            $this->return['emailForm']['content'] = (isset($mailBody)) ? $mailBody : "";
            $this->return['emailForm']['subject'] = $subject;
        }
        return $this->return;
    }

}