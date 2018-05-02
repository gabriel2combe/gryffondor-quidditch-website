<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace Model;

/**
 *
 */
class GameManager extends AbstractManager
{
    const TABLE = 'game';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * Get rows from database by .
     *
     * @return array
     */
    public function selectAllGames()
    {
        // prepared request
        $statement = $this->pdoConnection->prepare("
        SELECT 	g.id, 
		g.dateTimeGame, 
		t1.name AS nameTeam1, 
        g.score1, 
        t2.name AS nameTeam2,
        g.score2, 
        t1.image AS logoTeam1,
        t2.image AS logoTeam2
           FROM game
           AS g 
           JOIN team 
           AS t1 
           ON g.idTeam1 = t1.id 
           JOIN team 
           AS t2 
           ON g.idTeam2 = t2.id
           ORDER BY g.dateTimeGame

      ");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * Get rows from database by .
     *
     * @return array
     */
    public function selectOneGameById($id)
    {
        // prepared request
        $statement = $this->pdoConnection->prepare("
        SELECT 	g.id, 
		g.dateTimeGame, 
		t1.name AS nameTeam1, 
        g.score1, 
        t2.name AS nameTeam2,
        g.score2, 
        t1.image AS logoTeam1,
        t2.image AS logoTeam2
           FROM game
           AS g 
           JOIN team 
           AS t1 
           ON g.idTeam1 = t1.id 
           JOIN team 
           AS t2 
           ON g.idTeam2 = t2.id
           WHERE g.id=$id

      ");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->execute();
        return $statement->fetch();
    }

    /**
     * Get season from 'game'.
     *
     * @return array
     */

    public function getSeasonsList()
    {
        $statement = $this->pdoConnection->prepare("
       SELECT DISTINCT 
      IF(MONTH(`dateTimeGame`)<=6, 
      CONCAT(YEAR(`dateTimeGame`)-1,\"-\",YEAR(`dateTimeGame`)), 
      CONCAT(YEAR(`dateTimeGame`),\"-\",YEAR(`dateTimeGame`)+1)) 
      AS season 
      FROM `game`

      ");
        $statement->setFetchMode(\PDO::FETCH_BOTH);
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * select match from 'game' by season.
     *
     * @return array
     */

    public function selectBySeason($season)
    {
        $statement = $this->pdoConnection->prepare("
        SELECT 	g.id, 
		g.dateTimeGame, 
		t1.name AS nameTeam1, 
        g.score1, 
        t2.name AS nameTeam2,
        g.score2, 
        t1.image AS logoTeam1,
        t2.image AS logoTeam2,
        IF(MONTH(`dateTimeGame`)<=6, 
            CONCAT(YEAR(`dateTimeGame`)-1,'-',YEAR(`dateTimeGame`)), 
            CONCAT(YEAR(`dateTimeGame`),'-',YEAR(`dateTimeGame`)+1)) 
        AS season
           FROM game
           AS g 
           JOIN team 
           AS t1 
           ON g.idTeam1 = t1.id 
           JOIN team 
           AS t2 
           ON g.idTeam2 = t2.id
      HAVING season = '$season'
      ");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->execute();
        return $statement->fetchAll();
    }


}
