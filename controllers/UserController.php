<?php

namespace App\Controllers;

use App\Providers\View;
use App\Models\User;
use App\Providers\Validator;
use App\Providers\Auth;

class UserController
{

    public function create()
    {
        return View::render('user/create');
    }

    public function index()
    {
        // Auth::session();

        return View::render('user/index', ['stamps' => [], 'bids' => [], 'auctions' => [], 'favorites' => []]);
    }

    public function store($data)
    {
        $validator = new Validator;
        $validator->field('name', $data['name'])->required()->min(2)->max(50);
        $validator->field('email', $data['email'])->unique('User')->required()->max(50)->email();
        $validator->field('password', $data['password'])->min(6)->max(20);

        if ($validator->isSuccess()) {
            $user = new User;
            $data['password'] = $user->hashPassword($data['password']);
            $insert = $user->insert($data);
            if ($insert) {
                return view::redirect('login');
            } else {
                return view::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            return view::render('user/create', ['errors' => $errors, 'user' => $data]);
        }
    }

    public function edit()
    {
        return View::render('user/edit');
    }

    public function update($data, $id)
    {
        $validator = new Validator;
        $validator->field('name', $data['name'])->required()->min(2)->max(50);
        $validator->field('email', $data['email'])->unique('User')->required()->max(50)->email();
        $validator->field('password', $data['password'])->min(6)->max(20);

        if ($validator->isSuccess()) {
            $user = new User;
            $data['password'] = $user->hashPassword($data['password']);
            $insert = $user->update($data, $id);
            if ($insert) {
                return view::redirect('auth/show');
            } else {
                return view::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            return view::render('user/edit', ['errors' => $errors, 'user' => $data]);
        }
    }
}
