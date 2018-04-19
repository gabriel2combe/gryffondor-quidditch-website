<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 * PHP version 7
 */

namespace Model;

/**
 * Class Player
 *
 */
class Game
{
    private $id;
    private $dateTimeGame;
    private $nameTeam1;
    private $score1;
    private $nameTeam2;
    private $score2;



    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Item
     */
    public function setId(int $id): Game
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getDateTimeGame(): string
    {
        return $this->dateTimeGame;

    }

    /**
     * @return string
     */
    public function setDateTimeGame(): string
    {
         $this->dateTimeGame;

        return $this;

    }

    /**
     * @param string $lastName
     *
     * @return Player
     */
    public function getNameTeam1(): Game
    {
        $this->nameTeam1;

        return $this;
    }

    /**
     * @param string $lastName
     *
     * @return Player
     */
    public function setNameTeam1(): Game
    {
        $this->nameTeam1;

        return $this;
    }

    /**
     * @return string
     */
    public function getScore1(): int
    {
            $this->score1;

            return $this;
    }

    /**
     * @return string
     */
    public function setScore1(): int
    {
        $this->score1;

        return $this;
    }





    /**
     * @param string $lastName
     *
     * @return Player
     */
    public function getNameTeam2(): Game
    {
        $this->nameTeam2;

        return $this;
    }

    /**
     * @param string $lastName
     *
     * @return Player
     */
    public function setNameTeam2(): Game
    {
        $this->nameTeam2;

        return $this;
    }



    /**
     * @return string
     */
    public function getScore2(): int
    {
        $this->score2;

        return $this;
    }

    /**
     * @return string
     */
    public function setScore2(): int
    {
        $this->score2;

        return $this;
    }




}
