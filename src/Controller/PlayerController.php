<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\BroomstickManager;
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
                'birthDate' => $_POST['birthDate'],
                'idBroomstick' => $_POST['idBroomstick']
            ];

            $playerManager->update($id, $data);

            //mofifier la photo
            if(isset($_FILES['picture'])){
                $uploadDir = 'assets/images/players/';
                $uploadFile = $uploadDir . $_POST['id'] . ".jpg";
                move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile);
            }

            header('Location: /team');
        }
        $player = $playerManager->selectOneById($id);
        $broomstickManager = new BroomstickManager();
        $broomsticks = $broomstickManager->selectAll();


        return $this->twig->render(
            'Player/edit.html.twig',
            [
                'player' => $player,
                'broomsticks' => $broomsticks,
                'admin' => $admin
            ]
        );
    }
}
