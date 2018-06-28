<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cards;

class CardsController extends Controller
{
    public function __construct()
    {
        $this->cards = new Cards();
        $this->game = $this->cards->shuffle();
    }

    public function index() {
        $data['card'] = $this->game[0];
        return view('cards', $data);

    }

    public function shuffle() {
        return $this->cards->shuffle();
    }

    public function getNextCard($card_number){
        echo json_encode($this->game[$card_number]);
    }
}
