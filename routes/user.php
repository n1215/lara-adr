<?php

use Illuminate\Support\Facades\Route;
use \N1215\LaraAdr\Http\Actions;

Route::get('/users/{userId}', Actions\WebUserShowAction::class);
Route::get('/api/users/{userId}', Actions\ApiUserShowAction::class);
