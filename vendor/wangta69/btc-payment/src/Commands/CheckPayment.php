<?php

namespace Pondol\BtcPayment\Commands;

use Faker\Provider\Payment;
use Pondol\BtcPayment\Bitcoind;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Pondol\BtcPayment\Events\ConfirmedPaymentEvent;
use Pondol\BtcPayment\Models\Deposit;


class CheckPayment extends Command
{
    /**
     * The name and signature of the console command.
     * $ php artisan bitcoin:checkpayment
     * @var string
     */
    protected $signature = 'bitcoin:checkpayment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for bitcoin payments';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Bitcoind $bitcoind)
    {
        // $bitcoind = resolve("LaravelBtcClient");
        $this->checkPayment($bitcoind);
    }

    private function checkPayment($bitcoind)
    {
        // get transaction from bitcoind
        // $transactions = $bitcoind->listtransactions('*', 50);
        $transactions = $bitcoind->listtransactions('*', 100); // 테스트를 용이하게 하기위해서 5개만 구한다. (나중에 되도록 많이)

        if (!is_array($transactions)) {
            $transactions = $transactions->get();
        }
        $transactions = array_reverse($transactions);
        // 트랜잭션이 카테고리인것만 체크
        $transactions = array_filter($transactions, function ($v) {
            return $v['category'] == 'receive';
        });
        // reindex array - only transactions which receive bitcoins
        $transactions = array_values($transactions);


        // received 된 내용중 account 가 존재 하면 db에 입력한다.
        // $prepayment->confirmations 에서 bitcoind.min-confirmations 보다 크면 wallet 으로 옮기고 결제완료 처리를 진행한다.
        //Check for Prepayments with transaction in blockchain (these are paid), but we need number of confirmations

        // paid가 완결되지 않은 정보를 구한다.
        // $notPayeds = Deposit::where('paid', 0)->get();
        // Deposit::not_confirmed()->get();
        $omittedTransactions = [];

        foreach ($transactions as $trans) {
                $paymentConfirmed = false;
                $payment = Payment::firstOrNew(['address'=>$trans['address'], 'txid' => $trans['txid']]);
                if ($trans['account']) {
                    $payment->user_id = $trans['account'];
                }
                if (!$payment->user_id) {
                    // find user_id who maybe use same address
                    $prepayment = Payment::same_address($trans['address'])->first();

                    if ($trans['txid'] == "29adbcfcb200043ca8f2900d979ca7bc6515e9672e0f2f879286f436c5276ed7") {

                    }
                    if (isset($prepayment->user_id)) {
                        $payment->user_id = $prepayment->user_id;
                    } else {
                        continue;
                    }
                }

                $payment->amount = $trans['amount'];
                $payment->confirmations = $trans['confirmations'];
                if ($payment->paid === 0  && $trans['confirmations'] >= config('bitcoind.min-confirmations')) {
                    $payment->paid = 1;
                    $paymentConfirmed = true;
                }

                $payment->save();

                if ($paymentConfirmed === true) {
                    event(new ConfirmedPaymentEvent($payment)); // toss to event for other procedure
                    $bitcoind->setaccount($trans['address'],''); // 이후 동일 주소로 들어오는 것에 대해서는 어떻게 처리할 것인가?
                }
        }
    }
}
