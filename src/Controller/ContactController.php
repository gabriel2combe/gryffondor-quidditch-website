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
use Model\MailManager;
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
        $sender = $_POST['email'];
        $subject = $_POST['subject'];
        $mailBody = $_POST['content'];
        $mailManager = new MailManager();
        $mailInfo = $mailManager->sendMail($sender, $subject, $mailBody);
        $_SESSION['sendEmail']=$mailInfo['sendEmail'];
        $_SESSION['emailForm']=$mailInfo['emailForm'];
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
