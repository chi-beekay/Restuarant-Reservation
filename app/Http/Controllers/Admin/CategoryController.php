<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $categories = Category::all();
        return response()->view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $image = $request->file('image')->store('public/categories');

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): Response
    {
        return response()->view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): Response
    {
        return response()->view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'

        ]);

        $image = $category->image;
        if ($request->hasFile('image')) {
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/categories');
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {

        // Storage::delete($category->image);
        $imagePath = $category->image;
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
