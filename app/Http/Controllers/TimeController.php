<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $times = Time::all();
        return view('backend.time.index', compact('times'));
    }

    public function create()
    {
        return view('backend.time.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Time::create($request->all());

        return redirect()->route('times.index');
    }

    public function edit(string $id)
    {
        $editTime = Time::findOrFail($id);
        return view('backend.time.edit', compact('editTime'));
    }

    public function update(Request $request, Time $time)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $time->update($request->all());

        return redirect()->route('times.index');
    }

    public function destroy(Time $time)
    {
        $time->delete();

        return redirect()->route('times.index');
    }
}
