<?php
/**
 * Created by PhpStorm.
 * User: crea
 * Date: 27/11/15
 * Time: 11:40
 */

namespace Twit\DataBundle\Document;


class hashtag
{
    protected $hashtag;

    protected $langue;

    protected $avec_langue;

    /**
     * @return mixed
     */
    public function getAveclangue()
    {
        return $this->avec_langue;
    }

    /**
     * @param mixed $avec_langue
     */
    public function setAveclangue($avec_langue)
    {
        $this->avec_langue = $avec_langue;
    }

    /**
     * @return mixed
     */
    public function getHashtag()
    {
        return $this->hashtag;
    }

    /**
     * @param mixed $hashtag
     */
    public function setHashtag($hashtag)
    {
        $this->hashtag = $hashtag;
    }

    /**
     * @return mixed
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * @param mixed $langue
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;
    }




}