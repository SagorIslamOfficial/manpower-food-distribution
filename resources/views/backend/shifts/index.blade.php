@extends('layouts.app')

@section('content')
    <h1>Shifts</h1>
    <a href="{{ route('shifts.create') }}">Create Shift</a>

    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Manpower Count</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
        @foreach($shifts as $shift)
            <tr>
                <td>{{ $shift->name }}</td>
                <td>{{ $shift->manpower_count }}</td>
                <td>
                    <a href="{{ route('shifts.edit', $shift) }}">Edit</a>
                    <form action="{{ route('shifts.destroy', $shift) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
            <p style="font-weight: bold">Total Across All Shifts: {{ $totalManpower }} people</p>
@endsection
