<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductColorImage;

class ProductColorController extends Controller
{
   public function index()
{
    $items = Product::with('colors')->get();

    return view('admin.product_color.index', compact('items'));
}
    public function create()
    {
        $products = Product::all();

        return view('admin.product_color.create',compact('products'));
    }

    public function store(Request $request)
    {
       
        $color = ProductColor::create([

            'product_id' => $request->product_id,

            'color_name' => $request->color_name,

            'color_code' => $request->color_code,
            'extra_price' => $request->extra_price ?? 0,
            'is_default' => 0
        ]);

        if($request->hasFile('images')){

            foreach($request->file('images') as $key => $file){

                $path = $file->store('colors','public');

                ProductColorImage::create([

                    'product_color_id' => $color->id,

                    'image' => $path,

                    'sort_order' => $key

                ]);

            }

        }

        return redirect()
            ->route('admin.product-color.index');
    }

    public function edit($id)
    {
        $item = ProductColor::findOrFail($id);

        $products = Product::all();

        return view(
            'admin.product_color.edit',
            compact('item','products')
        );
    }

    public function update(Request $request, $id)
{
    $item = ProductColor::findOrFail($id);

    $item->update([
        'product_id' => $request->product_id,
        'color_name' => $request->color_name,
        'color_code' => $request->color_code,

        // FIX QUAN TRỌNG Ở ĐÂY
        'extra_price' => $request->extra_price ?? $item->extra_price,
    ]);

    return redirect()->route('admin.product-color.index');
}

    public function destroy($id)
    {
        ProductColor::destroy($id);

        return back();
    }
    public function show($id)
    {
        $product = Product::with('colors.images')
                    ->findOrFail($id);

        return view(
            'admin.product_color.show',
            compact('product')
        );
    }
    
}