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
class PresentationController extends AbstractController
{

    /**
     * Display team listing
     *
     * @return string
     */
    public function index()
    {
        return $this->twig->render('Presentation/presentation.html.twig');
    }

}