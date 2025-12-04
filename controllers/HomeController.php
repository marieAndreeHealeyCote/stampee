<?php

namespace App\Controllers;

use App\Providers\View;
use App\Providers\Auth;

class HomeController
{

    public function index()
    {
        $data = "Bienvenue sur la page d'accueil du site Stampee";
        return View::render("home", ['data' => $data]);
    }
}
