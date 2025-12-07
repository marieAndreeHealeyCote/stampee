<?php

namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;
use App\Models\User;


class AuthController
{

    public function create()
    {
        return View::render('auth/create');
    }

    public function store($data)
    {
        $user = new User;
        $checkuser = $user->checkUser($data['email'], $data['password']);
        if ($checkuser) {
            return View::redirect('home');
        } else {
            $errors['message'] = "Invalid credentials";
            return view::render('auth/create', ['errors' => $errors, 'user' => $data]);
        }
    }
    public function delete()
    {
        session_destroy();
        return View::redirect('login');
    }
}
