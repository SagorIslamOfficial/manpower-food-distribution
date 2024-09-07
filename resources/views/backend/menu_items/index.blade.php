@extends('layouts.app')

@section('content')
    <h1>Menu Items</h1>
    <a href="{{ route('menu_items.create') }}">Create Menu Item</a>

    <table>
        <thead>
        <tr>
            <th>Menu</th>
            <th>Item</th>
            <th>Time</th>
            <th>Day</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
        @foreach ($menuItems as $menuItem)
            <tr>
                <td>{{ $menuItem->menu->name }}</td>
                <td>{{ $menuItem->item->name }}</td>
                <td>{{ $menuItem->time->name }}</td>
                <td>{{ $menuItem->day->name }}</td>
                <td>
                    <a href="{{ route('menu_items.edit', $menuItem->id) }}">Edit</a>
                    <form action="{{ route('menu_items.destroy', $menuItem->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
