<?php

namespace Hearthstone;

use Unirest\Request;

class Hearthstone
{
    public static function allCards()
    {
        $res = Request::get('https://omgvamp-hearthstone-v1.p.mashape.com/cards', ['X-Mashape-Key' => 'KkxQ35R5tjmsh3hNgairfO3wSdCQp1ZARtAjsn6h7l0gUEKiXk']);

        return $res->body;
    }
}
