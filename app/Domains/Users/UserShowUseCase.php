<?php

namespace App\Domains\Users;

class UserShowUseCase
{
    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $userId): ?User
    {
        return $this->repository->find(new UserId($userId));
    }

}