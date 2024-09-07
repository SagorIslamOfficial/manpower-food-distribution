@extends('layouts.app')

@section('content')
    <h1>Create Item</h1>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="quantity_per_person">Quantity Per Person</label>
            <input type="number" name="quantity_per_person" id="quantity_per_person" value="{{ old('quantity_per_person') }}">
        </div>

        <button type="submit">Create</button>
    </form>
@endsection
