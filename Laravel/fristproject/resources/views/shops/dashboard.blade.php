<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0f0f0;
      text-align: center;
      padding: 100px;
    }
    .box {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px #ccc;
      display: inline-block;
    }
    h1 {
      color: #2c3e50;
    }
    a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #e74c3c;
      color: white;
      border-radius: 8px;
      text-decoration: none;
    }
    a:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>

  <div class="box">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>You are logged in to the dashboard.</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" style="background-color:#e74c3c;color:white;border:none;padding:10px 20px;border-radius:8px;cursor:pointer;">
            Logout
        </button>
              <a class="link" href="{{ route('shops.index') }}">Home</a>

    </form>
  </div>

</body>
</html>
