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
        return $this->twig->render('Contact/contact.html.twig');
    }

}
