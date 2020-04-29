<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Http\Actions;

use N1215\LaraAdr\Http\Responders\UserShowHtmlResponder;
use N1215\LaraAdr\UseCase\UserShowUseCase;
use Illuminate\Http\Response;

class WebUserShowAction
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

    public function __invoke(int $userId): Response
    {
        $user = $this->useCase->run($userId);
        return $this->responder->respond($user);
    }
}
