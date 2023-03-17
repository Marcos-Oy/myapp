<?php

use App\Controllers\DashboardController;
use App\Controllers\UserController;
use App\Controllers\LoginController;

$router->name('Dashboard')->get('/', [DashboardController::class, 'dash']);
$router->name('users.index')->get('/users', [UserController::class, 'index']);
$router->name('users.create')->get('/users/create', [UserController::class, 'create']);
$router->name('users.store')->post('/users', [UserController::class, 'store']);
$router->name('users.edit')->get('/users/{id}/edit', [UserController::class, 'edit']);
$router->name('users.update')->put('/users/{id}', [UserController::class, 'update']);
$router->name('users.delete')->delete('/users/{id}', [UserController::class, 'delete']);
$router->name('login')->get('/login', [LoginController::class, 'login']);

?>