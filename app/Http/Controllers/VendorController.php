<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    // ================== LIST ==================
    public function index(Request $request)
{
    $query = Vendor::query()->orderBy('id', 'desc');

    if ($request->filled('table_search')) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->table_search . '%')
              ->orWhere('phone', 'like', '%' . $request->table_search . '%')
              ->orWhere('email', 'like', '%' . $request->table_search . '%');
        });
    }

    $data = $query->paginate(10);

    return view('admin.vendor.index', compact('data'));
}

    // ================== CREATE ==================
    public function create()
    {
        return view('admin.vendor.create');
    }

    // ================== STORE ==================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

        $vendor = new Vendor();

        $vendor->name = $request->name;
        $vendor->slug = Str::slug($request->name);

        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->website = $request->website;
        $vendor->address = $request->address;      
        $vendor->province = $request->province;
        // 🔥 FIELD QUAN TRỌNG
        $vendor->open_time = $request->open_time;
        $vendor->manager_name = $request->manager_name;
        $vendor->description = $request->description;
        $vendor->map_url = $request->map_url;

        //$vendor->position = $request->position ?? 0;
        $vendor->is_active = $request->has('is_active') ? 1 : 0;

        // upload ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'uploads/vendors/';

            $file->move(public_path($path), $filename);

            $vendor->image = $path . $filename;
        }

        $vendor->save();

        return redirect()->route('admin.vendor.index')
                         ->with('success', 'Thêm thành công!');
    }

    // ================== SHOW ==================
    public function show($id)
    {
        $data = Vendor::findOrFail($id);

        return view('admin.vendor.show', compact('data'));
    }

    // ================== EDIT ==================
    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);

        return view('admin.vendor.edit', compact('vendor'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

        $vendor = Vendor::findOrFail($id);

        $vendor->name = $request->name;
        $vendor->slug = Str::slug($request->name);

        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->website = $request->website;
        $vendor->address = $request->address;
        // STORE
        $vendor->province = $request->province;
        // 🔥 FIELD QUAN TRỌNG
        $vendor->open_time = $request->open_time;
        $vendor->manager_name = $request->manager_name;
        $vendor->description = $request->description;
        $vendor->map_url = $request->map_url;

        //$vendor->position = $request->position ?? 0;
        $vendor->is_active = $request->has('is_active') ? 1 : 0;

        // upload ảnh mới
        if ($request->hasFile('new_image')) {

            // xóa ảnh cũ
            if ($vendor->image && file_exists(public_path($vendor->image))) {
                unlink(public_path($vendor->image));
            }

            $file = $request->file('new_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'uploads/vendors/';

            $file->move(public_path($path), $filename);

            $vendor->image = $path . $filename;
        }

        $vendor->save();

        return redirect()->route('admin.vendor.index')
                         ->with('success', 'Cập nhật thành công!');
    }

    // ================== DELETE ==================
    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);

        // xóa ảnh nếu có
        if ($vendor->image && file_exists(public_path($vendor->image))) {
            unlink(public_path($vendor->image));
        }

        $vendor->delete();

        return response()->json([
            'status' => true
        ]);
    }

    // ================== DETAIL FRONTEND ==================
    public function detail($slug)
    {
        $vendor = Vendor::where('slug', $slug)
            ->where('is_active', 1)
            ->firstOrFail();

        return view('shop.vendor_detail', compact('vendor'));
    }
}