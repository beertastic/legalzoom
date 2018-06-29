<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cards;
use Illuminate\Support\Facades\Session;

class CardsController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index() {
        $getCards = new Cards();
        $shuffle = $getCards->shuffle();
        Session::push('game', $shuffle);
        $data['card'] = $shuffle[0];
        return view('cards', $data);

    }

    public function shuffle() {
        return $this->cards->shuffle();
    }

    public function getNextCard($card_number) {
        $getCards = Session::get('game');
        echo json_encode( $getCards[0][$card_number] );
    }
}
