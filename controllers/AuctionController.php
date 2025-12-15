<?php

namespace App\Controllers;

use App\Providers\View;
use App\Models\User;
use App\Providers\Validator;
use App\Providers\Auth;
use App\Providers\Stamp;

class AuctionController
{
    public function index()
    {
        Auth::session();

        return View::redirect('stamps');
    }
}
