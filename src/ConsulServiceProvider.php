<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class ConsulServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $client = new Client();
        $response = $client->put('http://consul-address:8500/v1/agent/service/register', [
            'json' => [
                'ID' => 'my-service',
                'Name' => 'My Service',
                'Address' => 'your-service-ip',
                'Port' => 80,
                'Check' => [
                    'http' => 'http://your-service-ip/health',
                    'interval' => '10s',
                ],
            ],
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
