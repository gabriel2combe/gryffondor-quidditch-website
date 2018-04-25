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
 * Class Presentation
 *
 */
class Presentation
{
    private $id;
    private $title;
    private $content;
    private $picture1;
    private $picture2;
    private $picture3;

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
     * @return Presentation
     */
    public function setId(int $id): Presentation
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Presentation
     */
    public function setTitle(string $title): Presentation
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return Presentation
     */
    public function setContent(string $content): Presentation
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getPicture1(): string
    {
        return $this->picture1;
    }

    /**
     * @param string $picture1
     *
     * @return Presentation
     */
    public function setPicture1(string $picture1): Presentation
    {
        $this->picture1 = $picture1;

        return $this;
    }

    /**
     * @return string
     */
    public function getPicture2(): string
    {
        return $this->picture2;
    }

    /**
     * @param string $picture2
     *
     * @return Presentation
     */
    public function setPicture2(string $picture2): Presentation
    {
        $this->picture2 = $picture2;

        return $this;
    }

    /**
     * @return string
     */
    public function getPicture3(): string
    {
        return $this->picture3;
    }

    /**
     * @param string $picture3
     *
     * @return Presentation
     */
    public function setPicture3(string $picture3): Presentation
    {
        $this->picture3 = $picture3;

        return $this;
    }
}
