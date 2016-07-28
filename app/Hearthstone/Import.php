<?php
namespace Hearthstone;

use App\HearthstoneCards;
use Illuminate\Support\Facades\Storage;

class Import
{

    public static function cards()
    {
        $sets = json_decode(Storage::get('raw.json'), true);
        foreach ($sets as $cards) {
            foreach ($cards as $card) {
                unset($card['mechanics']);
                HearthstoneCards::create($card);
            }
        }
    }
}
