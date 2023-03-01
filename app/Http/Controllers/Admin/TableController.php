<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Table;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $tables = Table::all();
        return response()->view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableStoreRequest $request): RedirectResponse
    {
        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return redirect()->route('admin.tables.index');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
