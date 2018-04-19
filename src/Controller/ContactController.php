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
require_once __DIR__ . '/../../vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__ . '/../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../../vendor/phpmailer/phpmailer/src/SMTP.php';
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
        $contactManager = new ContactManager();
        $contactInfo = $contactManager->selectAll();
        return $this->twig->render('Contact/contact.html.twig',
            [
                'contactInfo' => $contactInfo
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
        if (!empty($_POST)){

            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $content = $_POST['content'];


            $mail = new PHPMailer(false);                              // Passing `true` enables exceptions
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                // Specify main and backup SMTP servers
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
            $mail->Body    = $content;

            $mail->send();
        }
        header('Location: /successful');

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

}
