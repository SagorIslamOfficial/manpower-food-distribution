@extends('layouts.app')

@section('content')
    <h1>Edit Menu Item</h1>

    <form action="{{ route('menu_items.update', $menuItem->id) }}" method="POST">
        @csrf
        @method('put')

        <div>
            <label for="menu_id">Menu</label>
            <select name="menu_id" id="menu_id">
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" {{ $menuItem->menu_id == $menu->id ? 'selected' : '' }}>
                        {{ $menu->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="item_id">Item</label>
            <select name="item_id" id="item_id">
                @foreach($items as $item)
                    <option value="{{ $item->id }}" {{ $menuItem->item_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="time_id">Time</label>
            <select name="time_id" id="time_id">
                @foreach($times as $time)
                    <option value="{{ $time->id }}" {{ $menuItem->time_id == $time->id ? 'selected' : '' }}>
                        {{ $time->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="day_id">Day</label>
            <select name="day_id" id="day_id">
                @foreach($days as $day)
                    <option value="{{ $day->id }}" {{ $menuItem->day_id == $day->id ? 'selected' : '' }}>
                        {{ $day->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
