<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Infrastructure;

use N1215\LaraAdr\Domains\User;
use N1215\LaraAdr\Domains\UserId;
use N1215\LaraAdr\Domains\UserName;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function setUp(): void
    {
        parent::setUp();

        $users = collect([
            [1, 'Tom'],
            [2, 'Jack'],
        ])->map(function (array $userData) {
            return new User(
                new UserId($userData[0]),
                new UserName($userData[1])
            );
        });
        $this->repository = new UserRepository($users);
    }

    public function testFind(): void
    {
        $user = $this->repository->find(new UserId(1));

        $this->assertEquals('Tom', $user->getName()->getValue());
    }
}
