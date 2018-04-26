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
 * Class Broomstick
 *
 */
class Broomstick
{
    private $id;
    private $model;
    private $speed;


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
     * @return Broomstick
     */
    public function setId(int $id): Broomstick
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     *
     * @return Broomstick
     */
    public function setModel(string $model): Broomstick
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param string $speed
     *
     * @return Broomstick
     */
    public function setSpeed(string $speed): Broomstick
    {
        $this->speed = $speed;

        return $this;
    }
}
