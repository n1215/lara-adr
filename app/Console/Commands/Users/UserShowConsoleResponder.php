<?php

namespace App\Console\Commands\Users;

use App\Domains\Users\User;
use Illuminate\Console\OutputStyle;

class UserShowConsoleResponder
{
    /**
     * @var OutputStyle
     */
    private $output;

    public function __construct(OutputStyle $output)
    {
        $this->output = $output;
    }

    public function respond(User $user = null): void
    {
        if(is_null($user)) {
            $this->output->error("ユーザーが見つかりません");
            return;
        }

        $this->output->success(json_encode($user));
    }
}