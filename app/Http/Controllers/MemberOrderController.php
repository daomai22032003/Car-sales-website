<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberOrderController extends GeneralController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function history()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->paginate(10);
        return view('shop.member.history', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);
        return view('shop.member.order-detail', compact('order'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('shop.member.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return back()->with('success', 'Cập nhật thông tin thành công!');
    }
}
