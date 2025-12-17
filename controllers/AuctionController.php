<?php

namespace App\Controllers;

use App\Models\Stamp;
use App\Models\Country;
use App\Models\Color;
use App\Models\Condition;
use App\Models\Image;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\Favorite;
use App\Providers\View;
use App\Providers\Auth;

class AuctionController
{
    public function index($data = [])
    {
        Auth::session();

        // Charger les filtres une seule fois
        $country = (new Country())->select();
        $color = (new Color())->select();
        $condition = (new Condition())->select();

        // Enchères actives
        $listAuctionsActive = [];
        $selectAuctionActive = (new Auction())->selectActive();
        foreach ($selectAuctionActive as $auction) {
            $stamp = (new Stamp())->selectId($auction['stamp_id']);
            if (!$stamp) continue;

            if (!$this->doesMatchFilter($stamp, $auction, $data)) continue;

            $images = (new Image())->selectAllWhere($stamp['id'], 'stamp_id');

            $listAuctionsActive[] = [
                'id' => $auction['id'],
                'date_start' => $auction['date_start'],
                'date_end' => $auction['date_end'],
                'floor_price' => $auction['floor_price'],
                'lord_favorite' => $auction['lord_favorite'],
                'stamp_id' => $stamp['id'],
                'stamp_name' => $stamp['name'],
                'stamp_image' => $images[0] ?? null,
            ];
        }

        // Enchères échues
        $listAuctionsExpired = [];
        $selectAuctionExpired = (new Auction())->selectExpired();
        foreach ($selectAuctionExpired as $auction) {
            $stamp = (new Stamp())->selectId($auction['stamp_id']);
            if (!$stamp) continue;

            if (!$this->doesMatchFilter($stamp, $auction, $data)) continue;

            $images = (new Image())->selectAllWhere($stamp['id'], 'stamp_id');

            $listAuctionsExpired[] = [
                'id' => $auction['id'],
                'date_start' => $auction['date_start'],
                'date_end' => $auction['date_end'],
                'floor_price' => $auction['floor_price'],
                'lord_favorite' => $auction['lord_favorite'],
                'stamp_id' => $stamp['id'],
                'stamp_name' => $stamp['name'],
                'stamp_image' => $images[0] ?? null,
            ];
        }

        return View::render('auction/index', [
            'listAuctionsActive' => $listAuctionsActive,
            'listAuctionsExpired' => $listAuctionsExpired,
            'listFilters' => [
                'countries' => $country,
                'colors' => $color,
                'conditions' => $condition,
            ],
            'userFilters' => $data,
        ]);
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
        Auth::session();

        if (!isset($_SESSION['user_id'])) {
            return View::render('error', ['msg' => 'User not authenticated']);
        }

        $favoriteModel = new Favorite();
        $favorites = $favoriteModel->selectAllWhere($_SESSION['user_id'], 'user_id');

        $listFavorites = [];

        foreach ($favorites as $fav) {

            // Enchère liée au favori
            $auctionModel = new Auction();
            $auction = $auctionModel->selectId($fav['auction_id']);

            if (!$auction) {
                continue;
            }

            // Timbre lié à l’enchère
            $stampModel = new Stamp();
            $stamp = $stampModel->selectId($auction['stamp_id']);

            if (!$stamp) {
                continue;
            }

            // Images du timbre
            $imageModel = new Image();
            $images = $imageModel->selectAllWhere($stamp['id'], 'stamp_id');

            $listFavorites[] = [
                'favorite_id' => $fav['id'],
                'auction_id' => $auction['id'],
                'date_start' => $auction['date_start'],
                'date_end' => $auction['date_end'],
                'floor_price' => $auction['floor_price'],
                'lord_favorite' => $auction['lord_favorite'],
                'stamp_id' => $stamp['id'],
                'stamp_name' => $stamp['name'],
                'stamp_image' => $images[0] ?? null,
            ];
        }

        return View::render("user/my-favorites", [
            'listFavorites' => $listFavorites
        ]);
    }

    public function addFavorite($data = [])
    {
        Auth::session();

        if (!isset($_SESSION['user_id']) || !isset($data['auction_id'])) {
            return View::render('error', ['msg' => 'Missing parameters']);
        }

        $favoriteModel = new Favorite();

        // Vérifier si déjà ajouté
        $exists = $favoriteModel->selectAllWhere($_SESSION['user_id'], 'user_id');
        foreach ($exists as $fav) {
            if ($fav['auction_id'] == $data['auction_id']) {
                return View::render("user/my-favorites"); //déjà ajouté
            }
        }

        $favoriteModel->insert([
            'user_id' => $_SESSION['user_id'],
            'auction_id' => $data['auction_id']
        ]);

        return View::render("user/my-favorites");
    }

    public function removeFavorite($data = [])
    {
        Auth::session();

        if (!isset($_SESSION['user_id']) || !isset($data['auction_id'])) {
            return View::render('error', ['msg' => 'Missing parameters']);
        }

        $favoriteModel = new Favorite();
        $favoriteModel->deleteWhere([
            'user_id' => $_SESSION['user_id'],
            'auction_id' => $data['auction_id']
        ]);

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
