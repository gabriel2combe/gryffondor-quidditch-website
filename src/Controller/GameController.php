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
use Model\TeamManager;


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

    public function index2($season) //exemple !!!!!!!!!!!!!!!
    {

        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";
        $gameManager = new GameManager();
        $games = $gameManager->selectBySeason($season);
        $seasons = $gameManager->getSeasonsList();


        return $this->twig->render(
            'Calendar/calendar.html.twig',
            [
                'games' => $games,
                'admin' => $admin,
                'seasons' => $seasons,
                'currentSeason' => $season
            ]
        );
    }



    public function edit($id)
    {

        if(!isset($_SESSION['admin'])){
            header('Location: /calendar-'.SEASON);
        }
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";

        $gameManager = new GameManager();

        if(!empty($_POST))
        {
            $score1 = (empty($_POST['score1'])) ? 0 : $_POST['score1'];
            $score2 = (empty($_POST['score2'])) ? 0 : $_POST['score2'];

            $id = $_POST['id'];
            $data =
                [
                    'idTeam1' => $_POST['idTeam1'],
                    'idTeam2' => $_POST['idTeam2'],
                    'score1' => $score1,
                    'score2' => $score2,
                    'dateTimeGame' => $_POST['dateTimeGame']
            ];

            $gameManager->update($id, $data);
            header('Location: /calendar-'.SEASON);
        }

        $game = $gameManager->selectOneGameById($id);
        $teamManager = new TeamManager();
        $teams = $teamManager->selectAll();

        return $this->twig->render(
            'Calendar/editMatch.html.twig',
            [
                'game' => $game,
                'teams' => $teams,
                'admin' => $admin,
                'id' => $id
            ]
        );
    }






    /**
     * Add a match
     *
     * @return string
     */

    public function add()
    {
        if(!isset($_SESSION['admin'])){
            header('Location: /calendar-'.SEASON);
        }
        $admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : "";

        if(!empty($_POST))
        {

            $score1 = (empty($_POST['score1'])) ? 0 : $_POST['score1'];
            $score2 = (empty($_POST['score2'])) ? 0 : $_POST['score2'];

            $data =
                [
                    'idTeam1' => $_POST['idTeam1'],
                    'idTeam2' => $_POST['idTeam2'],
                    'score1' => $score1,
                    'score2' => $score2,
                    'dateTimeGame' => $_POST['dateTimeGame']
                ];
            $gameManager = new GameManager();
            $gameManager->insert($data);
            header('Location: /calendar-'.SEASON);
        }


        $teamManager = new TeamManager();
        $teams = $teamManager->selectAll();

        return $this->twig->render(
            'Calendar/add.html.twig',
            [
                'admin' => $admin,
                'teams' => $teams
            ]
        );
    }

    public function delete($id)
    {
        if(!isset($_SESSION['admin'])){
            header('Location: /calendar-'.SEASON);
        }

            $gameManager = new GameManager();
            $gameManager->delete($id);
            header('Location: /calendar-'.SEASON);

    }


}
