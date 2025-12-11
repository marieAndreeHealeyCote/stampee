<?php

namespace App\Controllers;

use App\Models\Stamp;
use App\Models\Country;
use App\Models\Color;
use App\Models\Condition;
use App\Models\Image;
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
            $listStamps = [];

            foreach ($selectStamp as $stamp) {

                $country = new Country;
                $selectCountry = $country->selectId($stamp['country_id']);

                $color = new Color;
                $selectColor = $color->selectId($stamp['color_id']);

                $condition = new Condition;
                $selectCondition = $condition->selectId($stamp['condition_id']);

                $image = new Image;
                $selectImage = $image->selectId($stamp['stamp_id']);

                $listStamps[] = [
                    'id' => $stamp['id'],
                    'name' => $stamp['name'],
                    'stamp_id' => $stamp['stamp_id'],
                    'name' => $stamp['name'],
                    'year' => $stamp['year'],
                    'is_certified' => $stamp['is_certified'],
                    'country_name' => $selectCountry['name'],
                    'color_name' => $selectColor['name'],
                    'condition_name' => $selectCondition['name'],
                    'images' => $selectImage,
                ];
            }

            return View::render("stamp/index", ['listStamps' => $listStamps]);
        }

        return View::render('error');
    }


    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {

            $stamp = new Stamp;
            $selectStamp = $stamp->selectId($data['stamp_id']);

            if ($selectStamp) {

                $country = new Country;
                $selectCountry = $country->selectId($selectStamp['country_id']);

                $color = new Color;
                $selectColor = $color->selectId($selectStamp['color_id']);

                $condition = new Condition;
                $selectCondition = $condition->selectId($selectStamp['condition_id']);

                $image = new Image;
                $listImages = $image->selectId($selectStamp['stamp_id']);

                $inputs = [
                    'name' => $selectStamp['name'],
                    'year' => $selectStamp['year'],
                    'is_certified' => $selectStamp['is_certified'],
                    'country' => $selectCountry['name'],
                    'color' => $selectColor['name'],
                    'condition' => $selectCondition['name'],
                ];

                return View::render("stamp/show", [
                    'inputs' => $inputs,
                    'listImages' => $listImages,
                ]);
            } else {
                return View::render('error', ['msg' => 'Stamp not found!']);
            }
            return View::render('error', ['msg' => '404 page not found!']);
        }
    }

    public function create()
    {
        Auth::session();

        //récupérer les listes pour les Select
        $country = new Country;
        $listCountries = $country->select();

        $color = new Color;
        $listColors = $color->select();

        $condition = new Condition;
        $listConditions = $condition->select();

        $image = new Image;
        $listImages = $image->select();

        return View::render('stamp/create', [
            'listCountries' => $listCountries,
            'listColors' => $listColors,
            'listConditions' => $listConditions,
            'listImages' => $listImages,
        ]);
    }

    public function store($data = [], $get = [], $files = [])
    {
        Auth::session();

        $validator = new Validator;
        $validator->field('name', $data['name'])->required()->max(100);
        $validator->field('stamp_id', $data['stamp_id'])->required()->int();
        $validator->field('year', $data['year'])->required()->year();
        $validator->field('is_certified', $data['is_certified'])->required();
        $validator->field('country_id', $data['country_id'])->required()->int();
        $validator->field('color_id', $data['color_id'])->required()->int();
        $validator->field('condition_id', $data['condition_id'])->required()->int();

        if (isset($files['upload'])) {
            $validator->field('upload', $files['upload'])->image()->fileType(["image/jpeg", "image/png", "image/gif"])->max(500000);
        }

        if ($validator->isSuccess()) {

            //téléverser l'image
            if (isset($files['upload'])) {
                $target_dir = __DIR__ . '/../public/uploads/';
                $target_file = $target_dir . basename($files["upload"]["name"]);
                if (move_uploaded_file($files["upload"]["tmp_name"], $target_file)) {
                    //mettre à jour $data avec le path du fichier
                    $filename = basename($files["upload"]["name"]);
                    $data['upload'] = "/public/uploads/" . $filename;
                } else {
                    die('oh no...store');
                    return View::render('error', "Sorry, there was an error with uploading your file");
                }
            }

            //créer un timbre
            $stamp = new Stamp;
            $insert = $stamp->insert($data);

            if ($insert) {
                return View::redirect('stamp/show?id=' . $insert);
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            $inputs = $data;

            //récupérer les listes pour les Select
            $country = new Country;
            $listCountries = $country->select();

            $color = new Color;
            $listColors = $color->select();

            $condition = new Condition;
            $listConditions = $condition->select();

            $image = new Image;
            $listImages = $image->select();

            return View::render('stamp/create', [
                'errors' => $errors,
                'inputs' => $inputs,
                'listCountries' => $listCountries,
                'listColors' => $listColors,
                'listConditions' => $listConditions,
                'listImages' => $listImages,
            ]);
        }
    }

    public function edit($data = [])
    {
        Auth::session();

        if (isset($data['id']) && $data['id'] != null) {
            $stamp = new Stamp;
            $selectStamp = $stamp->selectId($data['id']);
            if ($selectStamp) {
                //récupérer les listes pour les Select
                $country = new Country;
                $listCountries = $country->select();

                $color = new Color;
                $listColors = $color->select();

                $condition = new Condition;
                $listConditions = $condition->select();

                $image = new Image;
                $listImages = $image->select();

                $inputs = [
                    'name' => $selectStamp['name'],
                    'year' => $selectStamp['year'],
                    'is_certified' => $selectStamp['is_certified'],
                    'country' => $selectStamp['country_id'],
                    'color' => $selectStamp['color_id'],
                    'condition' => $selectStamp['condition_id'],
                ];

                return View::render("stamp/edit", [
                    'inputs' => $inputs,
                    'listCountries' => $listCountries,
                    'listColors' => $listColors,
                    'listConditions' => $listConditions,
                    'listImages' => $listImages,
                ]);
            } else {
                return View::render('error', ['msg' => 'Stamp not found!']);
            }
            return View::render('error', ['msg' => '404 page not found!']);
        }
    }

    public function update($data = [], $get = [], $files = [])
    {
        Auth::session();

        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('name', $data['name'])->required()->max(100);
            $validator->field('stamp_id', $data['stamp_id'])->required()->int();
            $validator->field('year', $data['year'])->required()->year();
            $validator->field('is_certified', $data['is_certified'])->required();
            $validator->field('country_id', $data['country_id'])->required()->int();
            $validator->field('color_id', $data['color_id'])->required()->int();
            $validator->field('condition_id', $data['condition_id'])->required()->int();

            if (isset($files['upload'])) {
                $validator->field('upload', $files['upload'])->image()->fileType(["image/jpeg", "image/png", "image/gif"])->max(500000);
            }

            if ($validator->isSuccess()) {

                //téléverser l'image
                if (isset($files['upload'])) {
                    $target_dir = __DIR__ . '/../public/uploads/';
                    $target_file = $target_dir . basename($files["upload"]["name"]);
                    if (move_uploaded_file($files["upload"]["tmp_name"], $target_file)) {
                        //mettre à jour $data avec le path du fichier
                        $filename = basename($files["upload"]["name"]);
                        $data['upload'] = "/public/uploads/" . $filename;
                    } else {
                        die('oh no...update');
                        return View::render('error', "Sorry, there was an error uploading your file");
                    }
                }

                //modifier le timbre
                $stamp = new Stamp;
                $insert = $stamp->update($data, $get['id']);
                if ($insert) {
                    return View::redirect('stamp/show?id=' . $get['id']);
                } else {
                    return View::render('error');
                }
            } else {
                $errors = $validator->getErrors();
                $inputs = $data;

                //récupérer à nouveau les listes pour les Select
                $country = new Country;
                $listCountries = $country->select();

                $color = new Color;
                $listColors = $color->select();

                $condition = new Condition;
                $listConditions = $condition->select();

                $image = new Image;
                $listImages = $image->select(); //TODO voir pour les images

                return View::render('stamp/edit', [
                    'errors' => $errors,
                    'inputs' => $inputs,
                    'listCountries' => $listCountries,
                    'listColors' => $listColors,
                    'listConditions' => $listConditions,
                    'listImages' => $listImages,
                ]);
            }
        }
        return View::render('error');
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
