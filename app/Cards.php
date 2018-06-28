<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;

class Cards extends Model
{

    public function __construct()
    {
        try {
            $cards_feed = config('cards.cards_feed');
            $cards_array = json_decode(file_get_contents($cards_feed), true);
            $this->collection = collect($cards_array);
        } catch (Exception $e) {
            echo 'Maybe the APi is down? ';
        }
    }

    public function shuffle() {
        $shuffle = $this->collection->shuffle()->toArray();
        return $shuffle;
    }

}
