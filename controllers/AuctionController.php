<?php

namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
use App\Models\User;
use App\Models\Stamp;
use App\Models\Auction;

class AuctionController
{
    public function index()
    {
        Auth::session();

        $auction = new Auction;
        $selectAuction = $auction->select();

        if ($selectAuction) {
            $listAuctions = [];

            foreach ($selectAuction as $auction) {

                $stamp = new Stamp;
                $selectStamp = $stamp->selectId($stamp['stamp_id']);

                $listAuctions[] = [
                    'id' => $auction['id'],
                    'date_start' => $auction['date_start'],
                    'date_end' => $auction['date_end'],
                    'floor_price' => $auction['floor_price'],
                    'lord_favorite' => $auction['lord_favorite'],
                    'stamp_id' => $selectStamp['stamp_id'],
                ];
            }

            return View::redirect('auction/index', ['listAuctions' => $listAuctions]);
        }

        return View::render('error');
    }
}
