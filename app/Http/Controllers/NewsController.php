<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Mendapatkan semua berita
    public function index()
    {
        return response()->json(News::all(), 200);
    }

    // Menambahkan berita baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:100',
            'image_url' => 'nullable|url'
        ]);

        $news = News::create($validatedData);
        return response()->json($news, 201);
    }

    // Mendapatkan berita berdasarkan ID
    public function show($id)
    {
        $news = News::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }
        return response()->json($news, 200);
    }

    // Mengupdate berita
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }

        $news->update($request->all());
        return response()->json($news, 200);
    }

    // Menghapus berita
    public function destroy($id)
    {
        $news = News::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }

        $news->delete();
        return response()->json(['message' => 'News deleted successfully'], 200);
    }
}
