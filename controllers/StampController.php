<?php

namespace App\Controllers;

use App\Models\Stamp;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class StampController
{

    public function index()
    {
        $stamp = new Stamp;
        $selectStamp = $stamp->select();

        if ($selectStamp) {
            $listeStamps = [];

            return View::render("stamp/index", ['listeStamps' => $listeStamps]);
        }

        return View::render('error');
    }


    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {

            $stamp = new Stamp;
            $selectStamp = $stamp->selectId($data['stamp_id']);

            if ($selectStamp) {

                return View::render("stamp/show", ['inputs' => $selectStamp]);
            } else {
                return View::render('error', ['msg' => 'Stamp not found!']);
            }
            return View::render('error', ['msg' => '404 page not found!']);
        }
    }

    public function create()
    {
        Auth::session();
    }

    public function store($data = [], $get = [], $files = [])
    {
        Auth::session();
    }

    public function edit($data = [])
    {
        Auth::session();
    }

    public function update($data = [], $get = [], $files = [])
    {
        Auth::session();
    }

    public function delete($data = [])
    {
        Auth::session();

        $stamp = new Stamp;
        $delete = $stamp->delete($data['stamp_id']);
        if ($delete) {
            return View::redirect('stamps');
        }
        return View::render('error');
    }
}
