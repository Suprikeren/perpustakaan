<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderByDesc('id')->with('categories')->get();
        return view('admins.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admins.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'avatar' => 'required|image|mimes:png,jpg,jpeg',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_date' => 'required|date',
            // 'status' => 'required|string|max:255',
            'status' => 'required|in:tersedia,dipinjam',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',

        ]);

        DB::beginTransaction();

        try {
            $date = now()->format('Ymd');
            $countToDay = Book::whereDate('created_at', now()->toDateString())->count() + 1;
            $isbn = 'MD' . $date . str_pad($countToDay, 4, '0', STR_PAD_LEFT);

            if ($request->hasFile('avatar')) {
                $avatar_path = $request->file('avatar')->store('avatar/' . date('Y/m/d'), 'public');
                $validated['avatar'] = $avatar_path;
            }

            $validated['isbn'] = $isbn;

            $book = Book::create($validated);

            $book->categories()->attach($validated['categories']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Gagal menyimpan data: ' . $e->getMessage());
        }

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admins.books.edit', compact('categories', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'avatar' => 'sometimes|image|mimes:png,jpg,jpeg',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_date' => 'required|date',
            // 'status' => 'required|string|max:255',
            'status' => 'required|in:tersedia,dipinjam',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',

        ]);


        DB::beginTransaction();

        try {

            if ($request->hasFile('avatar')) {
                // Hapus file avatar lama jika ada
                if ($book->avatar && Storage::disk('public')->exists($book->avatar)) {
                    Storage::disk('public')->delete($book->avatar);
                }

                // Simpan avatar baru
                $avatar_path = $request->file('avatar')->store('avatar/' . date('Y/m/d'), 'public');
                $validated['avatar'] = $avatar_path;
            }


            $book->update($validated);

            $book->categories()->sync($validated['categories']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Gagal menyimpan data: ' . $e->getMessage());
        }

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        DB::beginTransaction();

        try {
            if ($book->avatar && Storage::disk('public')->exists($book->avatar)) {
                Storage::disk('public')->delete($book->avatar);
            }
            //  $book->categories()->detach(); sudah pakai onDelete cascade jadi gak perlu sih

            $book->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Gagal menghapus data: ' . $e->getMessage());
        }

        return redirect()->route('books.index');
    }
}
