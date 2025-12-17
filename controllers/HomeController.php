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

class HomeController
{

    public function index()
    {
        $selectAuction = (new Auction)->selectMostPopular();

        if ($selectAuction) {
            $listAuctions = [];

            foreach ($selectAuction as $auction) {

                $stamp = new Stamp;
                $selectStamp = $stamp->selectId($auction['stamp_id']);

                $image = new Image;
                $listImages = $image->selectAllWhere($selectStamp['id'], 'stamp_id');

                $listAuctions[] = [
                    'id' => $auction['id'],
                    'total_bids' => $auction['total'],
                    'date_start' => $auction['date_start'],
                    'date_end' => $auction['date_end'],
                    'floor_price' => $auction['floor_price'],
                    'lord_favorite' => $auction['lord_favorite'],
                    'stamp_id' => $auction['stamp_id'],
                    'stamp_name' => $selectStamp['name'],
                    'stamp_image' => $listImages[0],
                ];
            }
            return View::render('home', [
                'listAuctions' => $listAuctions,
            ]);
        }

        return View::render('error', ['msg' => '404 page not found!']);
    }
}
