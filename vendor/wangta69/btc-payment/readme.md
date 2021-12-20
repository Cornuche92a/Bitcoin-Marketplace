# btc-payment

## Prerequisites
**Laravel version >= 5.5**

Install package via composer:
```
composer require wangta69/btc-payment
```

```
$btc = app("Pondol\BtcPayment\Bitcoind");
protected $btc;
/**
 * Create a new controller instance.
 *
 * @return void
 */
public function __construct(Bitcoind $btc)
{
    $this->btc = $btc;
    $this->btc->getaccountaddress("");
}
```
OR
```
public function getaccountaddress() {
    $btc = app("Pondol\BtcPayment\Bitcoind");
    return $btc->getaccountaddress("37");
}
```
#### Checking payments and confirmations:
Package contains class Pondol\BtcPayment\Commands\CheckPayment.
This is Laravel Command and you can call it via php artisan :
```
php artisan bitcoin:checkpayment
```
Each time you call it, it scan for payments and confirmations on block chain. You can call it manually for testing purposes like mentioned above , but there is no much sense to do so, because it's job is to check for payments and it needs to run always.

You need to make crontab entry on linux servers or task scheduler on Win servers to call this command every minute.
```
// Example for linux
crontab -e

// add this line to cron tab and replace path
* * * * * cd /path/to/your/project/ php artisan bitcoin:checkpayment >/dev/null 2>&1
```
This script also fires events that we can listen ...
#### Listening for payments
You'll find new classes in **app\Listeners** folder of your app when you published pakage ( see installation section).
this is :

**ConfirmedPaymentListener.php**

To activate these Listeners copy this code in **app\Providers\EventServiceProvider.php** class (this class exists by default installation of Laravel), in **$listen** attribute of this class.

Like this:
```
protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],

        'Pondol\BtcPayment\Events\ConfirmedPaymentEvent' => [
            'App\Listeners\ConfirmedPaymentListener',
        ],
    ];
```
In each of these class there is handle method, where you can put logic for actions that need to be done when event is fired (DB insert-update, sending mails ...).

Below is example of ConfimedPaymentListener,  event is generated when number of confirmations is equal to BITCOIND_MIN_CONFIRMATIONS in .env file and we can be sure that payment is ok.
```
    public function handle(ConfirmedPaymentEvent $event)
    {
        Log::debug('Confirmed Payment listener: '. $event->confirmedPayment);
         // Here you add your code for sending mails, db update ...
    }
```

### Events

1. **Pondol\BtcPayment\Events\ConfirmedPaymentEvent** - Payment is made and number of confirmations is equal or greater than value  of **BITCOIND_MIN_CONFIRMATIONS** in .env file.



### Models
**Pondol\BtcPayment\Models\Payment** - Represents Confirmed and Unconfirmed Payments (see Usage section)


## License
MIT License
