<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;


/**
 * Class TeamController
 *
 */
class HomeController extends AbstractController
{

    /**
     * Display team listing
     *
     * @return string
     */
    public function index()
    {
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";
        $reset="";
        if (isset($_SESSION['reset'])) {
            $reset = $_SESSION['reset'];
            unset($_SESSION['reset']);
        }
        return $this->twig->render('Home/home.html.twig',
            [
                'admin' => $admin,
                'thisSeason' => SEASON,
                'reset' => $reset
            ]
        );
    }

}