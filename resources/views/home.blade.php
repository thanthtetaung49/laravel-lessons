<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>This is home page.</h1>
    {{-- login logout register --}}

    @if (session('authMessage'))
        <p style="color: red;">{{ session('authMessage') }}</p>
    @endif

    <a href="{{ route('customer#home') }}">Home</a>
    <a href="{{ route('customer#about') }}">About</a>
    <a href="{{ route('customer#contact') }}">Contact</a>
    <a href="{{ route('customer#order') }}">Order</a>

    <h2> Role - {{ Auth::user()->role }}</h2>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="submit" value="Logout" />
    </form>
</body>

</html>
