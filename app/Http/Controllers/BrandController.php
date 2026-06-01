<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Danh sách loại xe
     */
    public function index()
    {
        $data = Brand::paginate(10);

        return view('admin.brand.index', [
            'data' => $data
        ]);
    }

    /**
     * Form thêm
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Lưu loại xe
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name' => 'required|max:255'
        ]);

        // Khởi tạo
        $brand = new Brand();

        // Tên
        $brand->name = $request->name;

        // Slug
        $brand->slug = Str::slug($request->name);

        // Trạng thái
        $brand->is_active = $request->has('is_active') ? 1 : 0;

        // Lưu
        $brand->save();

        // Redirect
        return redirect()->route('admin.brand.index');
    }

    /**
     * Form sửa
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brand.edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Cập nhật loại xe
     */
    public function update(Request $request, $id)
    {
        // Validate
        $request->validate([
            'name' => 'required|max:255'
        ]);

        // Tìm dữ liệu
        $brand = Brand::findOrFail($id);

        // Tên
        $brand->name = $request->name;

        // Slug
        $brand->slug = Str::slug($request->name);

        // Trạng thái
        $brand->is_active = $request->has('is_active') ? 1 : 0;

        // Lưu
        $brand->save();

        // Redirect
        return redirect()->route('admin.brand.index');
    }

    /**
     * Xóa loại xe
     */
    public function destroy($id)
    {
        Brand::destroy($id);

        return response()->json([
            'status' => true
        ], 200);
    }
}
