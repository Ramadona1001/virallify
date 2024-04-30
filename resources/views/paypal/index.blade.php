<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 7 PayPal Payment Gateway Integration Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
</head>
<body>
    <div class="container mt-5 text-center">
        <h2>Laravel 7 PayPal Integration Example</h2>
        <form action="{{ route('testroutetype') }}" method="POST">
            @csrf
            <input type="text" name="username" id="">
            <button type="submit">Pay</button>
        </form>
    </div>
</body>
</html>