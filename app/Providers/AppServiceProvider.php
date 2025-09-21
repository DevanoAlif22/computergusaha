<?php

namespace App\Providers;

use App\Models\Pengaturan;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
     $pengaturan = Pengaturan::first();

    // kirim ke semua view
    View::share('pengaturan', $pengaturan);
        
    }
}
