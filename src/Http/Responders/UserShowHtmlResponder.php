<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Http\Responders;

use N1215\LaraAdr\Domains\User;
use Illuminate\Http\Response;
use Illuminate\View\Factory;

class UserShowHtmlResponder
{
    /**
     * @var Factory
     */
    private $viewFactory;

    public function __construct(Factory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }

    public function respond(User $user = null): Response
    {
        if ($user === null) {
            $view = $this->viewFactory->make('lara-adr::errors.404');
            return new Response($view->render(), 404);
        }

        $view = $this->viewFactory->make('lara-adr::users.show', ['user' => $user]);
        return new Response($view->render(), 200);
    }
}
