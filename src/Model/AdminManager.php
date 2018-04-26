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
class AdminManager extends AbstractManager
{
    const TABLE = 'user';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     *  Initializes this class.
     */
    public function selectByName(string $login)
    {
        // prepared request
        $statement = $this->pdoConnection->prepare("
            SELECT *
            FROM $this->table
            WHERE login=:login");
        $statement->setFetchMode(\PDO::FETCH_CLASS, Admin::class);
        $statement->bindValue('login', $login, \PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch();
    }
}
