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
 * Class GameController
 */
class GameController extends AbstractController
{

    /**
     * Display calendar listing
     *
     * @return string
     */
   /* public function index() //exemple !!!!!!!!!!!!!!!
    {
        $calendarManager = new GameManager();
        $calendars = $calendarManager->selectAll();
        $gardiens = $calendarManager->selectByPosition(3);
        $attrapeurs = $calendarManager->selectByPosition(4);
        $poursuiveurs = $calendarManager->selectByPosition(1);
        $batteurs = $calendarManager->selectByPosition(2);

        return $this->twig->render(
            'Calendar/index.html.twig',
            [
            'calendars' => $calendars,
            'gardiens' => $gardiens,
            'attrapeurs' => $attrapeurs,
            'poursuiveurs' => $poursuiveurs,
            'batteurs' => $batteurs
            ]
        );
    }*/

    public function index2() //exemple !!!!!!!!!!!!!!!
    {
        $calendarManager = new GameManager();
        $calendars = $calendarManager->selectAll();
        $id = $calendarManager->getId();
        $date = $calendarManager->getDateTimeGame();
        $team1 = $calendarManager->getNameTeam1();
        $score1 = $calendarManager->getScore1();
        $team2 = $calendarManager->getNameTeam2();
        $score2 = $calendarManager->getScore2();

        return $this->twig->render(
            'Calendar/calendar.html.twig',
            [
                'calendars' => $calendars,
                'id' => $id,
                'date' => $date,
                'team1' => $team1,
                'score1' => $score1,
                'team2' => $team2,
                'score2' => $score2
            ]
        );
    }






}
