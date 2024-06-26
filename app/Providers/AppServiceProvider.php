<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Yajra\DataTables\Html\Builder;

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
        Blade::directive('active', function ($route) {
            return "<?php echo request()->routeIs($route) ? 'active':'' ?>";
        });
        Paginator::useBootstrap();
        Blade::directive('activeHasChild', function ($route) {
            return "<?php echo request()->is($route.'*') ? 'active':'' ?>";
        });
        Builder::useVite();
    }
}
