<?php

namespace App\Providers;

use App\Services\WalletService;
use App\Repositories\WalletRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\WalletServiceInterface;
use App\Interfaces\WalletRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WalletServiceInterface::class, WalletService::class);
        $this->app->bind(WalletRepositoryInterface::class, WalletRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
