<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductImage;
use App\Models\CarSpec;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::latest();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('brand_id') && $request->brand_id != '') {
            $query->where('brand_id', $request->brand_id);
        }

        $data = $query->paginate(20);
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.index', [
            'data' => $data,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $brands = Brand::all();
        $vendors = Vendor::all();

        return view('admin.product.create', [
            'categories' => $categories,
            'brands' => $brands,
            'vendors' => $vendors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $product = new Product(); // khởi tạo model
        $product->name = $request->input('name');
        $product->slug = \Illuminate\Support\Str::slug($request->input('name'));

        // Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time() . '_' . $file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/product/';
            // Thực hiện upload file
            $request->file('image')->move($path_upload, $filename); // upload lên thư mục public/uploads/product

            $product->image = $path_upload . $filename;
        }
         

        $product->stock = $request->input('stock'); // số lượng
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');
        $product->sku = $request->input('sku');
        $product->position = $request->input('position');
        $product->url = $request->input('url');

        // Trạng thái
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $product->is_active = $request->input('is_active');
        }

        // Sản phẩm Hot
        if ($request->has('is_hot')) {
            $product->is_hot = $request->input('is_hot');
        }
        $product->position = $request->input('position', 0);
        $product->sku = $request->input('sku', '');
        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->user_id = Auth::id(); // lưu id người tạo
        $product->save();
        // SAVE thông số mới
if ($request->group_name) {

    foreach ($request->group_name as $key => $group) {

        // bỏ qua dòng trống
        if (
            empty($request->spec_name[$key]) &&
            empty($request->spec_value[$key])
        ) {
            continue;
        }

        CarSpec::create([

            'product_id' => $product->id,

            'group_name' => $group,

            'spec_name' => $request->spec_name[$key],

            'spec_value' => $request->spec_value[$key],

        ]);
    }
}
       // 3. Ảnh ngoại thất
        if ($request->hasFile('exterior_images')) {
            foreach ($request->file('exterior_images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path_upload = 'uploads/product/';

                $file->move($path_upload, $filename);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path_upload . $filename,
                    'type' => 'exterior'
                ]);
            }
        }

        // 4. Ảnh nội thất
        if ($request->hasFile('interior_images')) {
    foreach ($request->file('interior_images') as $file) {
        $filename = time() . '_' . $file->getClientOriginalName();
        $path_upload = 'uploads/product/';

        $file->move($path_upload, $filename);

        ProductImage::create([
            'product_id' => $product->id,
            'image' => $path_upload . $filename,
            'type' => 'interior'
                ]);
            }
        }
        // chuyển hướng đến trang
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get data from db
        $data = Product::findorFail($id);
        $category_name = Category::where('id', $data->category_id)->first();
        
        return view('admin.product.show', [
            'data' => $data,
            'category_name' => $category_name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $vendors = Vendor::all();

        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'vendors' => $vendors
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $product = Product::findorFail($id);
        ; // khởi tạo model
        $product->name = $request->input('name');
        $product->slug = \Illuminate\Support\Str::slug($request->input('name'));

        // Thay đổi ảnh
        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($product->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time() . '_' . $file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/product/';
            // upload file
            $request->file('new_image')->move($path_upload, $filename);

            $product->image = $path_upload . $filename;
        }

        $product->stock = $request->input('stock'); // số lượng
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');
        $product->sku = $request->input('sku');
        $product->position = $request->input('position');
        $product->url = $request->input('url');

        // Trạng thái
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $product->is_active = $request->input('is_active');
        }

        // Sản phẩm Hot
        if ($request->has('is_hot')) {
            $product->is_hot = $request->input('is_hot');
        }
        $product->position = $request->input('position', 0);
        $product->sku = $request->input('sku', '');
        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->user_id = Auth::id();
        $product->save();
        // XÓA ẢNH NGOẠI THẤT
if ($request->has('delete_exterior_images')) {

    foreach ($request->delete_exterior_images as $imageId) {

        $image = ProductImage::find($imageId);

        if ($image) {

            // xóa file
            if (file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
            }

            // xóa db
            $image->delete();
        }
    }
}

// XÓA ẢNH NỘI THẤT
if ($request->has('delete_interior_images')) {

    foreach ($request->delete_interior_images as $imageId) {

        $image = ProductImage::find($imageId);

        if ($image) {

            // xóa file
            if (file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
            }

            // xóa db
            $image->delete();
        }
    }
}
        // 3. Ảnh ngoại thất
        if ($request->hasFile('exterior_images')) {
            foreach ($request->file('exterior_images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path_upload = 'uploads/product/';

                $file->move($path_upload, $filename);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path_upload . $filename,
                    'type' => 'exterior'
                ]);
            }
        }

        // 4. Ảnh nội thất
        if ($request->hasFile('interior_images')) {
    foreach ($request->file('interior_images') as $file) {
        $filename = time() . '_' . $file->getClientOriginalName();
        $path_upload = 'uploads/product/';

        $file->move($path_upload, $filename);

        ProductImage::create([
            'product_id' => $product->id,
            'image' => $path_upload . $filename,
            'type' => 'interior'
                ]);
            }
        }
        // chuyển hướng đến trang
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // gọi tới hàm destroy của laravel để xóa 1 object
        Product::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }

   public function inventory(Request $request)
{
    $query = Product::query();

    // 🔎 search tên / sku
    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('sku', 'like', '%' . $request->search . '%');
        });
    }

    // 📦 lọc kho
    if ($request->filled('stock')) {

        if ($request->stock == 'out') {
            $query->where('stock', 0);
        }

        if ($request->stock == 'low') {
            $query->where('stock', '>', 0)
                  ->where('stock', '<', 5);
        }

        if ($request->stock == 'ok') {
            $query->where('stock', '>=', 5);
        }
    }

    // 🔃 sort (giữ logic của bạn nhưng có thể đổi)
    if ($request->filled('sort') && $request->sort == 'desc') {
        $query->orderBy('stock', 'desc');
    } else {
        $query->orderBy('stock', 'asc');
    }

    $data = $query->orderBy('id', 'asc')
                   ->paginate(20)
                   ->appends($request->all());
 
    return view('admin.product.inventory', compact('data'));
}

    public function updateStock(Request $request)
    {
        $product = Product::find($request->id);
        if ($product) {
            $product->stock = $request->stock;
            $product->save();
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
   public function installmentList()
{
    $categoriesWithProducts = Category::with('products')->get();

    return view('shop.installment', [
        'categoriesWithProducts' => $categoriesWithProducts,
        'product' => null
    ]);
}
public function specs($id)
{
    $product = Product::findOrFail($id);

    return view('admin.product.specs', compact('product'));
}
public function updateSpecs(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // xóa thông số cũ
    CarSpec::where('product_id', $product->id)->delete();

    // lưu thông số mới
    if ($request->group_name) {

        foreach ($request->group_name as $key => $group) {

            if (
                empty($request->spec_name[$key]) &&
                empty($request->spec_value[$key])
            ) {
                continue;
            }

            CarSpec::create([
                'product_id' => $product->id,
                'group_name' => $group,
                'spec_name' => $request->spec_name[$key],
                'spec_value' => $request->spec_value[$key],
            ]);
        }
    }

    return redirect()
        ->route('admin.product.specs', $product->id)
        ->with('success', 'Lưu thông số thành công');
}
}
