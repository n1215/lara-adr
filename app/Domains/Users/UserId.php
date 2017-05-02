<?php

namespace App\Domains\Users;

class UserId
{
    /**
     * @var int
     */
    private $userId;

    /**
     * UserId constructor.
     * @param int $userId
     */
    public function __construct($userId)
    {
        $this->userId = intval($userId);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return strval($this->userId);
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->userId;
    }
}