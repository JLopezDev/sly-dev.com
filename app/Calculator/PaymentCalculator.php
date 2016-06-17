<?php
namespace App\Calculator;

use phpDocumentor\Reflection\Types\Float_;
use phpDocumentor\Reflection\Types\Integer;

/**
 * Created by PhpStorm.
 * User: jose
 * Date: 6/17/16
 * Time: 12:18 AM
 *
 */
class PaymentCalculator extends Calculator
{
    private $principle;
    private $payment;
    private $interest;
    private $paymentTotal;
    private $interestTotal;
    private $monthCount = 0;

    public $result;

    public function __construct(Array $input)
    {
        $this->principle = $input['principle'];
        $this->payment = $input['payment'];
        $this->interest = $input['interest'];
        $this->init();
    }

    public function __toString()
    {
        return 'PaymentCalculator';
    }

    private function init()
    {
        $this->result = [
            'principle' => $this->principle,
            'payment' => $this->payment,
            'interest' => bcmul($this->interest, 100) . '%',
            'totals' => [],
            'payments' => []
        ];
    }

    public function addTo($propName, $n)
    {
        $this->{$propName} = bcadd($this->{$propName}, $n);
        return $this->{$propName};
    }

    public function subFrom($propName, $n)
    {
        $this->{$propName} = bcsub($this->{$propName}, $n);
        return $this->{$propName};
    }

    private function addToResult($key, $value, $doPush = false)
    {
        if ($doPush) {
            $this->result[$key][] = $value;
        } else {
            $this->result[$key] = $value;
        }
    }

    public function getResults()
    {
        return collect($this->result);
    }

    public function calc()
    {
        bcscale(10);

        $balance = $this->principle;
        $interestAccrued = 0;

        while ($balance > 0) {

            if ($this->payment > $balance) {
                $this->payment = $balance;
            }

            $this->addToResult('totals', [
                'payments' => $this->addTo('paymentTotal', $this->payment),
                'interest' => $this->addTo('interestTotal', $interestAccrued),
                'months' => $this->addTo('monthCount', 1)
            ]);

            $this->addToResult('payments', [
                'balance' => $balance,
                'payment' => $this->payment,
                'interestAccrued' => $interestAccrued,
            ], true);

            $balance = bcsub($balance, $this->payment);
            $interestAccrued = bcmul($balance, $this->interest);
            $balance = bcadd($balance, $interestAccrued);

        }
    }
}
