<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Statistical;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $numOrder = Order::count();
        $numArticle = Article::count();
        $numProduct = Product::count();
        $numUser = User::count();

        return view('admin.dashboard', [
            'numOrder' => $numOrder,
            'numArticle' => $numArticle,
            'numProduct' => $numProduct,
            'numUser' => $numUser
        ]);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        //validate du lieu
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $data = [
            'email' => trim($request->input('email')),
            'password' => trim($request->input('password'))
        ];

        // check success
        if (Auth::attempt($data, $request->has('remember'))) {
            return redirect()->route('admin.order.index');
        }

        return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');
        ;
    }

    public function logout()
    {
        Auth::logout();
        // chuyển về trang đăng nhập
        return redirect()->route('admin.login');
    }
    public function showChar()
    {
       
   $data = DB::table('order_details as od')
        ->join('orders as o', 'o.id', '=', 'od.order_id')
        ->select(
            DB::raw("DATE(o.created_at) as period"),
            DB::raw("SUM(od.qty) as quantity"),
            DB::raw("SUM(od.price) as price") // ✅ CHUẨN
        )
        ->where('o.order_status_id', 3)
        ->groupBy(DB::raw("DATE(o.created_at)"))
        ->orderBy('period', 'ASC')
        ->get();

    return response()->json([
        'code' => 200,
        'main' => $data->map(function ($item) {
            return [
                'period' => $item->period,
                'quantity' => (int)$item->quantity,
                'price' => (int)$item->price,
            ];
        })
    ]);
    }

    public function filterChar(Request $request)
    {
        
    $data = DB::table('order_details as od')
        ->join('orders as o', 'o.id', '=', 'od.order_id')
        ->select(
            DB::raw("DATE(o.created_at) as period"),
            DB::raw("SUM(od.qty) as quantity"),
            DB::raw("SUM(od.price) as price") // ✅ GIỐNG HÀM TRÊN
        )
        ->where('o.order_status_id', 3)
        ->whereBetween(DB::raw("DATE(o.created_at)"), [
            $request->from,
            $request->to
        ])
        ->groupBy(DB::raw("DATE(o.created_at)"))
        ->orderBy('period', 'ASC')
        ->get();

    return response()->json([
        'code' => 200,
        'main' => $data->map(function ($item) {
            return [
                'period' => $item->period,
                'quantity' => (int)$item->quantity,
                'price' => (int)$item->price,
            ];
        })
    ]);
    }

    public function statistical(Request $request)
    {
    $totalRevenue = Order::where('order_status_id', 3)->sum('total');
    $totalOrders = Order::count();
    $successfulOrders = Order::where('order_status_id', 3)->count();

    $totalProductsSold = DB::table('order_details')
        ->join('orders', 'orders.id', '=', 'order_details.order_id')
        ->where('orders.order_status_id', 3)
        ->sum('order_details.qty');

    // 🔥 dữ liệu biểu đồ theo ngày
    $chartData = DB::table('orders')
        ->select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total) as revenue')
        )
        ->where('order_status_id', 3)
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    return view('admin.statistical.index', compact(
        'totalRevenue',
        'totalOrders',
        'successfulOrders',
        'totalProductsSold',
        'chartData' // 🔥 QUAN TRỌNG
    ));
    }
}
