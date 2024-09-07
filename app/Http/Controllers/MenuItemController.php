<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Item;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Time;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with(['menu', 'item', 'time', 'day'])->get();
        return view('backend.menu_items.index', compact('menuItems'));
    }

    public function create()
    {
        $menus = Menu::all();
        $items = Item::all();
        $times = Time::all();
        $days = Day::all();
        return view('backend.menu_items.create', compact('menus', 'items', 'times', 'days'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'item_id' => 'required|exists:items,id',
            'time_id' => 'required|exists:times,id',
            'day_id' => 'nullable|exists:days,id',
        ]);
//dd($request->all());
        MenuItem::create($request->all());

        return redirect()->route('menu_items.index');
    }

    public function edit(string $id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menus = Menu::all();
        $items = Item::all();
        $times = Time::all();
        $days = Day::all();
        return view('backend.menu_items.edit', compact('menuItem', 'menus', 'items', 'times', 'days'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'item_id' => 'required|exists:items,id',
            'time_id' => 'required|exists:times,id',
            'day_id' => 'nullable|exists:days,id',
        ]);

        $menuItem->update($request->all());

        return redirect()->route('menu_items.index');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu_items.index');
    }
}
