<?php

namespace Lanos\DeepSeekClient;

use Illuminate\Support\ServiceProvider;
use Lanos\DeepSeekClient\Interfaces\DeepSeekClientInterface;
use GuzzleHttp\Client;

class DeepSeekServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(DeepSeekClientInterface::class, function ($app) {
            return new DeepSeekClient(
                new Client(),
                config('deepseek.api_key')
            );
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/deepseek.php' => config_path('deepseek.php'),
        ], 'config');
    }
}