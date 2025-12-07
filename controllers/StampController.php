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
            $listStamps = [];

            foreach ($selectlivre as $tmp) {
                $auteur_id = $tmp['auteur_id'];

                $auteur = new Auteur;
                $selectAuteur = $auteur->selectId($auteur_id);
                $auteurNom = $selectAuteur['nom'];
                // ajouter les noms des auteur, éditeur, catégorie
                $listeLivres[] = [
                    'id' => $tmp['id'],
                    'titre' => $tmp['titre'],
                    'auteur_id' => $tmp['auteur_id'],
                    'auteur_nom' => $auteurNom,
                    'categorie_id' => $tmp['categorie_id'],
                    'categorie_nom' => $categorieNom,
                    'editeur_id' => $tmp['editeur'],
                    'editeur_nom' => $editeurNom,
                    'annee_publication' => $tmp['annee_publication'],
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

                $auteur_id = $selectLivre['auteur_id'];

                $auteur = new Auteur;
                $selectAuteur = $auteur->selectId($auteur_id);
                $auteurNom = $selectAuteur['nom'];

                // ajouter les noms des auteur, éditeur, catégorie
                $selectLivre['auteur_nom'] = $auteurNom;

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

        $auteur = new Auteur;
        $listeAuteurs = $auteur->select();

        return View::render("livre/create", [
            'listeAuteurs' => $listeAuteurs
        ]);
    }

    public function store($data = [], $get = [], $files = [])
    {
        Auth::session();

        $validator = new Validator;
        $validator->field('name', $data['name'])->required()->max(100);
        $validator->field('auteur_id', $data['auteur_id'])->required()->int();
        $validator->field('annee_publication', $data['annee_publication'])->required()->int();

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

            //créer un livre
            $livre = new Livre;
            $insert = $livre->insert($data);

            if ($insert) {
                return View::redirect('livre/show?id=' . $insert);
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            $inputs = $data;

            //récupérer à nouveau les listes pour les Select
            $auteur = new Auteur;
            $listeAuteurs = $auteur->select();

            return View::render('livre/create', [
                'errors' => $errors,
                'inputs' => $inputs,
                'listeAuteurs' => $listeAuteurs
            ]);
        }
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
