@extends('layouts.app')

@section('content')
    <h1>Edit Day</h1>

    <form action="{{ route('days.update', $editDay->id) }}" method="POST">
        @csrf
        @method('put')

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $editDay->name }}">
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
