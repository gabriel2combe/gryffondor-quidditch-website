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
    private $idTeam1;
    private $nameTeam1;
    private $score1;
    private $idTeam2;
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
        return str_replace(" ", "T",date("Y-m-d H:i",strtotime($this->dateTimeGame)));
    }

    /**
     * @return Game
     */
    public function setDateTimeGame($dateTimeGame): Game
    {
        $this->dateTimeGame = $dateTimeGame;
        return $this;

    }

    /**
     * @return int
     */
    public function getIdTeam1(): int
    {
        return $this->idTeam1;
    }

    /**
     * @param string $idTeam1
     *
     * @return Game
     */
    public function setIdTeam1($idTeam1): Game
    {
        $this->idTeam1 = $idTeam1;
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
    public function setNameTeam1($nameTeam1): Game
    {
        $this->nameTeam1 = $nameTeam1;
        return $this;
    }

    /**
     * @return string
     */
    public function getScore1(): string
    {
            $score = $this->score1;
            if($score==0) $score = "-";
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
     * @return int
     */
    public function getIdTeam2(): int
    {
        return $this->idTeam2;
    }

    /**
     * @param string $idTeam2
     *
     * @return Game
     */
    public function setIdTeam2($idTeam2): Game
    {
        $this->idTeam2 = $idTeam2;
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
    public function setNameTeam2($nameTeam2): Game
    {
        $this->nameTeam2 = $nameTeam2;
        return $this;
    }

    /**
     * @return string
     */
    public function getScore2() : string
    {
        $score = $this->score2;
        if($score==0) $score = "-";
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
