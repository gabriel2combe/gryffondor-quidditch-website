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
 * Class Admin
 *
 */
class Admin
{
    private $id;
    private $login;
    private $password;


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
     * @return Admin
     */
    public function setId(int $id): Admin
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $title
     *
     * @return Admin
     */
    public function setLogin(string $login): Admin
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return bool
     */
    public function isGoodPassword(string $password): bool
    {
        return (md5($password) == $this->password);
    }
}
