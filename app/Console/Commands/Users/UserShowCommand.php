<?php

namespace App\Console\Commands\Users;

use App\Domains\Users\UserShowUseCase;
use Illuminate\Console\Command;

class UserShowCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:show {userId : ユーザー} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ユーザー情報を表示';

    /**
     * @var UserShowUseCase
     */
    private $useCase;

    /**
     * ShowUser constructor.
     * @param UserShowUseCase $useCase
     */
    public function __construct(UserShowUseCase $useCase)
    {
        parent::__construct();
        $this->useCase = $useCase;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userId = $this->argument('userId');
        $user = $this->useCase->run($userId);

        $responder = new UserShowConsoleResponder($this->output);
        $responder->respond($user);
    }
}
