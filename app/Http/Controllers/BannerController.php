<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {
        $data = Banner::latest()->paginate(10);

        return view('admin.banner.index', compact('data'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $banner = new Banner();
        $banner->title = $request->title;

        // Tạo slug không trùng
        $slug = Str::slug($request->title);
        $count = Banner::where('slug', 'LIKE', "{$slug}%")->count();
        $banner->slug = $count ? "{$slug}-{$count}" : $slug;

        // Upload ảnh (chuẩn Laravel)
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banners', 'public');
            $banner->image = 'storage/' . $path;
        }

        // Các field khác
        $banner->url = $request->url;
        $banner->target = $request->target;
        $banner->type = $request->type;
        $banner->is_active = $request->has('is_active') ? 1 : 0;
        $banner->position = $request->position;
        $banner->description = $request->description;

        $banner->save();

        return redirect()->route('admin.banner.index')
            ->with('success', 'Thêm banner thành công');
    }

    public function show($id)
    {
        $data = Banner::findOrFail($id);

        return view('admin.banner.show', compact('data'));
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);

        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        // Validate
        $request->validate([
            'title' => 'required|max:255',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $banner->title = $request->title;

        // Update slug
        $slug = Str::slug($request->title);
        $count = Banner::where('slug', 'LIKE', "{$slug}%")
            ->where('id', '!=', $id)
            ->count();
        $banner->slug = $count ? "{$slug}-{$count}" : $slug;

        // Update ảnh
        if ($request->hasFile('new_image')) {

            // Xóa ảnh cũ nếu tồn tại
            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }

            $path = $request->file('new_image')->store('banners', 'public');
            $banner->image = 'storage/' . $path;
        }

        // Các field khác
        $banner->url = $request->url;
        $banner->target = $request->target;
        $banner->type = $request->type;
        $banner->is_active = $request->has('is_active') ? 1 : 0;
        $banner->position = $request->position;
        $banner->description = $request->description;

        $banner->save();

        return redirect()->route('admin.banner.index')
            ->with('success', 'Cập nhật banner thành công');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Xóa ảnh
        if ($banner->image && file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
        }

        $banner->delete();

        return response()->json([
            'status' => true
        ]);
    }
}