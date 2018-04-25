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
    private $picture;
    private $broomstickModel;
    private $broomstickSpeed;


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
    public function setId(int $id): Player
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return Player
     */
    public function setLastName(string $lastName): Player
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return Player
     */
    public function setFirstName(string $firstName): Player
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     *
     * @return Player
     */
    public function setSize(int $size): Player
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * @param int $birthDate
     *
     * @return Player
     */
    public function setBirthDate(int $birthDate): Player
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     *
     * @return Player
     */
    public function setPicture(string $picture): Player
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return string
     */
    public function getBroomstickModel(): string
    {
        return $this->broomstickModel;
    }

    /**
     * @param string $broomstickModel
     *
     * @return Player
     */
    public function setBroomstickModel(string $broomstickModel): Player
    {
        $this->broomstickModel = $broomstickModel;

        return $this;
    }

    /**
     * @return string
     */
    public function getBroomstickSpeed(): string
    {
        return $this->broomstickSpeed;
    }

    /**
     * @param string $broomstickSpeed
     *
     * @return Player
     */
    public function setBroomstickSpeed(string $broomstickSpeed): Player
    {
        $this->broomstickSpeed = $broomstickSpeed;

        return $this;
    }



    /**
     *
     *
     * @return int
     */
    public function getAge(): int
    {
        $age = date('Y') - date('Y', strtotime($this->birthDate));
        if (date('md') < date('md', strtotime($this->birthDate))) {
            return $age - 1;
        } else {
            return $age;
        }
    }
}
