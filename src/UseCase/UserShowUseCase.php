<?php

declare(strict_types=1);

namespace N1215\LaraAdr\UseCase;

use N1215\LaraAdr\Domains\User;
use N1215\LaraAdr\Domains\UserId;
use N1215\LaraAdr\Domains\UserRepositoryInterface;

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
