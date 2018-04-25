<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\TeamManager;

/**
 * Class TeamController
 */
class TeamController extends AbstractController
{
    /**
     * Display team listing
     *
     * @return string
     */
    public function index()
    {
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";
        $teamManager = new TeamManager();
        $ids = $teamManager->getId();
        $names = $teamManager->getNameTeam();
        $images = $teamManager->getImage();


        return $this->twig->render(
            'Calendar/editMatch.html.twig',
            [
                'team' => $teams,
                'id' => $ids,
                'name' => $names,
                'image' => $images,
            ]
        );


    }


}

