@extends('layouts.app')

@section('content')
    <h1>Edit Time</h1>

    <form action="{{ route('times.update', $editTime->id) }}" method="POST">
        @csrf
        @method('put')

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $editTime->name }}">
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
