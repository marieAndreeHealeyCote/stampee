<?php

namespace App\Controllers;

use App\Models\Stamp;
use App\Models\Country;
use App\Models\Color;
use App\Models\Condition;
use App\Models\Image;
use App\Models\Auction;
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
                $listImages = $image->selectAllWhere($stamp['id'], 'stamp_id');

                $listStamps[] = [
                    'id' => $stamp['id'],
                    'name' => $stamp['name'],
                    'year' => $stamp['year'],
                    'is_certified' => $stamp['is_certified'],
                    'country_name' => $selectCountry['name'],
                    'color_name' => $selectColor['name'],
                    'condition_name' => $selectCondition['name'],
                    'image' => $listImages[0],
                ];
            }

            return View::render("stamp/index", ['listStamps' => $listStamps]);
        }

        return View::render('error', ['msg' => '404 page not found!']);
    }


    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {

            $stamp = new Stamp;
            $selectStamp = $stamp->selectId($data['id']);

            if ($selectStamp) {

                $country = new Country;
                $selectCountry = $country->selectId($selectStamp['country_id']);

                $color = new Color;
                $selectColor = $color->selectId($selectStamp['color_id']);

                $condition = new Condition;
                $selectCondition = $condition->selectId($selectStamp['condition_id']);

                $image = new Image;
                $listImages = $image->selectAllWhere($selectStamp['id'], 'stamp_id');

                $inputs = [
                    'id' => $data['id'],
                    'name' => $selectStamp['name'],
                    'year' => $selectStamp['year'],
                    'is_certified' => $selectStamp['is_certified'],
                    'country' => $selectCountry['name'],
                    'color' => $selectColor['name'],
                    'condition' => $selectCondition['name'],
                ];

                //vérifier si stamp est mis en enchère
                //si oui, ne pas afficher les boutons Edit et Delete
                $isAuctioned = false;
                $auction = new Auction;
                $listAuctions = $auction->selectAllWhere($data['id'], 'stamp_id'); //array ou false

                if ($listAuctions != false) {
                    $isAuctioned = true;
                }

                return View::render("stamp/show", [
                    'inputs' => $inputs,
                    'listImages' => $listImages,
                    'isAuctioned' => $isAuctioned,
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
        $validator->field('year', $data['year'])->required()->year();
        $validator->field('country_id', $data['country_id'])->required();
        $validator->field('color_id', $data['color_id'])->required();
        $validator->field('condition_id', $data['condition_id'])->required();

        $uploads = [];
        if (isset($files['upload'])) {
            $name = $files['upload']['name'];
            $type = $files['upload']['type'];
            $tmp_name = $files['upload']['tmp_name'];
            $error = $files['upload']['error'];
            $size = $files['upload']['size'];

            for ($i = 0; $i < count($name); $i++) {
                $uploads[$i] = [
                    'name' => $name[$i],
                    'type' => $type[$i],
                    'tmp_name' => $tmp_name[$i],
                    'error' => $error[$i],
                    'size' => $size[$i],
                ];
                $validator->field('upload', $uploads[$i])->required()->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
            }
        }

        if ($validator->isSuccess()) {
            //ajouter / ajuster champs
            $data['user_id'] = (int)$_SESSION['user_id'];
            $data['year'] = (int)$data['year'];
            $data['country_id'] = (int)$data['country_id'];
            $data['color_id'] = (int)$data['color_id'];
            $data['condition_id'] = (int)$data['condition_id'];

            //créer un timbre
            $stamp = new Stamp;
            $insert = $stamp->insert($data);

            if ($insert) {
                //téléverser l'image
                foreach ($uploads as $upload) {
                    $target_dir = __DIR__ . '/../public/uploads/';
                    $target_file = $target_dir . basename($upload["name"]);
                    if (move_uploaded_file($upload["tmp_name"], $target_file)) {
                        //mettre à jour $data avec le path du fichier
                        $filename = basename($upload["name"]);
                        $path = "/public/uploads/" . $filename;

                        $image = new Image;
                        $image->insert(['url' => $path, 'stamp_id' => $insert]);
                    } else {
                        return View::render('error', ['msg' => "Sorry, there was an error with uploading your file !"]);
                    }
                }

                return View::redirect('stamp/show?id=' . $insert);
            } else {
                return View::render('error', ['msg' => 'An error has occurred, stamp could not be created !']);
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
            $listImages = [];

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
                $listImages = $image->selectAllWhere($data['id'], 'stamp_id');

                $inputs = [
                    'id' => $data['id'],
                    'name' => $selectStamp['name'],
                    'year' => $selectStamp['year'],
                    'is_certified' => $selectStamp['is_certified'],
                    'country_id' => $selectStamp['country_id'],
                    'color_id' => $selectStamp['color_id'],
                    'condition_id' => $selectStamp['condition_id'],
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
            $validator->field('year', $data['year'])->required()->year();
            $validator->field('country_id', $data['country_id'])->required();
            $validator->field('color_id', $data['color_id'])->required();
            $validator->field('condition_id', $data['condition_id'])->required();

            $uploads = [];
            if (isset($files['upload'])) {
                $name = $files['upload']['name'];
                $type = $files['upload']['type'];
                $tmp_name = $files['upload']['tmp_name'];
                $error = $files['upload']['error'];
                $size = $files['upload']['size'];

                for ($i = 0; $i < count($name); $i++) {
                    $uploads[$i] = [
                        'name' => $name[$i],
                        'type' => $type[$i],
                        'tmp_name' => $tmp_name[$i],
                        'error' => $error[$i],
                        'size' => $size[$i],
                    ];
                    $validator->field('upload', $uploads[$i])->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
                }
            }

            if ($validator->isSuccess()) {

                //modifier le timbre
                $stamp = new Stamp;
                $insert = $stamp->update($data, $get['id']);
                if ($insert) {
                    //téléverser l'image
                    foreach ($uploads as $upload) {
                        $target_dir = __DIR__ . '/../public/uploads/';
                        $target_file = $target_dir . basename($upload["name"]);
                        if (move_uploaded_file($upload["tmp_name"], $target_file)) {
                            //mettre à jour $data avec le path du fichier
                            $filename = basename($upload["name"]);
                            $path = "/public/uploads/" . $filename;

                            $image = new Image;
                            $image->insert(['url' => $path, 'stamp_id' => $get['id']]);
                        } else {
                            return View::render('error', ['msg' => "Sorry, there was an error with uploading your file"]);
                        }
                    }

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
                $listImages = $image->selectAllWhere($get['id'], 'stamp_id');

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

    public function deleteImage($data = [])
    {
        Auth::session();
        if (isset($data['image_id']) && $data['image_id'] != null) {
            //supprimer les images en premier
            $image = new Image;
            $delete = $image->delete($data['image_id']);

            if ($delete) {
                return View::redirect('stamp/edit?id=' . $data['stamp_id']);
            }
            return View::render('error', ['msg' => 'Image not found !']);
        }

        return View::render('error', ['msg' => 'An error occured !']);
    }

    public function delete($data = [])
    {
        Auth::session();

        if (isset($data['id']) && $data['id'] != null) {
            //supprimer les images en premier
            $image = new Image;
            $deleteImage = $image->delete($data['id'], 'stamp_id');

            //si succès, on supprime le stamp
            $stamp = new Stamp;
            $delete = $stamp->delete($data['id']);
            if ($delete) {
                return View::redirect('stamps');
            }
        }

        return View::render('error', ['msg' => 'An error occured !']);
    }
}
