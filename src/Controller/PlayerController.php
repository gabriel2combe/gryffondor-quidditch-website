<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\Player;
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
        $playerManager = new PlayerManager();
        $players = $playerManager->selectAll();
        $gardiens = $playerManager->selectByPosition(3);
        $attrapeurs = $playerManager->selectByPosition(4);
        $poursuiveurs = $playerManager->selectByPosition(1);
        $batteurs = $playerManager->selectByPosition(2);

        return $this->twig->render(
            'Player/index.html.twig',
            [
            'players' => $players,
            'gardiens' => $gardiens,
            'attrapeurs' => $attrapeurs,
            'poursuiveurs' => $poursuiveurs,
            'batteurs' => $batteurs
            ]
        );
    }

    /**
     * Display player informations specified by $id
     *
     * @param int $id
     *
     * @return string
     */
    public function show(int $id)
    {
        $playerManager = new PlayerManager();
        $player = $playerManager->selectOneById($id);

        return $this->twig->render('Player/show.html.twig', ['player' => $player]);
    }

    /**
     * Display player edition page specified by $id
     *
     * @param int $id
     *
     * @return string
     */
    public function edit(int $id)
    {
        // TODO : edit player with id $id
        return $this->twig->render('Player/edit.html.twig', ['player', $id]);
    }

    /**
     * Display player creation page
     *
     * @return string
     */
    public function add()
    {
        // TODO : add a new player
        return $this->twig->render('Player/add.html.twig');
    }

    /**
     * Display player delete page
     *
     * @param int $id
     *
     * @return string
     */
    public function delete(int $id)
    {
        // TODO : delete the player with id $id
        return $this->twig->render('Player/index.html.twig');
    }
}
