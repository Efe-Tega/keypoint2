<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
</head>

<body>
    <h1 class="">Admin Login</h1>

    <form action="{{ url('/admin-login') }}" method="post">
        @csrf
        <input type="email" placeholder="Enter Email" name="email">
        <input type="password" placeholder="Enter Password" name="password">

        <button type="submit">Login</button>
    </form>
</body>

</html>
