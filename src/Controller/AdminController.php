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
            return $this->twig->render('Admin/admin.html.twig');
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
                            return $this->twig->render('Home/home.html.twig',
                                [
                                    'admin' => $admin,
                                    'alert' => 'Mot de passe modifié avec succès'
                                ]
                            );
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