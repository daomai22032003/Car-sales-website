<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Category; // cần thêm dòng này nếu chưa có
use App\Models\Product;
use App\Models\Setting;
use App\Models\Brand;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    protected $categories;

    public function __construct()
    {
        // 1. Lấy dữ liệu - Danh mục, có trạng thái là hiển thị
        $categories = Category::where(['is_active' => 1])->get();

        $this->categories = $categories;

        // 2. Lấy dữ liệu - Banner
        $banners = Banner::where('is_active', 1)->orderBy('id', 'desc')
            ->orderBy('position', 'asc')->get();
        // 3. lấy dữ liệu 4 tin tức mới nhất
        $articles = Article::where('is_active', 1)
            ->orderBy('id', 'desc')
            ->orderBy('position', 'asc')
            ->take(4)
            ->get();

        // 4. cấu hình website
        $settings = Setting::first();

        // 5. lấy danh sách thương hiệu
        $brands = Brand::where('is_active', 1)->get();

        // Chia sẻ dữ qua tất các layout
        view()->share([
            'settings' => $settings,
            'categories' => $categories,
            'banners' => $banners,
            'articles' => $articles,
            'brands' => $brands
        ]);
    }

    public function notfound()
    {
        return view('shop.notfound');
    }
}
