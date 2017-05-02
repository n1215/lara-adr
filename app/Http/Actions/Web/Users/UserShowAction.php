<?php

namespace App\Http\Actions\Web\Users;

use App\Http\Responders\Users\UserShowHtmlResponder;
use App\Domains\Users\UserShowUseCase;
use Illuminate\Http\Response;

class UserShowAction
{
    /**
     * @var UserShowUseCase
     */
    private $useCase;

    /**
     * @var UserShowHtmlResponder
     */
    private $responder;

    public function __construct(UserShowUseCase $useCase, UserShowHtmlResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    public function __invoke(string $userId): Response
    {
        $user = $this->useCase->run(intval($userId));
        return $this->responder->respond($user);
    }
}