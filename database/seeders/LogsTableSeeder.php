<?php

namespace Database\Seeders;

use App\Models\logs;
use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        logs::create([
           'log_name' => 'Netflix',
            'username_email_log' => 'test@gmail.com',
            'password_pin_log' => 'password',
            'details_more' => 'ouite',
            'seller_id' => 1,
            'available' => 1,
            'price' => 5

        ]);
        logs::create([
            'log_name' => 'Spotify',
            'username_email_log' => 'test@gmail.com',
            'password_pin_log' => 'password',
            'details_more' => 'ouite',
            'seller_id' => 1,
            'available' => 1,
            'price' => 5

        ]);
        logs::create([
            'log_name' => 'Prime',
            'username_email_log' => 'test@gmail.com',
            'password_pin_log' => 'password',
            'details_more' => 'ouite',
            'seller_id' => 1,
            'available' => 1,
            'price' => 5

        ]);
        logs::create([
            'log_name' => 'MyCanal',
            'username_email_log' => 'test@gmail.com',
            'password_pin_log' => 'password',
            'details_more' => 'ouite',
            'seller_id' => 1,
            'available' => 1,
            'price' => 5

        ]);
    }
}
