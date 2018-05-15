<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;
use Model\AdminManager;
use Model\MailManager;


/**
 * Class AdminController
 *
 */
class AdminController extends AbstractController
{

    /**
     * Display the admin login page
     *
     * @return string
     */
    public function index()
    {
        if(!isset($_SESSION['admin'])) {
            $reset="";
            if (isset($_SESSION['reset'])) {
                $reset = $_SESSION['reset'];
                unset($_SESSION['reset']);
            }
            return $this->twig->render('Admin/admin.html.twig',['reset' => $reset]);
        }else{
            header('Location: /');
        }
    }

    /**
     * Tries to login
     *
     * @return string
     */
    public function login()
    {
        $login = (isset($_POST['login'])) ? $_POST['login'] : "";
        $password = (isset($_POST['password'])) ? $_POST['password'] : "";
        $adminLoginManager = new AdminManager();
        $adminLogin = $adminLoginManager->selectByName($login);
        if ($adminLogin) {
            $id = $adminLogin->getId();
            if (!$adminLogin->isLocked()) {
                if ($adminLogin->isGoodPassword($password)) {
                    $_SESSION['admin'] = $login;
                    $data = [
                        'failedTry' => 0
                    ];
                    $adminLoginManager->update($id, $data);
                    return $this->twig->render('Home/home.html.twig',
                        [
                            'admin' => $login,
                        ]
                    );
                } else {
                    $errorCode = $adminLogin->wrongPassword();
                    $data = [
                        'failedTry' => $adminLogin->getFailedTry(),
                        'lockedUntil' => $adminLogin->getLockedUntil()
                    ];
                    $adminLoginManager->update($id, $data);
                }
            }else{
                $errorCode = "Votre compte est actuellement verrouillé. Veuillez tenter à nouveau plus tard";
            }
        }else{
            $errorCode = "Identifiant inconnu";
        }
        return $this->twig->render('Admin/admin.html.twig',
            [
                'login' => $login,
                'errorCode' => $errorCode
            ]
        );
    }

    /**
     * Change Password
     *
     * @return string
     */
    public function passwordChange()
    {
        if(!isset($_SESSION['admin'])){
            header('Location: /admin');
        }
        $admin = (!empty($_POST['login'])) ? $_POST['login'] : $_SESSION['admin'];
        $errorCode = "";
        $login = (isset($_POST['login'])) ? $_POST['login'] : "";
        $password = (isset($_POST['password'])) ? $_POST['password'] : "";
        $newPassword1 = (isset($_POST['newPassword1'])) ? $_POST['newPassword1'] : "";
        $newPassword2 = (isset($_POST['newPassword2'])) ? $_POST['newPassword2'] : "";
        if(!empty($_POST)) {
            $adminLoginManager = new AdminManager();
            $adminLogin = $adminLoginManager->selectByName($login);
            if ($adminLogin) {
                $id = $adminLogin->getId();
                if (!$adminLogin->isLocked()) {
                    if ($adminLogin->isGoodPassword($password)) {
                        $data = ['failedTry' => 0];
                        $adminLoginManager->update($id, $data);
                        if ($newPassword1 === $newPassword2) {
                            $data = ['password' => md5($newPassword1)];
                            $adminLoginManager->update($id, $data);
                            $_SESSION['alert'] = 'Mot de passe modifié avec succès';
                            header('Location: /');
                        } else {
                            $errorCode = "Le mot de passe de confirmation doit être identique au nouveau mot de passe";
                        }
                    } else {
                        $errorCode = $adminLogin->wrongPassword();
                        $data = [
                            'failedTry' => $adminLogin->getFailedTry(),
                            'lockedUntil' => $adminLogin->getLockedUntil()
                        ];
                        $adminLoginManager->update($id, $data);
                    }
                } else {
                    $errorCode = "Votre compte est actuellement verrouillé. Veuillez tenter à nouveau plus tard";
                }
            } else {
                $errorCode = "Identifiant inconnu";
            }
        }
        return $this->twig->render('Admin/changePassword.html.twig',
            [
                'admin' => $admin,
                'errorCode' => $errorCode
            ]
        );
    }

    /**
     * Reset Password
     *
     * @return string
     */
    public function passwordReset()
    {
        $admin = (!empty($_SESSION['admin'])) ? $_SESSION['admin'] : "";
        $redirection = (!empty($admin)) ?
            ['link' => '/', 'title' => 'Home'] :
            ['link' => '/admin', 'title' => 'Retour'];
        if(!empty($_POST)) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $adminLoginManager = new AdminManager();
            $adminLogin = $adminLoginManager->selectByName($login);
            if ($adminLogin) {
                $id = $adminLogin->getId();
                if ($adminLogin->isGoodEmail($email)) {
                    $password = $adminLogin->generatePassword(8);
                    $data = ['password' => md5($password)];
                    $adminLoginManager->update($id, $data);
                    $mailManager = new MailManager();
                    $message = "Le mot de passe temporaire attribué à $login est : $password. Pensez à le modifier";
                    $mailManager->sendMail(MAIL_ADDR, 'Mot de passe temporaire', $message);
                }
            }
            $_SESSION['reset'] = 'Veuillez consulter votre boite email.<br>
                                Un mot de passe temporaire vous a été envoyé.<br>
                                (A condition d\'avoir renseigné les bonnes informations)';
            header('Location: /admin');
        }
        return $this->twig->render('Admin/resetPassword.html.twig',
            [
                'admin' => $admin,
                'redirection' => $redirection
            ]
        );
    }

    /**
     * Tries to logout
     *
     * @return string
     */
    public function logout()
    {
        unset($_SESSION['admin']);
        header('Location: /');
    }





}