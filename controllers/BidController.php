<?php

namespace App\Controllers;

use App\Models\Stamp;
use App\Models\Country;
use App\Models\Color;
use App\Models\Condition;
use App\Models\Image;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\User;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class BidController
{
    public function index() //my-bids
    {
        Auth::session();
        $user_id = $_SESSION['user_id'];

        $bid = new Bid;
        $selectBids = $bid->selectAllWhere($user_id, 'user_id');

        $listBids = [];
        foreach ($selectBids as $bid) {
            $auction = new Auction;
            $selectAuction = $auction->selectId($bid['auction_id']);

            $stamp = new Stamp;
            $selectStamp = $stamp->selectId($selectAuction['stamp_id']);

            $image = new Image;
            $listImages = $image->selectAllWhere($selectStamp['id'], 'stamp_id');

            $listBids[] = [
                'id' => $bid['id'],
                'bid' => $bid['bid'],
                'date' => $bid['date'],
                'selectAuction' => $selectAuction,
                'selectStamp' => $selectStamp,
                'selectImage' => $listImages[0],
            ];
        }

        return View::render("user/my-bids", [
            'listBids' => $listBids,
        ]);
    }

    public function store($data = [], $get = [])
    {
        Auth::session();
        $user_id = $_SESSION['user_id'];

        $validator = new Validator;
        $validator->field('auction_id', $data['auction_id'])->required();
        $validator->field('bid', $data['bid'])->required()->int();

        if ($validator->isSuccess()) {
            //ajouter / ajuster champs
            $data['user_id'] = (int)$_SESSION['user_id'];

            //créer un timbre
            $stamp = new Bid;
            $insert = $stamp->insert($data);

            if ($insert) {
                //téléverser l'image
                return View::redirect('bid/create?id=' . $data['auction_id']);
            } else {
                return View::render('error', ['msg' => 'An error has occurred, bid could not be created !']);
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

    public function create()
    {
        Auth::session();

        return View::render("bid/create");
    }
}
