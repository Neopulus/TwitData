<?php
/**
 * Created by PhpStorm.
 * User: crea
 * Date: 26/11/15
 * Time: 17:24
 */

namespace Twit\DataBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Class Twit
 * @package Twit\DataBundle\Document
 * @MongoDB\Document
 */
class twit_colec
{
    /**
     * @MongoDB\Id
     */
    protected $_id;
    /**
     * @MongoDB\String
     */
    protected  $User;
    /**
     * @MongoDB\String
     */
    protected $Location;
    /**
     * @MongoDB\date
     */
    protected $CreateAt;
    /**
     * @MongoDB\String
     */
    protected $Contents;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return self
     */
    public function setUser($user)
    {
        $this->User = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return string $user
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return self
     */
    public function setLocation($location)
    {
        $this->Location = $location;
        return $this;
    }

    /**
     * Get location
     *
     * @return string $location
     */
    public function getLocation()
    {
        return $this->Location;
    }

    /**
     * Set createAt
     *
     * @param date $createAt
     * @return self
     */
    public function setCreateAt($createAt)
    {
        $this->CreateAt = $createAt;
        return $this;
    }

    /**
     * Get createAt
     *
     * @return date $createAt
     */
    public function getCreateAt()
    {
        return $this->CreateAt;
    }

    /**
     * Set contents
     *
     * @param string $contents
     * @return self
     */
    public function setContents($contents)
    {
        $this->Contents = $contents;
        return $this;
    }

    /**
     * Get contents
     *
     * @return string $contents
     */
    public function getContents()
    {
        return $this->Contents;
    }
}
