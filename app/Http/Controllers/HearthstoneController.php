<?php

namespace App\Http\Controllers;

use Hearthstone\Hearthstone;
use Hearthstone\Import;

class HearthstoneController extends Controller
{
    public function show()
    {
        $cards = Hearthstone::allCards();

    }

    public function import()
    {
        Import::cards();
    }
}
