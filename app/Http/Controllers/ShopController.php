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

        $filter_brands = $request->query('thuong-hieu');
        $filter_price = $request->query('gia');
        $filter_sort = $request->query('sap-sep');

        $branch_ids = [];
        if ($filter_brands) {
            $arr_filter_brands = explode(',', $filter_brands); // ['apple', 'xiaomi', 'dell']
            $arr_brands = Brand::whereIn('slug', $arr_filter_brands)->get();

            foreach ($arr_brands as $item) {
                $branch_ids[] = $item->id; // thêm phần tử vào mảng
            }
        }

        // THuong hieu
        $branchs = Brand::all();
        // step 1 : lấy chi tiết thể loại
        $cate = Category::where(['slug' => $slug])->first();

        if ($cate) {
            // step 1.1 Check danh mục cha -> lấy toàn bộ danh mục con để where In
            $ids = []; // mảng lưu toàn id của danh mục cha + id - danh mục con

            $ids[] = $cate->id; // 1
            $child_categories = []; // lưu danh mục con

            foreach ($this->categories as $child) {
                if ($child->parent_id == $cate->id) {
                    $ids[] = $child->id; // thêm id của danh mục con vào mảng ids
                    $child_categories[] = $child;
                }
            } // ids = 1,7,8,9,11

            // step 2 : lấy list sản phẩm theo thể loại
            //$list_products = Product::where(['is_active' => 1])
            //                    ->whereIn('category_id' , $ids)
            //                    ->latest()
            //                    ->paginate(16);

            $query = DB::table('products')->select('*')
                ->whereIn('category_id', $ids)
                ->where('is_active', '=', 1);
            // Lọc theo thương hiệu
            if (!empty($branch_ids)) {
                $query->whereIn('brand_id', $branch_ids);
            }

            // Lọc theo giá
            if ($filter_price) {
    $arr_price = explode('-', $filter_price);

    $min_price = (int) ($arr_price[0] ?? 0);
    $max_price = (int) ($arr_price[1] ?? 0);

    $query->where(function ($q) use ($min_price, $max_price) {

        if ($max_price > 0) {
            // khoảng giá
            $q->whereBetween(DB::raw('(CASE WHEN sale > 0 THEN sale ELSE price END)'), [$min_price, $max_price]);
        } else {
            // trường hợp "trên xxx"
            $q->where(DB::raw('(CASE WHEN sale > 0 THEN sale ELSE price END)'), '>=', $min_price);
        }

    });
}

            // Sắp sếp
            if ($filter_sort) {
                if ($filter_sort == 'noi-bat') {
                    $query->orderBy('is_hot', 'DESC');
                } elseif ($filter_sort == 'ban-chay-nhat') {
                    // tinh don dat hang

                } elseif ($filter_sort == 'gia-thap-den-cao') {
                    $query->orderByRaw('(CASE WHEN sale > 0 THEN sale ELSE price END) ASC');
                }
                elseif ($filter_sort == 'gia-cao-den-thap') {
                    $query->orderByRaw('(CASE WHEN sale > 0 THEN sale ELSE price END) DESC');
                }

            } else {
                $query->orderBy('id', 'DESC');
            }

            $list_products = $query->paginate(16);
            ;

            return view('shop.products-by-category', [
                'category' => $cate,
                'products' => $list_products,
                'branchs' => $branchs, // thương hiệu
                'filter_sort' => $filter_sort,
                'filter_price' => $filter_price ? $filter_price : '',
                'arr_filter_brands' => json_encode($branch_ids)
            ]);

        } else {
            return $this->notfound();
        }
    }

    // Chi tiet san pham
    public function getProduct($slug, $id)
    {
        // get chi tiet sp
        $product = Product::find($id);
        if (!$product) {
            return $this->notfound();
        }

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
            'viewedProducts' => $viewedProducts
        ]);
    }

    /**
     * Tìm kiếm san phẩm
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        // 1. Lấy tham số
        $keyword = $request->input('tu-khoa');
        $brandId = $request->input('brand');
        $model = $request->input('model');
        $priceRange = $request->input('price');

        $query = Product::where('is_active', 1);
        $filterLabels = [];

        // Tìm kiếm theo từ khóa (slug)
        if ($keyword) {
            $slug = Str::slug($keyword);
            $query->where('slug', 'like', '%' . $slug . '%');
            $filterLabels[] = "\"$keyword\"";
        }

        // Lọc theo thương hiệu
        if ($brandId) {
            $query->where('brand_id', $brandId);
            $brand = Brand::find($brandId);
            if ($brand) {
                $filterLabels[] = "Thương hiệu: " . $brand->name;
            }
        }

        // Lọc theo dòng xe (tìm trong tên)
        if ($model) {
            $query->where('name', 'like', '%' . $model . '%');
            $filterLabels[] = "Dòng xe: " . $model;
        }

        // Lọc theo khoảng giá (đơn vị: triệu đồng)
        if ($priceRange) {
            $range = explode('-', $priceRange);
            if (count($range) == 2) {
                $min = $range[0] * 1000000;
                $max = $range[1] * 1000000;
                $query->whereBetween('sale', [$min, $max]);
                $filterLabels[] = "Giá: " . $range[0] . " - " . $range[1] . " triệu";
            }
        }

        $products = $query->paginate(20);
        $totalResult = $products->total();

        $displayKeyword = implode(' - ', $filterLabels);
        if (empty($displayKeyword)) {
            $displayKeyword = "Tất cả sản phẩm";
        }

        return view('shop.search', [
            'products' => $products,
            'totalResult' => $totalResult,
            'keyword' => $displayKeyword
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
