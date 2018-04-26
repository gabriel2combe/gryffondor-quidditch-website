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
class PlayerManager extends AbstractManager
{
    const TABLE = 'player';

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
    public function selectByPosition(int $position)
    {
        // prepared request
        $statement = $this->pdoConnection->prepare("
            SELECT $this->table.*, b.model AS broomstickModel, b.speed AS broomstickSpeed
            FROM $this->table
            INNER JOIN broomstick AS b ON b.id = idBroomstick
            WHERE idPosition=:position");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('position', $position, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }

}
