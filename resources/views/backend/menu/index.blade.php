@extends('layouts.app')

@section('content')
    <h1>Menus</h1>
    <a href="{{ route('menus.create') }}">Create Menu</a>

    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->name }}</td>
                <td>
                    <a href="{{ route('menus.edit', $menu) }}">Edit</a>
                    <form action="{{ route('menus.destroy', $menu) }}" method="POST">
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
