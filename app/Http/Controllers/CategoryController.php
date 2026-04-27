<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Danh sách
     */
    public function index()
    {
        $data = Category::orderBy('position', 'asc')->paginate(10);

        return view('admin.category.index', compact('data'));
    }

    /**
     * Form thêm
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Lưu mới
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $category = new Category();
        $category->name = $request->name;

        // 🔥 Tạo slug (fix lỗi của bạn)
        $slug = Str::slug($request->name);
        $count = Category::where('slug', 'LIKE', "$slug%")->count();
        $category->slug = $count ? $slug . '-' . $count : $slug;

        // upload ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'uploads/category/';
            $file->move(public_path($path), $filename);

            $category->image = $path . $filename;
        }

        $category->position = $request->position ?? 0;
        $category->is_active = $request->has('is_active') ? 1 : 0;

        $category->save();

        return redirect()->route('admin.category.index')
            ->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Xem chi tiết
     */
    public function show($id)
    {
        $data = Category::findOrFail($id);

        return view('admin.category.show', compact('data'));
    }

    /**
     * Form sửa
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Cập nhật
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;

        // 🔥 update slug luôn
        $slug = Str::slug($request->name);
        $count = Category::where('slug', 'LIKE', "$slug%")
            ->where('id', '!=', $id)
            ->count();

        $category->slug = $count ? $slug . '-' . $count : $slug;

        // update ảnh
        if ($request->hasFile('new_image')) {

            // xóa ảnh cũ
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $file = $request->file('new_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'uploads/category/';
            $file->move(public_path($path), $filename);

            $category->image = $path . $filename;
        }

        $category->position = $request->position ?? 0;
        $category->is_active = $request->has('is_active') ? 1 : 0;

        $category->save();

        return redirect()->route('admin.category.index')
            ->with('success', 'Cập nhật thành công');
    }

    /**
     * Xóa
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // xóa ảnh nếu có
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }

        $category->delete();

        return response()->json([
            'status' => true
        ]);
    }
}