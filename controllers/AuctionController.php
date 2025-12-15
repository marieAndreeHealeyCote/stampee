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

class AuctionController
{
    public function index($data = [])
    {
        Auth::session();

        $auction = new Auction;
        $selectAuction = $auction->select();

        if ($selectAuction) {
            $listAuctions = [];

            foreach ($selectAuction as $auction) {

                $stamp = new Stamp;
                $selectStamp = $stamp->selectId($auction['stamp_id']);

                if ($this->doesMatchFilter($stamp, $data) == false) {
                    continue;
                }

                $image = new Image;
                $listImages = $image->selectAllWhere($selectStamp['id'], 'stamp_id');


                $listAuctions[] = [
                    'id' => $auction['id'],
                    'date_start' => $auction['date_start'],
                    'date_end' => $auction['date_end'],
                    'floor_price' => $auction['floor_price'],
                    'lord_favorite' => $auction['lord_favorite'],
                    'stamp_id' => $auction['stamp_id'],
                    'stamp_name' => $selectStamp['name'],
                    'stamp_image' => $listImages[0],
                ];
            }

            return View::redirect('auction/index', ['listAuctions' => $listAuctions]);
        }

        return View::render('error');
    }

    private function doesMatchFilter($stamp, $data = [])
    {
        //$data['certified'][1]         <input name="certified[]" type="checkbox">
        //$data['colors'][1,2,3,4]      <input name="colors[]" type="checkbox">
        //$data['countries'][1,2,3,4]   <input name="countries[]" type="checkbox">
        //$data['conditions'][1,2,3,4]  <input name="conditions[]" type="checkbox">
        //$data['date-start']  <input name="date_start[]" type="">
        //$data['date-end']  <input name="date_end[]" type="">
        //$data['prix'] =   <input name="price[]" type="">
        if (isset($data['certified'])) {
            // valider 
            // return false;
        }
        if (isset($data['colors'])) {
            // return false;
        }
        if (isset($data['countries'])) {
            // return false;
        }
        if (isset($data['conditions'])) {
            // return false;
        }
        return true;
        if (isset($data['date'])) {
            // date enchère
            // return false;
        }
        return true;
        if (isset($data['prix'])) {
            // prix enchère
            // return false;
        }
        return true;
    }
}
