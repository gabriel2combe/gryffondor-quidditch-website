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
    const TABLE = 'plays';

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

");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->execute();
        return $statement->fetchAll();
    }
}
