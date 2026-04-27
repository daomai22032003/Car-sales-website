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
        $day60 = DB::table('statistical')
            ->select('period', DB::raw('SUM(total_quantity) as total_quantity'), DB::raw('SUM(total_price) as total_price'))
            ->where('id_status', 3)
            ->groupBy('period')
            ->orderBy('period', 'asc')
            ->get();

        $chart_array = [];
        foreach ($day60 as $item) {
            $chart_array[] = array(
                'period' => $item->period,
                'quantity' => $item->total_quantity,
                'price' => $item->total_price
            );
        }
        return response()->json([
            'code' => 200,
            'main' => $chart_array
        ], 200);
    }

    public function filterChar(Request $request)
    {
        $res = DB::table('statistical')
            ->select('period', DB::raw('SUM(total_quantity) as total_quantity'), DB::raw('SUM(total_price) as total_price'))
            ->whereBetween('period', [$request->form, $request->to])
            ->where('id_status', 3)
            ->groupBy('period')
            ->orderBy('period', 'asc')
            ->get();

        $chart_array = [];
        foreach ($res as $item) {
            $chart_array[] = array(
                'period' => $item->period,
                'quantity' => $item->total_quantity,
                'price' => $item->total_price
            );
        }

        return response()->json([
            'code' => 200,
            'main' => $chart_array
        ], 200);
    }

    public function statistical()
    {
        $totalRevenue = Order::where('order_status_id', 3)->sum('total');
        $totalOrders = Order::count();
        $successfulOrders = Order::where('order_status_id', 3)->count();
        $totalProductsSold = DB::table('statistical')->where('id_status', 3)->sum('total_quantity');

        return view('admin.statistical.index', compact('totalRevenue', 'totalOrders', 'successfulOrders', 'totalProductsSold'));
    }
}
