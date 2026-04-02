<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    function welcomeFromChildController($id): string
    {
        return $this->welcomeFromParentController($id);
    }
}