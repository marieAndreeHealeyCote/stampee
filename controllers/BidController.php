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

    public function create() //correspond à "listings"
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

    public function show() //correspond à "details"
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
}
