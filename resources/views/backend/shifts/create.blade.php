@extends('layouts.app')

@section('content')
    <h1>Create Shift</h1>

    <form action="{{ route('shifts.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="manpower_count">Manpower Count</label>
            <input type="number" name="manpower_count" id="manpower_count" value="{{ old('manpower_count') }}">
        </div>

        <button type="submit">Create</button>
    </form>
@endsection
