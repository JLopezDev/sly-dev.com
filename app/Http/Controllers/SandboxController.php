<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Calculator\PaymentCalculator;

class SandboxController extends Controller
{
    public function index()
    {
        $input = [
            'principle' => 1795.19,
            'payment' => 800.00,
            'interest' => .1424
        ];

        $output = new PaymentCalculator($input);
        $output->calc();

        return $output->getResults();
    }
}
