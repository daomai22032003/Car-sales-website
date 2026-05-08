<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Setting; // ❗ THIẾU DÒNG NÀY

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
{
    View::composer('*', function ($view) {

        // Categories
        $categories = Category::whereNull('parent_id')
            ->where('is_active', 1)
            ->get();

        // Vendors (SHOWROOM)
        $vendors = Vendor::where('is_active', 1)
            ->orderBy('position')
            ->get();

        // Settings
        $settings = Setting::first();

        // Truyền tất cả sang view
        $view->with([
            'categories' => $categories,
            'vendors' => $vendors,
            'settings' => $settings
        ]);
    });
}
}