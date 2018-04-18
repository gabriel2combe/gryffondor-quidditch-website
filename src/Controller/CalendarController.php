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
 * Class CalendarController
 */
class CalendarController extends AbstractController
{

    /**
     * Display calendar listing
     *
     * @return string
     */
   /* public function index() //exemple !!!!!!!!!!!!!!!
    {
        $calendarManager = new CalendarManager();
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

    /**
     * Display calendar listing
     *
     * @return string
     */
    public function index2()
    {

        return $this->twig->render(
            'Calendar/calendar.html.twig'
        );
    }



}
