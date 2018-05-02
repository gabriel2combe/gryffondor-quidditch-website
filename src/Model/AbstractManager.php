<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 20:52
 * PHP version 7
 */

namespace Model;

use App\Connection;

/**
 * Abstract class handling default manager.
 */
abstract class AbstractManager
{
    protected $pdoConnection; //variable de connexion

    protected $table;
    protected $className;

    /**
     *  Initializes Manager Abstract class.
     *
     * @param string $table Table name of current model
     */
    public function __construct(string $table)
    {
        $connexion = new Connection();
        $this->pdoConnection = $connexion->getPdoConnection();
        $this->table = $table;
        $this->className = __NAMESPACE__ . '\\' . ucfirst($table);
    }

    /**
     * Get all row from database.
     *
     * @return array
     */
    public function selectAll(): array
    {
        return $this->pdoConnection->query('SELECT * FROM ' . $this->table, \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }

    /**
     * Get one row from database by ID.
     *
     * @param  int $id
     *
     * @return array
     */
    public function selectOneById(int $id)
    {
        // prepared request
        $statement = $this->pdoConnection->prepare("SELECT * FROM $this->table WHERE id=:id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    /**
     * DELETE on row in database by ID
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $delete = "DELETE FROM `game` WHERE `game`.`id` = $id";
        return $this->pdoConnection->exec($delete);
    }

    /**
     * DELETE on row in database by ID
     *
     * @param array $data
     */
    public function insert(array $data)
    {
        foreach ($data as $key => $value){
            if (!empty($value)) {
                $data[$key] = '\'' . $value . '\'';
            }else{
                $data[$key] = 'NULL';
            }
        }
        $sqlFields = implode(', ', array_keys($data));
        $sqlValues = implode(', ', $data);
        // prepared request
        echo "INSERT INTO $this->table ($sqlFields) VALUES ($sqlValues)";
        $statement = $this->pdoConnection->prepare("INSERT INTO $this->table ($sqlFields) VALUES ($sqlValues)");
        $statement->execute();
    }
    /**
     * @param int   $id   Id of the row to update
     * @param array $data $data to update
     */
    public function update(int $id, array $data)
    {
        foreach ($data as $key => $value) {
            // prepared request
            $statement = $this->pdoConnection->prepare("UPDATE $this->table 
                                                                    SET `$key` = '$value' 
                                                                    WHERE `id` = $id");
            $statement->bindValue('id', $id, \PDO::PARAM_INT);
            $statement->execute();
        }
    }
}
