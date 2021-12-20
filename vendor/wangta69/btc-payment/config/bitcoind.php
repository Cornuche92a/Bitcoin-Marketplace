<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User Model namespace
    |--------------------------------------------------------------------------
    |
    | Specify the full namespace to your User model.
    | e.g. 'Acme\Entities\User'
    |
    */
    // user' => 'App\Models\User',
    'user' => App\Models\Auth\User\User::class,
    /*
    |--------------------------------------------------------------------------
    | Bitcoind JSON-RPC Scheme
    |--------------------------------------------------------------------------
    | URI scheme of Bitcoin Core's JSON-RPC server.
    |
    | Use https to enable SSL connections with Core,
    | but this is strongly discouraged by developers.
    |
    */
    'bitcond_scheme' => env('BITCOIND_SCHEME', 'http'),
    /*
    |--------------------------------------------------------------------------
    | Bitcoind JSON-RPC Host
    |--------------------------------------------------------------------------
    | Tells service provider which hostname or IP address
    | Bitcoin Core is running at.
    |
    | If Bitcoin Core is running on the same PC as
    | laravel project use localhost or 127.0.0.1.
    |
    | If you're running Bitcoin Core on the different PC,
    | you may also need to add rpcallowip=<server-ip-here> to your bitcoin.conf
    | file to allow connections from your laravel client.
    |
    */

    'bitcond_host' => env('BITCOIND_HOST', 'localhost'),

    /*
    |--------------------------------------------------------------------------
    | Bitcoind JSON-RPC Port
    |--------------------------------------------------------------------------
    | The port at which Bitcoin Core is listening for JSON-RPC connections.
    | Default is 8332 for mainnet and 18332 for testnet.
    | You can also directly specify port by adding rpcport=<port>
    | to bitcoin.conf file.
    |
    */

    'bitcond_port' => env('BITCOIND_PORT', 8332),

    /*
    |--------------------------------------------------------------------------
    | Bitcoind JSON-RPC User
    |--------------------------------------------------------------------------
    | Username needs to be set exactly as in bitcoin.conf file
    | rpcuser=<username>.
    |
    */

    'bitcond_user' => env('BITCOIND_USER', ''),

    /*
    |--------------------------------------------------------------------------
    | Bitcoind JSON-RPC Password
    |--------------------------------------------------------------------------
    | Password needs to be set exactly as in bitcoin.conf file
    | rpcpassword=<password>.
    |
    */

    'bitcond_password' => env('BITCOIND_PASSWORD', ''),

    /*
    |--------------------------------------------------------------------------
    | Bitcoind JSON-RPC Server CA
    |--------------------------------------------------------------------------
    | If you're using SSL (https) to connect to your Bitcoin Core
    | you can specify custom ca package to verify against.
    | Note that using Bitcoin JSON-RPC over SSL is strongly discouraged.
    |
    */

    'ca' => null,

     /*
    |--------------------------------------------------------------------------
    | LaravelBtc  - this param is for minimum number of confirmations
    |--------------------------------------------------------------------------
    | This is minimal number of confirmations that we need
    | to consider payment is safe.
    |
    */

    'min-confirmations' => env('BITCOIND_MIN_CONFIRMATIONS', 3),

];
