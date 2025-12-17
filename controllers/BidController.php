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

    public function store($data = [])
    {
        Auth::session();

        $validator = new Validator;
        $validator->field('auction_id', $data['auction_id'])->required(); //auction_id
        $validator->field('bid', $data['bid'])->required()->int();

        if ($validator->isSuccess()) {
            //ajouter / ajuster champs
            $data['user_id'] = (int)$_SESSION['user_id'];
            $data['date'] = date('Y-m-d H:i:s');

            $bid = new Bid;
            $insert = $bid->insert($data);

            if ($insert) {
                return View::redirect('auction/show?auction_id=' . $data['auction_id']);
            } else {
                return View::render('error', ['msg' => 'An error has occurred, bid could not be created !']);
            }
        } else {
            $errors = $validator->getErrors();
            $inputs = $data;

            $auction = new Auction;
            $selectAuction = $auction->selectId($data['auction_id']);

            $selectAuction['highest_bid'] = (new Auction)->getHighestBid($data['auction_id']);

            $stamp = new Stamp;
            $selectStamp = $stamp->selectId($selectAuction['stamp_id']);

            $country = new Country;
            $selectCountry = $country->selectId($selectStamp['country_id']);
            $selectStamp['country_name'] = $selectCountry['name'];

            $color = new Color;
            $selectColor = $color->selectId($selectStamp['color_id']);
            $selectStamp['color_name'] = $selectColor['name'];

            $condition = new Condition;
            $selectCondition = $condition->selectId($selectStamp['condition_id']);
            $selectStamp['condition_name'] = $selectCondition['name'];

            $image = new Image;
            $listImages = $image->selectAllWhere($selectStamp['id'], 'stamp_id');

            return View::redirect('bid/create?auction_id=' . $data['auction_id'], [
                'errors' => $errors,
                'inputs' => $inputs,
                'auction_id' => $data['auction_id'],
                'selectAuction' => $selectAuction,
                'selectStamp' => $selectStamp,
                'listImages' => $listImages,
            ]);
        }
    }

    public function create($data = [])
    {
        Auth::session();

        $auction = new Auction;
        $selectAuction = $auction->selectId($data['auction_id']);

        $selectAuction['highest_bid'] = (new Auction)->getHighestBid($data['auction_id']);

        $stamp = new Stamp;
        $selectStamp = $stamp->selectId($selectAuction['stamp_id']);

        $country = new Country;
        $selectCountry = $country->selectId($selectStamp['country_id']);
        $selectStamp['country_name'] = $selectCountry['name'];

        $color = new Color;
        $selectColor = $color->selectId($selectStamp['color_id']);
        $selectStamp['color_name'] = $selectColor['name'];

        $condition = new Condition;
        $selectCondition = $condition->selectId($selectStamp['condition_id']);
        $selectStamp['condition_name'] = $selectCondition['name'];

        $image = new Image;
        $listImages = $image->selectAllWhere($selectStamp['id'], 'stamp_id');

        return View::render('bid/create', [
            'inputs' => [], //$inputs,
            'auction_id' => $data['auction_id'],
            'selectAuction' => $selectAuction,
            'selectStamp' => $selectStamp,
            'listImages' => $listImages,
        ]);
    }
}
