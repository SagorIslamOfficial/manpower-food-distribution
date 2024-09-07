<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dining & Snacks Management System</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">

    <form style="padding-bottom: 10px" method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <a href="{{ route('dashboard') }}">Dashboard</a> |
    <a href="{{ route('shifts.index') }}">Shifts</a> |
    <a href="{{ route('times.index') }}">Times</a> |
    <a href="{{ route('menus.index') }}">Menus</a> |
    <a href="{{ route('items.index') }}">Items</a> |
    <a href="{{ route('days.index') }}">Days</a> |
    <a href="{{ route('menu_items.index') }}">Menu Items</a> |
    <a href="{{ route('reports.index') }}">Reports</a> |

    <a href="{{ route('predict.snacks') }}">Predict Snacks</a> |
    <a href="{{ route('predict.lunch') }}">Predict Lunch</a> |

    <h1>Welcome, {{ Auth::user()->name }}!</h1>


    @yield('content')

</div>
</body>
</html>
