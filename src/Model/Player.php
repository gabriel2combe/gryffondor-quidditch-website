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
class Player
{
    private $id;

    private $lastName;
    private $firstName;
    private $size;
    private $birthDate;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Item
     */
    public function setId($id): Player
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     *
     * @return Player
     */
    public function setLastName($lastName): Player
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     *
     * @return Player
     */
    public function setFirstName($firstName): Player
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     *
     * @return Player
     */
    public function setSize($size): Player
    {
        $this->size = $size;

        return $this;
    }

    /**
     *
     *
     * @return Player
     */
    public function getAge(): int
    {
        $age = date('Y') - date('Y', strtotime($this->birthDate));
        if (date('md') < date('md', strtotime($this->birthDate))){
            return $age - 1;
        }else{
            return $age;
        }
    }

}
