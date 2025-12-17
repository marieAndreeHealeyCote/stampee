<?php

namespace App\Controllers;

use App\Models\Stamp;
use App\Models\Country;
use App\Models\Color;
use App\Models\Condition;
use App\Models\Image;
use App\Models\Auction;
use App\Models\Bid;
use App\Providers\View;
use App\Providers\Auth;

class AuctionController
{
    public function index($data = [])
    {
        Auth::session();

        $auction = new Auction;
        $selectAuction = $auction->select();

        $country = new Country;
        $selectCountry = $country->select();

        $color = new Color;
        $selectColor = $color->select();

        $condition = new Condition;
        $selectCondition = $condition->select();

        if ($selectAuction) {
            $listAuctions = [];

            foreach ($selectAuction as $auction) {

                $stamp = new Stamp;
                $selectStamp = $stamp->selectId($auction['stamp_id']);

                if ($this->doesMatchFilter($selectStamp, $auction, $data) == false) {
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
            return View::render('auction/index', [
                'listAuctions' => $listAuctions,
                'listFilters' => [
                    'countries' => $selectCountry,
                    'colors' => $selectColor,
                    'conditions' => $selectCondition,
                ],
                'userFilters' => $data,
            ]);
        }

        return View::render('error', ['msg' => '404 page not found!']);
    }

    private function doesMatchFilter($selectStamp, $auction, $data = [])
    {
        if (isset($data['is_certified'])) {
            if ($selectStamp['is_certified'] != 1) return false;
        }
        if (isset($data['colors'])) {
            if (!in_array($selectStamp['color_id'], $data['conditions'])) return false;
        }
        if (isset($data['conditions'])) {
            if (!in_array($selectStamp['condition_id'], $data['conditions'])) return false;
        }
        if (isset($data['countries']) && $data['countries'] != 'any') {
            if ($selectStamp['country_id'] != $data['countries']) return false;
        }
        if (isset($data['year-start']) && $data['year-start'] != 'any') {
            if ((int)$selectStamp['year'] < (int)$data['year-start']) return false;
        }
        if (isset($data['year-end']) && $data['year-end'] != 'any') {
            if ((int)$selectStamp['year'] > (int)$data['year-end']) return false;
        }

        //comparer le range de prix avec le bid le plus élevé
        //sinon, on compare avec le floor_price de l'enchère
        $bid = new Bid();
        $listBids = $bid->selectAllWhere($auction['id'], 'auction_id');

        if (count($listBids) > 0) {
            $highestBid = array_column($listBids, 'bid'); //récupérer que "bid"
            asort($highestBid, SORT_NUMERIC); //mettre en ordre croissant
            $highestBid = (int)array_pop($highestBid); //récupérer la dernière valeur et forcer (int)

            if (isset($data['price-start']) && $data['price-start'] != 'any') {
                if ($highestBid < (int)$data['price-start']) return false;
            }
            if (isset($data['price-end']) && $data['price-end'] != 'any') {
                if ($highestBid > (int)$data['price-end']) return false;
            }
        } else {
            if (isset($data['price-start']) && $data['price-start'] != 'any') {
                if ((int)$auction['floor_price'] < (int)$data['price-start']) return false;
            }
            if (isset($data['price-end']) && $data['price-end'] != 'any') {
                if ((int)$auction['floor_price'] > (int)$data['price-end']) return false;
            }
        }

        return true;
    }

    public function show($data = [])
    {

        if (isset($data['auction_id']) && $data['auction_id'] != null) {
            $auction = new Auction;
            $selectAuction = $auction->selectId($data['auction_id']);

            if ($selectAuction) {

                $highestBid = (new Auction)->getHighestBid($selectAuction['id']);

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

                $listAuctions = [
                    'id' => $selectAuction['id'],
                    'highest_bid' => $highestBid,
                    'date_start' => $selectAuction['date_start'],
                    'date_end' => $selectAuction['date_end'],
                    'floor_price' => $selectAuction['floor_price'],
                    'lord_favorite' => $selectAuction['lord_favorite'],
                ];

                return View::render("auction/show", [
                    'auction_id' => $data['auction_id'],
                    'listAuctions' => $listAuctions,
                    'selectStamp' => $selectStamp,
                    'listImages' => $listImages,
                ]);
            } else {
                return View::render('error', ['msg' => 'Auction not found!']);
            }
        } else {
            return View::render('error', ['msg' => '404 page not found!']);
        }
    }

    public function indexFavorites()
    {
        return View::render("user/my-favorites");
    }

    public function history($data = [])
    {
        return View::render("auction/history", ['auction_id' => $data['auction_id']]);
    }

    public function question($data = [])
    {
        return View::render("auction/question", ['auction_id' => $data['auction_id']]);
    }
}
