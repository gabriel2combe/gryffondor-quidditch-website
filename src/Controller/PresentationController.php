<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;
use Model\PresentationManager;


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
        $presentationManager = new PresentationManager();
        $presentationInfo = $presentationManager->selectAll();

        return $this->twig->render('Presentation/presentation.html.twig',
            [
                'presentationInfo' => $presentationInfo
            ]
        );
    }

    /**
     * Display team listing
     *
     * @return string
     */
    public function edit()
    {
        $presentationManager = new PresentationManager();
        $presentationInfo = $presentationManager->selectAll();

        return $this->twig->render('Presentation/edit.html.twig',
            [
                'presentationInfo' => $presentationInfo
            ]
        );
    }

}