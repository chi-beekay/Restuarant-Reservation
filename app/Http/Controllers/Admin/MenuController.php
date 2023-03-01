<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $menus = Menu::all();
        return response()->view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {

        $categories = Category::all();
        return response()->view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request): RedirectResponse
    {
        $image = $request->file('image')->store('public/menus');

        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        // check if request has categories
        if ($request->has('categories')) {
            $menu->categories()->attach($request->categories);
        }

        return redirect()->route('admin.menus.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Menu $menu): Response
    // {
    //     return response()->view('admin.menus.show', compact('menu'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu): Response
    {
        $categories = Category::all();
        return response()->view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'

        ]);

        $image = $menu->image;
        if ($request->hasFile('image')) {
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/menus');
        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);


        return redirect()->route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        // Storage::delete($category->image);
        $imagePath = $menu->image;
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
        $menu->delete();

        return redirect()->route('admin.menus.index');
    }
}
