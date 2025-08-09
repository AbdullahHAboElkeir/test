<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f5f5;
    }
    .container {
      max-width: 400px;
      margin: 80px auto;
      padding: 30px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 0 10px #ccc;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    input[type="text"], input[type="email"], input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    button {
      width: 100%;
      padding: 12px;
      background-color: #2ecc71;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }
    button:hover {
      background-color: #27ae60;
    }
    .link {
       display: block;
      margin-top: 15px;
      text-align: center;
        color: #3498db;
        text-decoration: none;
    
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register.post') }}">
      @csrf
      <input type="text" name="name" placeholder="Full Name" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
      <button type="submit">Register</button>
      <a class="link" href="{{ route('shops.login') }}">Already have an account? Login</a>
      <a class="link" href="{{ route('shops.index') }}">Home</a>
    </form>
  </div>

</body>
</html>
