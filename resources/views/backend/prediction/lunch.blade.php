@extends('layouts.app')

@section('content')
    <h1>Lunch Prediction</h1>
    <p>Average Manpower: {{ $averageManpower }}</p>
    <table>
        <thead>
        <tr>
            <th>Item</th>
            <th>Predicted Quantity</th>
        </tr>
        </thead>
        <tbody style=" text-align: center">
        @foreach($predictedQuantities as $quantity)
            <tr>
                <td>{{ $quantity['item'] }}</td>
                <td>{{ $quantity['predicted_quantity'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
