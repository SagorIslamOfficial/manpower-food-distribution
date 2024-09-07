@extends('layouts.app')

@section('content')
    <h1>Edit Menu</h1>

    <form action="{{ route('menus.update', $editMenu->id) }}" method="POST">
        @csrf
        @method('put')

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $editMenu->name }}">
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
