@extends('layouts.app')

@section('content')
    <h1>Edit Shift</h1>

    <form action="{{ route('shifts.update', $editShift->id) }}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $editShift->name }}">
        </div>

        <div>
            <label for="manpower_count">Manpower Count</label>
            <input type="number" name="manpower_count" id="manpower_count" value="{{ $editShift->manpower_count }}">
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
