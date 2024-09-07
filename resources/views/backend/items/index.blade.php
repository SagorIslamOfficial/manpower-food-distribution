@extends('layouts.app')

@section('content')
    <h1>Items</h1>
    <a href="{{ route('items.create') }}">Create Item</a>

    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Quantity Per Person</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
        @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->quantity_per_person }}</td>
                <td>
                    <a href="{{ route('items.edit', $item) }}">Edit</a>
                    <form action="{{ route('items.destroy', $item) }}" method="POST">
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
