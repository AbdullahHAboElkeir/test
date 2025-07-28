<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>إضافة منتج جديد</title>
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: #3490dc;
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #333;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    input[type="url"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    button {
      background-color: #38c172;
      color: #fff;
      border: none;
      padding: 12px 20px;
      cursor: pointer;
      font-size: 16px;
      border-radius: 4px;
      transition: background 0.3s;
    }

    button:hover {
      background-color: #2d995b;
    }
  </style>
</head>
<body>
  
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <div class="container">
    <h1>إضافة منتج جديد</h1>
    <form action="{{route('shops.store')}}" method="POST">
      <!-- في Laravel لازم @csrf هنا -->
        
     @csrf
    
      <label for="name">اسم المنتج:</label>
      <input type="text" id="name" name="name" required />

      <label for="description">وصف المنتج:</label>
      <textarea id="description" name="description" rows="4" required></textarea>

      <label for="price">السعر:</label>
      <input type="number" id="price" name="price" min="0" step="0.01" required />

 

      <button type="submit">حفظ المنتج</button>
    </form>
  </div>
</body>
</html>
