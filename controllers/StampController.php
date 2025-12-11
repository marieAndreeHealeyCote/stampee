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
                $selectImage = $image->selectId($stamp['id']);

                $listStamps[] = [
                    'id' => $stamp['id'],
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
        $validator->field('year', $data['year'])->required()->year();
        $validator->field('country_id', $data['country_id'])->required();
        $validator->field('color_id', $data['color_id'])->required();
        $validator->field('condition_id', $data['condition_id'])->required();

        $upload1_present = isset($files['upload1']) && !empty($files['upload1']['name']);
        if ($upload1_present) {
            $validator->field('upload1', $files['upload1'])->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
        }
        $upload2_present = isset($files['upload2']) && !empty($files['upload2']['name']);
        if ($upload2_present) {
            $validator->field('upload2', $files['upload2'])->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
        }
        $upload3_present = isset($files['upload3']) && !empty($files['upload3']['name']);
        if ($upload3_present) {
            $validator->field('upload3', $files['upload3'])->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
        }
        $upload4_present = isset($files['upload4']) && !empty($files['upload4']['name']);
        if ($upload4_present) {
            $validator->field('upload4', $files['upload4'])->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
        }
        $upload5_present = isset($files['upload5']) && !empty($files['upload5']['name']);
        if ($upload5_present) {
            $validator->field('upload5', $files['upload5'])->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
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
                if ($upload1_present) {
                    $target_dir = __DIR__ . '/../public/uploads/';
                    $target_file = $target_dir . basename($files["upload1"]["name"]);
                    if (move_uploaded_file($files["upload1"]["tmp_name"], $target_file)) {
                        //mettre à jour $data avec le path du fichier
                        $filename = basename($files["upload1"]["name"]);
                        $data['upload1'] = "/public/uploads/" . $filename;

                        $image = new Image;
                        $image->insert(['url' => $data['upload1'], 'stamp_id' => $insert]);
                    } else {
                        die('oh no...store');
                        return View::render('error', "Sorry, there was an error with uploading your file");
                    }
                }
                if ($upload2_present) {
                    $target_dir = __DIR__ . '/../public/uploads/';
                    $target_file = $target_dir . basename($files["upload2"]["name"]);
                    if (move_uploaded_file($files["upload2"]["tmp_name"], $target_file)) {
                        //mettre à jour $data avec le path du fichier
                        $filename = basename($files["upload2"]["name"]);
                        $data['upload2'] = "/public/uploads/" . $filename;

                        $image = new Image;
                        $image->insert(['url' => $data['upload2'], 'stamp_id' => $insert]);
                    } else {
                        die('oh no...store');
                        return View::render('error', "Sorry, there was an error with uploading your file");
                    }
                }
                if ($upload3_present) {
                    $target_dir = __DIR__ . '/../public/uploads/';
                    $target_file = $target_dir . basename($files["upload3"]["name"]);
                    if (move_uploaded_file($files["upload3"]["tmp_name"], $target_file)) {
                        //mettre à jour $data avec le path du fichier
                        $filename = basename($files["upload3"]["name"]);
                        $data['upload3'] = "/public/uploads/" . $filename;

                        $image = new Image;
                        $image->insert(['url' => $data['upload3'], 'stamp_id' => $insert]);
                    } else {
                        die('oh no...store');
                        return View::render('error', "Sorry, there was an error with uploading your file");
                    }
                }
                if ($upload4_present) {
                    $target_dir = __DIR__ . '/../public/uploads/';
                    $target_file = $target_dir . basename($files["upload4"]["name"]);
                    if (move_uploaded_file($files["upload4"]["tmp_name"], $target_file)) {
                        //mettre à jour $data avec le path du fichier
                        $filename = basename($files["upload4"]["name"]);
                        $data['upload4'] = "/public/uploads/" . $filename;

                        $image = new Image;
                        $image->insert(['url' => $data['upload4'], 'stamp_id' => $insert]);
                    } else {
                        die('oh no...store');
                        return View::render('error', "Sorry, there was an error with uploading your file");
                    }
                }
                if ($upload5_present) {
                    $target_dir = __DIR__ . '/../public/uploads/';
                    $target_file = $target_dir . basename($files["upload5"]["name"]);
                    if (move_uploaded_file($files["upload5"]["tmp_name"], $target_file)) {
                        //mettre à jour $data avec le path du fichier
                        $filename = basename($files["upload5"]["name"]);
                        $data['upload5'] = "/public/uploads/" . $filename;

                        $image = new Image;
                        $image->insert(['url' => $data['upload5'], 'stamp_id' => $insert]);
                    } else {
                        return View::render('error', "Sorry, there was an error with uploading your file");
                    }
                }

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

            $upload1_present = isset($files['upload1']) && !empty($files['upload1']['name']);
            if ($upload1_present) {
                $validator->field('upload1', $files['upload1'])->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
            }
            $upload2_present = isset($files['upload2']) && !empty($files['upload2']['name']);
            if ($upload2_present) {
                $validator->field('upload2', $files['upload2'])->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
            }
            $upload3_present = isset($files['upload3']) && !empty($files['upload3']['name']);
            if ($upload3_present) {
                $validator->field('upload3', $files['upload3'])->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
            }
            $upload4_present = isset($files['upload4']) && !empty($files['upload4']['name']);
            if ($upload4_present) {
                $validator->field('upload4', $files['upload4'])->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
            }
            $upload5_present = isset($files['upload5']) && !empty($files['upload5']['name']);
            if ($upload5_present) {
                $validator->field('upload5', $files['upload5'])->image()->fileType(["image/jpg", "image/jpeg", "image/png", "image/gif", "image/webp"])->max(500000);
            }

            if ($validator->isSuccess()) {

                //modifier le timbre
                $stamp = new Stamp;
                $insert = $stamp->update($data, $get['id']);
                if ($insert) {

                    //téléverser l'image
                    if ($upload1_present) {
                        $target_dir = __DIR__ . '/../public/uploads/';
                        $target_file = $target_dir . basename($files["upload1"]["name"]);
                        if (move_uploaded_file($files["upload1"]["tmp_name"], $target_file)) {
                            //mettre à jour $data avec le path du fichier
                            $filename = basename($files["upload1"]["name"]);
                            $data['upload1'] = "/public/uploads/" . $filename;

                            $image = new Image;
                            $image->insert(['url' => $data['upload1'], 'stamp_id' => $insert]);
                        } else {
                            die('oh no...store');
                            return View::render('error', "Sorry, there was an error with uploading your file");
                        }
                    }
                    if ($upload2_present) {
                        $target_dir = __DIR__ . '/../public/uploads/';
                        $target_file = $target_dir . basename($files["upload2"]["name"]);
                        if (move_uploaded_file($files["upload2"]["tmp_name"], $target_file)) {
                            //mettre à jour $data avec le path du fichier
                            $filename = basename($files["upload2"]["name"]);
                            $data['upload2'] = "/public/uploads/" . $filename;

                            $image = new Image;
                            $image->insert(['url' => $data['upload2'], 'stamp_id' => $insert]);
                        } else {
                            die('oh no...store');
                            return View::render('error', "Sorry, there was an error with uploading your file");
                        }
                    }
                    if ($upload3_present) {
                        $target_dir = __DIR__ . '/../public/uploads/';
                        $target_file = $target_dir . basename($files["upload3"]["name"]);
                        if (move_uploaded_file($files["upload3"]["tmp_name"], $target_file)) {
                            //mettre à jour $data avec le path du fichier
                            $filename = basename($files["upload3"]["name"]);
                            $data['upload3'] = "/public/uploads/" . $filename;

                            $image = new Image;
                            $image->insert(['url' => $data['upload3'], 'stamp_id' => $insert]);
                        } else {
                            die('oh no...store');
                            return View::render('error', "Sorry, there was an error with uploading your file");
                        }
                    }
                    if ($upload4_present) {
                        $target_dir = __DIR__ . '/../public/uploads/';
                        $target_file = $target_dir . basename($files["upload4"]["name"]);
                        if (move_uploaded_file($files["upload4"]["tmp_name"], $target_file)) {
                            //mettre à jour $data avec le path du fichier
                            $filename = basename($files["upload4"]["name"]);
                            $data['upload4'] = "/public/uploads/" . $filename;

                            $image = new Image;
                            $image->insert(['url' => $data['upload4'], 'stamp_id' => $insert]);
                        } else {
                            die('oh no...store');
                            return View::render('error', "Sorry, there was an error with uploading your file");
                        }
                    }
                    if ($upload5_present) {
                        $target_dir = __DIR__ . '/../public/uploads/';
                        $target_file = $target_dir . basename($files["upload5"]["name"]);
                        if (move_uploaded_file($files["upload5"]["tmp_name"], $target_file)) {
                            //mettre à jour $data avec le path du fichier
                            $filename = basename($files["upload5"]["name"]);
                            $data['upload5'] = "/public/uploads/" . $filename;

                            $image = new Image;
                            $image->insert(['url' => $data['upload5'], 'stamp_id' => $insert]);
                        } else {
                            return View::render('error', "Sorry, there was an error with uploading your file");
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

    public function delete($data = [])
    {
        Auth::session();

        $stamp = new Stamp;
        $delete = $stamp->delete($data['id']);
        if ($delete) {
            return View::redirect('stamps');
        }
        return View::render('error');
    }
}
