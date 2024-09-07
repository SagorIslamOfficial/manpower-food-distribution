@extends('layouts.app')

@section('content')
    <h1>Create Menu Items</h1>

    <form action="{{ route('menu_items.store') }}" method="POST">
        @csrf

        <div>
            <label for="menu_id">Menu</label>
            <select name="menu_id" id="menu_id">
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="item_id">Item</label>
            <select name="item_id" id="item_id">
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="time_id">Time</label>
            <select name="time_id" id="time_id">
                @foreach($times as $time)
                    <option value="{{ $time->id }}">{{ $time->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="day_id">Day</label>
            <select name="day_id" id="day_id">
                @foreach($days as $day)
                    <option value="{{ $day->id }}">{{ $day->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Create</button>
    </form>
@endsection
