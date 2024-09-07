@extends('layouts.app')

@section('content')
    <h1>Edit Item</h1>

    <form action="{{ route('items.update', $editItem->id) }}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $editItem->name }}">
        </div>

        <div>
            <label for="quantity_per_person">Quantity Per Person</label>
            <input type="number" name="quantity_per_person" id="quantity_per_person" value="{{ $editItem->quantity_per_person }}">
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
