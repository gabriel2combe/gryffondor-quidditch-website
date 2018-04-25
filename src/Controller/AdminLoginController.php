<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;
use Model\AdminLoginManager;


/**
 * Class AdminLoginController
 *
 */
class AdminLoginController extends AbstractController
{

    /**
     * Display the admin login page
     *
     * @return string
     */
    public function index()
    {
        if(!isset($_SESSION['admin'])) {
            return $this->twig->render('AdminLogin/adminLogin.html.twig');
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
        $adminLoginManager = new AdminLoginManager();
        $adminLogin = $adminLoginManager->selectByName($login);
        if ($adminLogin) {
            if ($adminLogin->isGoodPassword($password)) {
                $_SESSION['admin'] = $login;
                return $this->twig->render('Home/home.html.twig',
                    [
                        'admin' => $login
                    ]
                );
            } else {
                return $this->twig->render('AdminLogin/adminLogin.html.twig',
                    [
                        'login' => $login,
                        'errorCode' => 'wrongPassword'
                    ]
                );
            }
        }else{
            return $this->twig->render('AdminLogin/adminLogin.html.twig',
                [
                    'login' => $login,
                    'errorCode' => 'wrongLogin'
                ]
            );
        }
    }

}