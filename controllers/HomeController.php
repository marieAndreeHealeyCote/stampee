<?php

namespace App\Controllers;

use App\Providers\View;
use App\Providers\Auth;

class HomeController
{

    public function index()
    {
        $data = "Welcome all philatelists";
        return View::render("home", ['data' => $data]);
    }
}
