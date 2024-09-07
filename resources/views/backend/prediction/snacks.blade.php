@extends('layouts.app')

@section('content')
    <h1>Snacks Prediction</h1>
    <p>Average Manpower: {{ $averageManpower }}</p>
    <table>
        <thead>
        <tr>
            <th>Item</th>
            <th>Time</th>
            <th>Predicted Quantity</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
        @foreach($predictedQuantities as $quantity)
            <tr>
                <td>{{ $quantity['item'] }}</td>
                <td>{{ $quantity['time'] }}</td>
                <td>{{ $quantity['predicted_quantity'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
