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
 * Class Game
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
    private $logoTeam1;
    private $logoTeam2;



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
     * @return Game
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
     * @return Game
     */
    public function setDateTimeGame(): Game
    {
        $this->dateTimeGame;
        return $this;

    }

    /**
     * @return string
     */
    public function getNameTeam1(): string
    {
        return $this->nameTeam1;
    }

    /**
     * @param string $nameTeam
     *
     * @return Game
     */
    public function setNameTeam1($nameTeam): Game
    {
        $this->nameTeam1 = $nameTeam;
        return $this;
    }

    /**
     * @return string
     */
    public function getScore1(): string
    {
            $score = $this->score1;
            if($score=="") $score = "-";
            return $score;
    }

    /**
     * @param string $score
     *
     * @return Game
     */
    public function setScore1($score): Game
    {
        $this->score1 = $score;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameTeam2(): string
    {
        return $this->nameTeam2;
    }

    /**
     * @param string $nameTeam
     *
     * @return Game
     */
    public function setNameTeam2($nameTeam): Game
    {
        $this->nameTeam2 = $nameTeam;
        return $this;
    }

    /**
     * @return string
     */
    public function getScore2() : string
    {
        $score = $this->score2;
        if($score=="") $score = "-";
        return $score;
    }

    /**
     * @param string $score
     *
     * @return Game
     */
    public function setScore2($score): Game
    {
        $this->score2 = $score;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogoTeam1():string
    {
        return $this->logoTeam1;
    }

    /**
     * @param string $logo
     *
     * @return Game
     */
    public function setLogoTeam1($logo): Game
    {
        $this->logoTeam1 = $logo;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogoTeam2():string
    {
        return $this->logoTeam2;
    }

    /**
     * @param string $logo
     *
     * @return Game
     */
    public function setLogoTeam2($logo): Game
    {
        $this->logoTeam2 = $logo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        $date = strtotime($this->dateTimeGame);
        $date = date('d/m/Y', $date);
        return $date;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        $time = strtotime($this->dateTimeGame);
        $time = date('H:i', $time);
        return $time;
    }




}
