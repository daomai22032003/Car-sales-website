<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $data = Article::latest()->paginate(20);

        return view('admin.article.index', compact('data'));
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'summary' => 'required',
            'description' => 'required',
        ]);

        $article = new Article();
        $article->title = $request->title;

        // ✅ Tạo slug không trùng
        $slug = Str::slug($request->title);
        $count = Article::where('slug', 'like', $slug . '%')->count();
        $article->slug = $count ? $slug . '-' . ($count + 1) : $slug;

        // Upload ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path_upload = 'uploads/article/';
            $file->move($path_upload, $filename);

            $article->image = $path_upload . $filename;
        }

        $article->type = $request->type;
        $article->position = $request->position;
        $article->is_active = $request->has('is_active') ? 1 : 0;
        $article->url = $request->url;
        $article->summary = $request->summary;
        $article->description = $request->description;
        $article->meta_title = $request->meta_title;
        $article->meta_description = $request->meta_description;

        $article->save();

        return redirect()->route('admin.article.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.article.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'summary' => 'required',
            'description' => 'required',
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;

        // ✅ Update slug (không trùng, bỏ chính nó ra)
        $slug = Str::slug($request->title);
        $count = Article::where('slug', 'like', $slug . '%')
            ->where('id', '!=', $id)
            ->count();

        $article->slug = $count ? $slug . '-' . ($count + 1) : $slug;

        // Upload ảnh mới
        if ($request->hasFile('new_image')) {
            @unlink(public_path($article->image));

            $file = $request->file('new_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path_upload = 'uploads/article/';
            $file->move($path_upload, $filename);

            $article->image = $path_upload . $filename;
        }

        $article->type = $request->type;
        $article->position = $request->position;
        $article->is_active = $request->has('is_active') ? 1 : 0;
        $article->url = $request->url;
        $article->summary = $request->summary;
        $article->description = $request->description;
        $article->meta_title = $request->meta_title;
        $article->meta_description = $request->meta_description;

        $article->save();

        return redirect()->route('admin.article.index');
    }

    public function destroy($id)
    {
        Article::destroy($id);

        return response()->json([
            'status' => true
        ]);
    }
}