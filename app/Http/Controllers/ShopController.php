<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category; // cần thêm dòng này nếu chưa có
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShopController extends GeneralController
{

    public function __construct()
    {
        parent::__construct();
    }

    // trang chủ
    public function index()
    {

        $list = []; // chứa danh sách sản phẩm  theo danh mục

        foreach ($this->categories as $key => $parent) {
            if ($parent->parent_id == 0) { // check danh mục cha
                $ids = []; // tạo chứa các id của danh cha + danh mục con trực thuộc

                $ids[] = $parent->id; // id danh mục cha

                foreach ($this->categories as $child) {
                    if ($child->parent_id == $parent->id) {
                        $ids[] = $child->id; // thêm phần tử vào mảng
                    }
                } // ids = [1,7,8,9,..]

                $list[$key]['category'] = $parent; // điện thoại, tablet

                // SELECT * FROM `products` WHERE is_active = 1 AND is_hot = 0 AND category_id IN (1,7,9,11) ORDER BY id DESC LIMIT 10
                $list[$key]['products'] = Product::where(['is_active' => 1, ])
                    ->whereIn('category_id', $ids)
                    ->limit(10)
                    ->orderBy('id', 'desc')
                    ->get();


            }
        }

        // 2. Lấy dữ liệu - Banner
        $banners = Banner::where('is_active', 1)->orderBy('id', 'desc')
            ->orderBy('position', 'asc')->get();

        return view('shop.home', [
            'list' => $list,
            'banners' => $banners,
        ]);
    }


    // lấy san pham theo danh mục
    public function getProductsByCategoryOld($slug)
    {
        // step 1 : lấy chi tiết thể loại => lay ra id danh muc can tim kiem
        $cate = Category::where(['slug' => $slug])->first();

        if ($cate) {
            // step 1.1 Check danh mục cha -> lấy toàn bộ danh mục con để where In
            $ids = []; // mảng lưu toàn id của danh mục cha + id - danh mục con

            $ids[] = $cate->id; // 1

            foreach ($this->categories as $item) {
                if ($item->parent_id == $cate->id) {
                    $ids[] = $item->id; // thêm id của danh mục con vào mảng ids
                }
            } // ids = 1,7,8,9,11

            // step 2 : lấy list sản phẩm theo thể loại
            $products = Product::where(['is_active' => 1])
                ->whereIn('category_id', $ids)
                ->latest()
                ->paginate(16);

            /*$query = DB::table('products')->select('*')
                ->whereIn('category_id', $ids)
                ->where('is_active', '=', 1);

            $list_products = $query->paginate(16);;*/

            return view('shop.products-by-category', [
                'category' => $cate,
                'products' => $products
            ]);

        } else {
            return $this->notfound();
        }
    }


    // lấy san phan theo danh mục
   public function getProductsByCategory(Request $request, $slug)
{
    // ===== 1. Lấy category =====
    $cate = Category::where('slug', $slug)->first();
    if (!$cate) {
        return $this->notfound();
    }

    // ===== 2. Lấy tất cả id category (cha + con) =====
    $ids = [$cate->id];

    foreach ($this->categories as $child) {
        if ($child->parent_id == $cate->id) {
            $ids[] = $child->id;
        }
    }

    // ===== 3. Khởi tạo QUERY (QUAN TRỌNG) =====
    $query = Product::with('specs')
        ->whereIn('category_id', $ids)
        ->where('is_active', 1);

    // ===== 4. LẤY FILTER =====
    $filter_seats   = $request->seats;
    $filter_gearbox = $request->gearbox;
    $filter_price   = $request->price;
    $filter_keyword = $request->keyword;
    $filter_brand   = $request->brand;
    // ===== 5. FILTER specs =====
    // ===== FILTER LOẠI XE (brand) =====
    if ($filter_brand) {
        $query->where('brand_id', $filter_brand);
    }
    // Số chỗ
    if ($filter_seats) {
        $query->whereHas('specs', function ($q) use ($filter_seats) {
            $q->where('key', 'seats')
              ->where('value', $filter_seats);
        });
    }

    // Hộp số
    if ($filter_gearbox) {
        $query->whereHas('specs', function ($q) use ($filter_gearbox) {
            $q->where('key', 'gearbox')
              ->where('value', $filter_gearbox);
        });
    }

    // ===== 6. FILTER giá =====
    if ($filter_price) {
        $range = explode('-', $filter_price);

        $min = (int)$range[0] * 1000000;
        $max = (int)($range[1] ?? 0) * 1000000;

        if ($max > 0) {
            $query->whereBetween('price', [$min, $max]);
        } else {
            $query->where('price', '>=', $min);
        }
    }

    // ===== 7. SEARCH keyword =====
    if ($filter_keyword) {
        $query->where('name', 'like', '%' . $filter_keyword . '%');
    }

    // ===== 8. SORT =====
    $query->orderBy('id', 'DESC');

    // ===== 9. PAGINATE =====
    $products = $query->paginate(16);

    // ===== 10. RETURN VIEW =====
    return view('shop.products-by-category', [
        'category' => $cate,
        'products' => $products,
    ]);
}
    // Chi tiet san pham
    public function getProduct($slug, $id)
    {
        // get chi tiet sp
        $product = Product::find($id);
        
        if (!$product) {
            return $this->notfound();
        }
        $exteriorImages = $product->images()->where('type', 'exterior')->get();
        $interiorImages = $product->images()->where('type', 'interior')->get();
        // khai báo mảng chứa danh sách các sản phẩm đã xem
        $viewedProducts = [];

        // xử lý lưu tin đã xem
        if (isset($_COOKIE['list_product_viewed'])) {
            $list_products_viewed = $_COOKIE['list_product_viewed']; // list id sản phẩm
            $list_products_viewed = json_decode($list_products_viewed); // chuyển chuỗi list id=> mảng

            // kiểm tra nếu chưa tồn tại trong list đã xem ??
            if (!in_array($product->id, $list_products_viewed)) {
                $list_products_viewed[] = $product->id;  // thêm id tiếp theo vào mảng đã xem

                // 44 , 9, 10 ,13, 67, 99 ,89, 70, 71
                // lấy ra 4 cái id mới nhất
                $list_products_viewed = array_slice($list_products_viewed, -4, 4);

                // danh sách bị thay đổi => nạp lại giá trị cho key
                $_list = json_encode($list_products_viewed);
                setcookie('list_product_viewed', $_list, time() + (7 * 86400));
            }

            // lấy ra danh sách sách sản phẩm đã xem từ mảng : $list_products_viewed
            $viewedProducts = Product::where([
                ['is_active', '=', 1],
                ['id', '<>', $product->id]
            ])->whereIn('id', $list_products_viewed)
                ->take(10)
                ->get();

        } else {
            // lưu id sẩn phẩm đã xem lần đầu vào cookie
            $arr_product_id = [$product->id];
            $arr_product_id = json_encode($arr_product_id); // { "ten" : "gia tri"  }
            setcookie('list_product_viewed', $arr_product_id, time() + (7 * 86400));
        }



        $category = Category::find($product->category_id);

        $tags = Category::where([
            ['parent_id', '<>', 0],
            ['is_active', '=', 1]
        ])->get();


        // step 2 : lấy list 10 SP liên quan
        $relatedProducts = Product::where([
            ['is_active', '=', 1],
            ['category_id', '=', $product->category_id],
            ['id', '<>', $product->id]
        ])->orderBy('id', 'desc')
            ->take(10)
            ->get();

        return view('shop.product', [
            'category' => $category,
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'tags' => $tags,
            'viewedProducts' => $viewedProducts,
            'exteriorImages' => $exteriorImages,
            'interiorImages' => $interiorImages
        ]);
    }

    /**
     * Tìm kiếm san phẩm
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
   

public function search(Request $request)
{
    $query = Product::where('is_active', 1);

    // ===== LẤY PARAM =====
    $keyword     = $request->input('keyword');
    $categoryId  = $request->input('category');
    $priceRange  = $request->input('price');

    $filterLabels = [];

    // ===== CATEGORY (HÃNG XE) =====
    $category = null;
    if ($categoryId) {
        $query->where('category_id', $categoryId);

        $category = Category::find($categoryId);
        if ($category) {
            $filterLabels[] = "Hãng xe: " . $category->name;
        }
    }

    // ===== KEYWORD =====
    if ($keyword) {
        $query->where('name', 'like', "%$keyword%");
        $filterLabels[] = "\"$keyword\"";
    }

    // ===== PRICE =====
    if ($priceRange) {
        $range = explode('-', $priceRange);

        if (count($range) == 2) {
            $min = $range[0] * 1000000;
            $max = $range[1] * 1000000;

            $query->where(function ($q) use ($min, $max) {
                $q->whereBetween('sale', [$min, $max])
                  ->orWhere(function ($q2) use ($min, $max) {
                      $q2->where('sale', 0)
                         ->whereBetween('price', [$min, $max]);
                  });
            });

            $filterLabels[] = "Giá: {$range[0]} - {$range[1]} triệu";
        }
    }

    // ===== PAGINATE =====
    $products = $query->paginate(20)->appends($request->all());
    $totalResult = $products->total();

    // ===== TEXT HIỂN THỊ =====
    $displayKeyword = implode(' - ', $filterLabels);
    if (empty($displayKeyword)) {
        $displayKeyword = "Tất cả sản phẩm";
    }

    // ===== LẤY DANH SÁCH CATEGORY =====
    $categories = Category::all();

    return view('shop.search', [
        'products'     => $products,
        'totalResult'  => $totalResult,
        'keyword'      => $displayKeyword,
        'category'     => $category,
        'categories'   => $categories
    ]);
}
    public function searchOrder(Request $request)
    {
        $orderCode = $request->input('ma-don-hang');

        $order = Order::where('code', $orderCode)->first();

        return view('shop.order-history', [
            'order' => $order
        ]);
    }

    // Danh sach bai viet
    public function getListArticles()
    {
        $articles = Article::where('is_active', 1)->orderBy('id', 'desc')->paginate(10);

        return view('shop.list-articles', [
            'articles' => $articles
        ]);
    }

    // Chi tiet bai viet
    public function getArticle($slug, $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return $this->notfound();
        }

        return view('shop.article', [
            'article' => $article
        ]);
    }

    public function contact()
    {
        return view('shop.contact.index');
    }

    public function orderHistory()
    {
        return view('shop.order-history');
    }

    public function contactStore(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email'
        ]);

        //luu vào csdl
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->content = $request->input('content');
        $contact->save();

        // chuyển về trang chủ
        return redirect('/');
    }
}
