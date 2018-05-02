<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\ContactManager;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class ContactController
 *
 */
class ContactController extends AbstractController
{

    /**
     * Display contact page
     *
     * @return string
     */
    public function index()
    {
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";
        $contactManager = new ContactManager();
        $contactInfo = $contactManager->selectAll();
        //Récupère l'adresse email pour préremplir le formulaire
        $email = ((isset($_SESSION['emailForm']['email'])) ? $_SESSION['emailForm']['email'] : "");
        //Récupère le corps du mail pour préremplir le formulaire
        $content = ((isset($_SESSION['emailForm']['content'])) ? $_SESSION['emailForm']['content'] : "");
        //Récupère le sujet pour préremplir le formulaire
        $subject = ((isset($_SESSION['emailForm']['subject'])) ? $_SESSION['emailForm']['subject'] : "");
        //Récupère le message d'erreur
        $error = ((isset($_SESSION['emailForm']['error'])) ? $_SESSION['emailForm']['error'] : "");
        //Récupère l'état de l'envoi
        $sendEmail = ((isset($_SESSION['sendEmail'])) ? $_SESSION['sendEmail'] : "");
        //Détruit les variables de session en lien avec le formulaire.
        unset($_SESSION['emailForm']);
        unset($_SESSION['sendEmail']);
        return $this->twig->render(
            'Contact/contact.html.twig',
            [
                'contactInfo' => $contactInfo,
                'email' => $email,
                'content' => $content,
                'subject' => $subject,
                'error' => $error,
                'sendEmail' => $sendEmail,
                'admin' => $admin,
                'thisSeason' => SEASON
            ]
        );
    }

    /**
     * Send email
     *
     * @return string
     */
    public function sendMail()
    {
        $error = "";
        //Vérification de l'intégrité du champ email
        if (!empty($_POST['email'])) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error = '- Veuillez entrer une adresse email valide.<br>';
            }
        } else {
            $error = '- Vous devez entrer une adresse email pour pouvoir être contacté par l\'équipe en retour.<br>';
        }

        //Vérification du contenu du message
        if (empty($_POST['content'])) {
            $error = $error . '- Veuillez taper un message à envoyer.<br>';
        }

        // S'il n'y a pas d'erreur d'intégrité, on peut envoyer le message
        if (empty($error)) {
            //Récupération du contenu du formulaire
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $content = $_POST['content'];


            $mail = new PHPMailer(false);               // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = MAIL_ADDR;                          // SMTP username
                $mail->Password = MAIL_PWD;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom(MAIL_ADDR, $email);
                $mail->addAddress(MAIL_ADDR);
                $mail->addReplyTo($email);

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'From ' . $email . ' - ' . $subject;
                $mail->Body = $content;

                //Envoyer l'email
                $mail->send();
                $_SESSION['sendEmail'] = 'successful';
            } catch (Exception $e) {
                $_SESSION['sendEmail'] = $mail->ErrorInfo;
            } catch (\Exception $e) { //The leading slash means the Global PHP Exception class will be caught
                $_SESSION['sendEmail'] = $e->getMessage(); //Boring error messages from anything else!
            }
        } else { // Sinon on retourne sur le formulaire en renvoyant les champs à préremplir.
            if (isset($_POST['email'])) {
                $_SESSION['emailForm']['email'] = $_POST['email'];
            }
            if (isset($_POST['content'])) {
                $_SESSION['emailForm']['content'] = $_POST['content'];
            }
            $_SESSION['emailForm']['subject'] = $_POST['subject'];
            $_SESSION['emailForm']['error'] = $error;
        }
        header('location: /contact');
    }


    /**
     * Display successful page
     *
     * @return string
     */
    public function successful()
    {
        return $this->twig->render('Contact/successful.html.twig');
    }

    /**
     * Contact editor
     *
     * @return string
     */
    public function edit()
    {

        if(!isset($_SESSION['admin'])){
            header('Location: /contact');
        }
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";
        $contactManager = new ContactManager();
        if(!empty($_POST)){
            $id = $_POST['id'];
            $data = [
                'content' => $_POST['content'],

            ];
            $contactManager->update($id, $data);
            header('Location: /contact');
        }
        $contacts = $contactManager->selectAll();

        return $this->twig->render(
            'Contact/edit.html.twig',
            [
                'contacts' => $contacts,
                'admin' => $admin
            ]
        );

    }


}
