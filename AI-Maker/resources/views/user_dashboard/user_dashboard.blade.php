<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="User dashboard for managing accounts and activities">
    <meta name="keywords" content="dashboard, user, account, management, activities">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to Your Dashboard, {{ Auth::user()->name }}</h1>
    <p>This is your user dashboard where you can manage your account and see your activities.</p>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-label="Logout">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>