<?php

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
class TeamManager extends AbstractManager
{
    const TABLE = 'team';

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
     * @param  int $position
     *
     * @return array
     */

    public function selectAll()
    {
        // prepared request

        $statement = $this->pdoConnection->prepare("
        SELECT * FROM $this->table

      ");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->execute();
        return $statement->fetchAll();
    }


}
