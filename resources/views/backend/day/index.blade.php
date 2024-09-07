@extends('layouts.app')

@section('content')
    <h1>Days</h1>
    <a href="{{ route('days.create') }}">Create Day</a>

    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
        @foreach($days as $day)
            <tr>
                <td>{{ $day->name }}</td>
                <td>
                    <a href="{{ route('days.edit', $day) }}">Edit</a>
                    <form action="{{ route('days.destroy', $day) }}" method="POST">
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
