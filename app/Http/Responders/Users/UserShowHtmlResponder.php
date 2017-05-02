<?php

namespace App\Http\Responders\Users;

use App\Domains\Users\User;
use Illuminate\Http\Response;
use Illuminate\View\Factory;

class UserShowHtmlResponder
{
    /**
     * @var Factory
     */
    private $viewFactory;

    /**
     * UserShowJsonResponder constructor.
     * @param Factory $viewFactory
     */
    public function __construct(Factory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }

    /**
     * @param User|null $user
     * @return \Illuminate\Http\Response
     */
    public function respond(User $user = null)
    {
        if(is_null($user)) {
            $view = $this->viewFactory->make('errors.404');
            return new Response($view->render(), 404);
        }

        $view = $this->viewFactory->make('users.show', ['user' => $user]);
        return new Response($view->render(), 200);
    }
}