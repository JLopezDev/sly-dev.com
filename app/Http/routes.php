<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/blog');
});

Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@showPost');

Route::get('sandbox', function () {
    bcscale(10);

    $principle = 1795.19;
    $payment = 800;
    $interest = .1424;

    $results = [
        'principle' => $principle,
        'payment' => $payment,
        'interest' => bcmul($interest, 100) . '%',
        'totals' => [
            'payments' => 0,
            'interestAccrued' => 0,
        ],
        'payments' => [
            [
                'interestAccrued' => 0,
                'balance' => $principle,
                'payment' => $payment,
                'total' => bcsub($principle, $payment)
            ]
        ]
    ];

    while ($principle > 0) {
        if ($payment > $principle) {
            $payment = $principle;
        }

        $principle = $balance = bcsub($principle, $payment);
        $interestAccrued = bcmul($balance, $interest);
        $total = bcadd($balance, $interestAccrued);

        $results['totals'] = [
            'payments' => bcadd($results['totals']['payments'], bcadd($payment, $interestAccrued)),
            'interestAccrued' => bcadd($results['totals']['interestAccrued'], $interestAccrued)
        ];

        // todo correctly sync up the payments 
//        if ($balance > 0) {
            $results['payments'][] = [
                'interestAccrued' => $interestAccrued,
                'balance' => $balance,
                'payment' => $payment,
                'total' => $total,
            ];
//        }
    }

    return collect($results);
});
