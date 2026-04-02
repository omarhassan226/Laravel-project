<?php

namespace App\Http\Controllers;

abstract class Controller
{
    function welcomeFromParentController($id): string
    {
        return 'Welcome to our e-commerce application!, your ID is: ' . $id;
    }
}