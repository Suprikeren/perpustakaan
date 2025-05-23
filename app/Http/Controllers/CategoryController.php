<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderByDesc('id')->get();
        return view('admins.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|unique:categories|max:255',
        ]);

        DB::beginTransaction();

        try {
            $category = Category::create($validated);


            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Gagal menyimpan data: ' . $e->getMessage());
        }


        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admins.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories|max:255',
        ]);

        DB::beginTransaction();

        try {
            $category->update($validated);


            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Gagal menyimpan data: ' . $e->getMessage());
        }


        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();

        try {
            $category->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Gagal menghapus data: ' . $e->getMessage());
        }

        return redirect()->route('categories.index');
    }
}
