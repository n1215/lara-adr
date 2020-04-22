<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Http\Actions;

use N1215\LaraAdr\Http\Responders\UserShowJsonResponder;
use N1215\LaraAdr\UseCase\UserShowUseCase;
use Illuminate\Http\JsonResponse;

class ApiUserShowAction
{
    /**
     * @var UserShowUseCase
     */
    private $useCase;

    /**
     * @var UserShowJsonResponder
     */
    private $responder;

    public function __construct(UserShowUseCase $useCase, UserShowJsonResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    public function __invoke(int $userId): JsonResponse
    {
        $user = $this->useCase->run($userId);
        return $this->responder->respond($user);
    }
}
