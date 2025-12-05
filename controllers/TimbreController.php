<?php

namespace App\Controllers;

use App\Models\Timbre;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class TimbreController
{

    public function index()
    {
        $timbre = new Timbre;
        $selectTimbre = $timbre->select();

        if ($selectTimbre) {
            $listeTimbres = [];

            return View::render("timbre/index", ['listeTimbres' => $listeTimbres]);
        }

        return View::render('error');
    }


    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {

            $timbre = new Timbre;
            $selectTimbre = $timbre->selectId($data['stamp_id']);

            if ($selectTimbre) {

                return View::render("timbre/show", ['inputs' => $selectTimbre]);
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

        $timbre = new Timbre;
        $delete = $timbre->delete($data['stamp_id']);
        if ($delete) {
            return View::redirect('timbres');
        }
        return View::render('error');
    }
}
