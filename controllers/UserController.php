<?php

namespace App\Controllers;

use App\Providers\View;
use App\Models\User;
use App\Providers\Validator;
use App\Providers\Auth;

class UserController
{

    public function __construct()
    {
        Auth::session();
    }
    public function create()
    {

        return View::render('user/create', ['' => ]);
    }

    public function store($data)
    {

        $validator = new Validator;
        $validator->field('name', $data['name'])->min(2)->max(50);
        $validator->field('password', $data['password'])->min(6)->max(20);
        $validator->field('email', $data['email'])->required()->max(50)->email();


        if ($validator->isSuccess()) {
            $user = new User;
            $data['password'] = $user->hashPassword($data['password']);
            $insert = $user->insert($data);
            var_dump($insert, $data);
            if ($insert) {
                return view::redirect('login');
            } else {
                return view::render('error');
            }
        }
    }
}
