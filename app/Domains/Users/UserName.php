<?php

namespace App\Domains\Users;

class UserName
{
    /**
     * @var string
     */
    private $userName;

    /**
     * UserName constructor.
     * @param string $userName
     */
    public function __construct($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return strval($this->userName);
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->userName;
    }
}