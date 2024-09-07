@extends('layouts.app')

@section('content')
    <h1>Create Menu</h1>

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>

        <button type="submit">Create</button>
    </form>
@endsection
