<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Apbd;

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
    public function boot()
    {
          // Kirim daftar tahun ke semua view
    view()->composer('*', function ($view) {
        $apbdYears = Apbd::select('year')->orderBy('year', 'desc')->distinct()->get();
        $view->with('apbdYears', $apbdYears);
    });
    }
}
