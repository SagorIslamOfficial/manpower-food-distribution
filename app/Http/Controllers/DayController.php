<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        $days = Day::all();
        return view('backend.day.index', compact('days'));
    }

    public function create()
    {
        return view('backend.day.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Day::create($request->all());

        return redirect()->route('days.index');
    }

    public function edit(string $id)
    {
        $editDay = Day::findOrFail($id);
        return view('backend.day.edit', compact('editDay'));
    }

    public function update(Request $request, Day $day)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $day->update($request->all());

        return redirect()->route('days.index');
    }

    public function destroy(Day $day)
    {
        $day->delete();

        return redirect()->route('days.index');
    }
}
