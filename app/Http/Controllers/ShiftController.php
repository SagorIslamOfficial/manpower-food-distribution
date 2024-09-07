<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::all();

        $totalManpower = $shifts->sum('manpower_count');

        return view('backend.shifts.index', [
            'shifts' => $shifts,
            'totalManpower' => $totalManpower,
        ]);
    }

    public function create()
    {
        return view('backend.shifts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'manpower_count' => 'required|integer',
        ]);

        Shift::create($request->all());

        return redirect()->route('shifts.index');
    }

    public function edit(string $id)
    {
        $editShift = Shift::findOrFail($id);
        return view('backend.shifts.edit', compact('editShift'));
    }

    public function update(Request $request, Shift $shift)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manpower_count' => 'required|integer',
        ]);

        $shift->update($request->all());

        return redirect()->route('shifts.index');
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();

        return redirect()->route('shifts.index');
    }
}
