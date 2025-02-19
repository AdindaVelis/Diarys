<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DiaryController extends Controller
{
    public function index()
    {
        // Ambil data dengan pagination
        $diaries = Diary::with('user')->paginate(5); // Menampilkan 10 item per halaman

        // Kirim data ke view
        return view('diaries.index', compact('diaries'));
    }

    public function create()
    {
        return view('diaries.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $gambar = $request->file('image')->store('images', 'public');
            $validate['image'] = $gambar;
        }

        $validate['user_id'] = Auth::id();

        Diary::create($validate);

        return redirect()->route('diaries.index');
    }

    public function edit($id)
    {
        $diary = Diary::findOrFail($id);
        return view('diaries.edit', compact('diary'));
    }

    public function update(Request $request, $id)
    {
        $diary = Diary::findOrFail($id);

        $validate = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($diary->image) {
                Storage::delete('public/' . $diary->image);
            }
            $gambar = $request->file('image')->store('images', 'public');
            $validate['image'] = $gambar;
        }

        $diary->update($validate);

        return redirect()->route('diaries.index');
    }

    public function destroy($id)
    {
        $diary = Diary::findOrFail($id);

        if ($diary->image) {
            Storage::delete('public/' . $diary->image);
        }

        $diary->delete();

        return redirect()->route('diaries.index');
    }
}
