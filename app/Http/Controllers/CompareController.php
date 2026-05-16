<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CompareController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $products = Product::all();

        $car1 = $request->car1
            ? Product::with('carSpecs','category')
                ->find($request->car1)
            : null;

        $car2 = $request->car2
            ? Product::with('carSpecs','category')
                ->find($request->car2)
            : null;

        $car3 = $request->car3
            ? Product::with('carSpecs','category')
                ->find($request->car3)
            : null;

        $car4 = $request->car4
            ? Product::with('carSpecs','category')
                ->find($request->car4)
            : null;

        return view('shop.compare', compact(
            'categories',
            'products',
            'car1',
            'car2',
            'car3',
            'car4'
        ));
    }
}