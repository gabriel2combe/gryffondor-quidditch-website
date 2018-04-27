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
    private $failedTry;
    private $lockedUntil;


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
     * @return Admin
     */
    public function setPassword(string $password): Admin
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return int
     */
    public function getFailedTry(): int
    {
        return $this->failedTry;
    }

    /**
     * @param int $id
     *
     * @return Admin
     */
    public function setFailedTry(int $failedTry): Admin
    {


        return $this;
    }

    /**
     * @return string
     */
    public function getLockedUntil(): string
    {
        return str_replace(" ", "T",date("Y-m-d H:i",strtotime($this->lockedUntil)));
    }

    /**
     * @param string $lockedUntil
     *
     * @return Admin
     */
    public function setLockedUntil(string $lockedUntil): Admin
    {
        $this->lockedUntil = $lockedUntil;

        return $this;
    }

    /**
     * Increases the count of wrong passwords and locks the account at the third failed attempt
     *
     * @return string
     */
    public function wrongPassword(): string
    {
        $message = "Mot de passe erroné. ";
        //If $failedTry == 3, the account has been unlocked, so go back to 1
        $this->failedTry = ($this->failedTry < 3) ? $this->failedTry + 1 : 1;
        if ($this->failedTry == 3){
            $this->setLockedUntil(date("Y-m-d H:i",strtotime("+20 minutes")));
            $message .= "Votre compte a été verrouillé pour une durée de 20 minutes";
        }else{
            $remainingAttempts = 3 - $this->getFailedTry();
            $message .= "$remainingAttempts tentative(s) restante(s)";
        }
        return $message;
    }

    /**
     * Tests if the account is currently locked
     *
     * @return bool
     */
    public function isLocked(): bool
    {
        return strtotime($this->getLockedUntil()) > strtotime("now");
    }

    /**
     * Tests if the password entered is correct
     *
     * @param string $password
     *
     * @return bool
     */
    public function isGoodPassword(string $password): bool
    {
        $this->setFailedTry(0);
        return (md5($password) == $this->password);
    }
}
