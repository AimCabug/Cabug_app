<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show() {
        $user = [
            [
                'SERVICE' => 'CONTROLLER',
                'name' => 'Aim Cabug',
                'gender' => 'Male'
            ],
            [
                'name' => 'Aimy Cabug',
                'gender' => 'Female'
            ]
        ];
        return response($user);
    }
    public function index(UserService $userService) {
        return $userService->listUsers();
    }
}
