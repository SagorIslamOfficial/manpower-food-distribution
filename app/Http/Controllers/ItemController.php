<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('backend.items.index', compact('items'));
    }

    public function create()
    {
        return view('backend.items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'quantity_per_person' => 'required',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index');
    }

    public function edit(string $id)
    {
        $editItem = Item::findOrFail($id);
        return view('backend.items.edit', compact('editItem'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string',
            'quantity_per_person' => 'required',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');
    }
}
