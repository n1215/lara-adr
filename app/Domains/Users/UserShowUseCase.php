<?php

namespace App\Domains\Users;

class UserShowUseCase
{
    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    /**
     * UserShowUseCase constructor.
     * @param UserRepositoryInterface $repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $userId
     * @return User|null
     */
    public function run($userId)
    {
        return $this->repository->find(new UserId($userId));
    }

}