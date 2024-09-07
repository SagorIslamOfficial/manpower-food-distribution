@extends('layouts.app')

@section('content')
    <h2>Reports</h2>

    <form action="{{ route('reports.index') }}" method="GET">
        <label for="day">Select a Day:</label>
        <select name="day" id="day" onchange="this.form.submit()">
            <option value="">-- Select a Day --</option>
            @foreach($days as $day)
                <option value="{{ $day->name }}" {{ $selectedDay == $day->name ? 'selected' : '' }}>
                    {{ $day->name }}
                </option>
            @endforeach
        </select>
    </form>

    @if($selectedDay)
        <h3>Results for
            @if($selectedDay) Day: {{ $selectedDay }} @endif
        </h3>

        <h4>Manpower Quantity</h4>
        <table>
            <thead>
            <tr>
                <th>Meal Time</th>
                <th>Total Persons</th>
            </tr>
            </thead>
            <tbody>
            @foreach($manpower as $mealTime => $quantity)
                <tr>
                    <td>{{ $mealTime }}</td>
                    <td>{{ $quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h4>Snack Quantities</h4>
        <table>
            <thead>
            <tr>
                <th>Item</th>
                <th>Time</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            @foreach($snackQuantities as $snack)
                <tr>
                    <td>{{ $snack['item'] }}</td>
                    <td>{{ $snack['time'] }}</td>
                    <td>{{ $snack['quantity'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h4>Lunch Quantities</h4>
        <table>
            <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lunchQuantities as $lunch)
                <tr>
                    <td>{{ $lunch['item'] }}</td>
                    <td>{{ $lunch['quantity'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
