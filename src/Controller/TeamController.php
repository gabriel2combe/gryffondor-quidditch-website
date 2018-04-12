<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\Team;
use Model\TeamManager;

/**
 * Class TeamController
 *
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
        $teamManager = new TeamManager();
        $teams = $teamManager->selectAll();

        return $this->twig->render('Team/index.html.twig', ['teams' => $teams]);
    }

    /**
     * Display team informations specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function show(int $id)
    {
        $teamManager = new TeamManager();
        $team = $teamManager->selectOneById($id);

        return $this->twig->render('Team/show.html.twig', ['team' => $team]);
    }

    /**
     * Display team edition page specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function edit(int $id)
    {
        // TODO : edit team with id $id
        return $this->twig->render('Team/edit.html.twig', ['team', $id]);
    }

    /**
     * Display team creation page
     *
     * @return string
     */
    public function add()
    {
        // TODO : add a new team
        return $this->twig->render('Team/add.html.twig');
    }

    /**
     * Display team delete page
     *
     * @param  int $id
     *
     * @return string
     */
    public function delete(int $id)
    {
        // TODO : delete the team with id $id
        return $this->twig->render('Team/index.html.twig');
    }
}
