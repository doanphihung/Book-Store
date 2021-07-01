<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Category;
use App\View\Components\Alert;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $authorsMaster = Author::all();
        $categoriesMaster = Category::all();
        View::share([
            'authorsMaster' => $authorsMaster,
            'categoriesMaster' => $categoriesMaster
        ]);
    }
}
