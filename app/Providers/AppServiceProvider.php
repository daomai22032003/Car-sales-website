<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $categories = Category::whereNull('parent_id')
                ->where('is_active', 1)
                ->get();

            $view->with('categories', $categories);
        });
    }
}