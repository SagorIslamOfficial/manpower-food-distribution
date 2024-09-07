@extends('layouts.app')

@section('content')
    <h1>Times</h1>
    <a href="{{ route('times.create') }}">Create Time</a>

    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
        @foreach($times as $time)
            <tr>
                <td>{{ $time->name }}</td>
                <td>
                    <a href="{{ route('times.edit', $time) }}">Edit</a>
                    <form action="{{ route('times.destroy', $time) }}" method="POST">
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
