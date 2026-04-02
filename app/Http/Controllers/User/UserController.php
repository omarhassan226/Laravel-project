<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function getUser($id): string{
        return "Get user with id: " . $id;
    }

    function getAllUsers(): mixed{
        return view('usersCards',['users'=>[
            ['id'=>1,'name'=>'John Doe','email'=>'john@example.com'],
            ['id'=>2,'name'=>'Jane Doe','email'=>'jane@example.com']
        ]]);
    }
}
