<?php

namespace Pondol\BtcPayment;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Pondol\BtcPayment\Bitcoind;

class BitcoinPaymentServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //publish config file and merge config
        $path = realpath(__DIR__.'/../config/bitcoind.php');
        $this->publishes([$path => config_path('bitcoind.php')], 'bitcoin');
        $this->mergeConfigFrom($path, 'bitcoind');

        //publish listeners for payment events
        $this->publishes([
                     __DIR__.'/Listeners' => base_path('app/Listeners'),
                 ], 'bitcoin');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\CheckPayment::class,
            ]);
        }

        $this->registerBitcoind();

        // $this->registerBitcoinPayment();
    }

    /**
     * @return \Pondol\BtcPayment\Bitcoind object
     */
    protected function registerBitcoind()
    {
        $this->app->singleton('Pondol\BtcPayment\Bitcoind', function ($app) {
            return $this->resolveBtc($app);
        });
    }

    /**
     *
     * @param App $app
     * @return \Pondol\BtcPayment\Bitcoind object
     */
    private function resolveBtc($app)
    {
        return new \Pondol\BtcPayment\Bitcoind(
            $app['config']->get('bitcoind.bitcond_user'),
            $app['config']->get('bitcoind.bitcond_password'),
            $app['config']->get('bitcoind.bitcond_host', 'localhost'),
            $app['config']->get('bitcoind.bitcond_port', 18332)
        );
    }
}
