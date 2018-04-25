<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;
use Model\GameManager;


/**
 * Class GameController
 */
class GameController extends AbstractController
{

    /**
     * Display calendar listing
     *
     * @return string
     */

    public function index2() //exemple !!!!!!!!!!!!!!!
    {
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";
        $gameManager = new GameManager();
        $games = $gameManager->selectAllGames();

        return $this->twig->render(
            'Calendar/calendar.html.twig',
            [
                'games' => $games,
                'admin' => $admin
            ]
        );
    }

    /**
     * Display calendar listing
     *
     * @return string
     */

    public function add() //exemple !!!!!!!!!!!!!!!
    {
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";
        $gameManager = new GameManager();
        $games = $gameManager->selectAllGames();

        return $this->twig->render(
            'Calendar/add.html.twig',
            [
                'games' => $games,
                'admin' => $admin
            ]
        );
    }


}
