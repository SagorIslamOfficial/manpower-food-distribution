<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('backend.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('backend.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Menu::create($request->all());

        return redirect()->route('menus.index');
    }

    public function edit(string $id)
    {
        $editMenu = Menu::findOrFail($id);
        return view('backend.menu.edit', compact('editMenu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $menu->update($request->all());

        return redirect()->route('menus.index');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index');
    }
}
