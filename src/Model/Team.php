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
 * Class Team
 *
 */
class Team
{

    private $id;
    private $name;
    private $idStadium;
    private $image;




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
     * @return Team
     */

    public function setId(int $id): Team
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */

    public function getName(): string

    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Team
     */

    public function setName(string $name): Team
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return int
     */
    public function getIdStadium(): int

    {
        return $this->idStadium;
    }

    /**
     * @param int $idStadium
     *
     * @return Team
     */

    public function setIdStadium(int $idStadium): Team
    {
        $this->idStadium = $idStadium;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     *
     * @return Team
     */
    public function setImage(string $image): Team
    {
        $this->image= $image;

        return $this;
    }
}

