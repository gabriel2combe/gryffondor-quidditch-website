<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\PlayerManager;

/**
 * Class PlayerController
 */
class PlayerController extends AbstractController
{

    /**
     * Display player listing
     *
     * @return string
     */
    public function index()
    {
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";
        $playerManager = new PlayerManager();
        $players = $playerManager->selectAll();
        $gardiens = $playerManager->selectByPosition(3);
        $attrapeurs = $playerManager->selectByPosition(4);
        $poursuiveurs = $playerManager->selectByPosition(1);
        $batteurs = $playerManager->selectByPosition(2);

        return $this->twig->render(
            'Player/player.html.twig',
            [
                'players' => $players,
                'gardiens' => $gardiens,
                'attrapeurs' => $attrapeurs,
                'poursuiveurs' => $poursuiveurs,
                'batteurs' => $batteurs,
                'admin' => $admin
            ]
        );
    }

    /**
     * Player card editor
     *
     * @return string
     */
    public function edit($id)
    {

        if(!isset($_SESSION['admin'])){
            header('Location: /team');
        }
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";

        $playerManager = new PlayerManager();

        if(!empty($_POST)){
            $id = $_POST['id'];
            $data = [
                'lastName' => $_POST['lastName'],
                'firstName' => $_POST['firstName'],
                'size' => $_POST['size'],
            ];

            $playerManager->update($id, $data);
            header('Location: /team/edit-' . $id);
        }
        $player = $playerManager->selectOneById($id);

        return $this->twig->render(
            'Player/edit.html.twig',
            [
                'player' => $player,
                'admin' => $admin
            ]
        );
    }
}
