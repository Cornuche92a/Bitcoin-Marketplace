<?php

namespace App\Http\Controllers;

use App\Models\logs;
use App\Models\notification;
use App\Models\Order;
use App\Models\Payment;
use App\Models\tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Denpa\Bitcoin;
use Denpa\Bitcoin\Facades\Bitcoind;
use Illuminate\Support\Facades\Log;
use AmrShawky\LaravelCurrency\Facade\Currency;



class PaymentController extends Controller
{



    public function index()
    {
        $getpayments = Payment::where(['user_id'=>auth()->user()->id,'paid'=>0])->get();
        $gettransactions = Payment::where(['user_id'=>auth()->user()->id])->get();

        if(Payment::where(['user_id'=>auth()->user()->id,'paid'=>0])->exists()) {

            return view('add_funds',['payments'=>$getpayments,'transactions'=>$gettransactions]);

        }
        else{
            if(Payment::where(['user_id'=>auth()->user()->id,'paid'=>1])->exists()) {

                return view('add_funds',['transactions'=>$gettransactions]);

            }
            else {
                return view('add_funds');
            }
        }



    }

    public function getaddr(){

    if(Payment::where(['user_id'=>auth()->user()->id,'paid'=>0])->exists()){

        return redirect()->action("PaymentController@index");

    }
    else{

        $blockhash = \bitcoind()->getnewaddress(auth()->user()->username);

        $payment_create = new Payment();
        $payment_create->user_id = auth()->user()->id;
        $payment_create->address = $blockhash;
        $payment_create->save();

        // $getpayments = Payment::where(['user_id' => auth()->user()->id, 'address' => $blockhash])->get();
        $gettransactions = Payment::where(['user_id' => auth()->user()->id, 'address' => $blockhash])->get();

        return redirect()->action('PaymentController@index',['transactions'=>$gettransactions]);
    }
    }


    public static function check()
    {


        if (Payment::where(['user_id' => auth()->user()->id, 'paid' => 0])->exists()) {
            $btcwallet = Payment::where(['user_id' => auth()->user()->id, 'paid' => 0])->firstorfail();
            $checkreceived = \Bitcoind::getreceivedbyaddress($btcwallet->address);

            $rate_float = json_decode(file_get_contents('https://api.coindesk.com/v1/bpi/currentprice/eur.json'))->bpi->EUR->rate_float;
            $checkreceivedtoeur = $checkreceived[0] * $rate_float;
            if ($checkreceivedtoeur == 0) {

                return redirect()->route('payment.addfunds');

            } elseif ($checkreceivedtoeur <= 10) {

                $payment = Payment::where(['user_id' => auth()->user()->id, 'paid' => 0])->firstorfail();
                $payment->amount_received =number_format((double)$checkreceivedtoeur, 2, '.', '');
                $payment->save();

                return redirect('/add_funds')->with("unpaid", "Votre paiement est incomplet (10€ Minimum). Montant reçu: " . number_format((float)$checkreceivedtoeur, 2, '.', '') . "€ Merci de compléter votre paiement");
            } else {



                $payment = Payment::where(['user_id' => auth()->user()->id, 'paid' => 0])->firstorfail();
                $payment->amount_received = number_format((double)$checkreceivedtoeur, 2, '.', '');
                $payment->paid = 1;
                $payment->save();

                $notification = new notification();
                $notification->user_id = $payment->user_id;
                $notification->notification_id = 2;
                $notification->save();

                $user = User::where(['id' => $payment->user_id])->firstorfail();
                $user->increment('amount', number_format((double)$checkreceivedtoeur, 2, '.', '')-5/100);

                if($checkreceivedtoeur >= 30){

                    $order= new Order();
                    $order->log_id=logs::inRandomOrder()->where('available','=',1)->limit(1)->get()[0]->id;
                    $order->user_id=auth()->user()->id;
                    $order->save();

                    $notification = new notification();
                    $notification->user_id = $payment->user_id;
                    $notification->notification_id = 3;
                    $notification->save();

                }

                return redirect('/add_funds')->with("paid", "Votre portefeuille a bien été crédité d'un montant de " . number_format((float)$checkreceivedtoeur, 2, '.', '') . "€ Merci de votre confiance.");
            };

        }
        else{
            return redirect()->route('payment.addfunds');
        }
    }

    public function handle(ConfirmedPaymentEvent $event)
    {
        dd(Log::debug('Confirmed Payment listener: '. $event->confirmedPayment));
    }
}

