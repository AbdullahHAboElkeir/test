<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>تفاصيل المنتج</title>
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      align-items: center;
    }

    .product-image {
      flex: 1 1 300px;
    }

    .product-image img {
      width: 100%;
      border-radius: 8px;
      max-height: 400px;
      object-fit: cover;
    }

    .product-details {
      flex: 1 1 300px;
    }

    .product-details h1 {
      margin-top: 0;
      color: #3490dc;
    }

    .product-details p {
      line-height: 1.6;
      color: #555;
    }

    .price {
      color: #38c172;
      font-size: 24px;
      font-weight: bold;
      margin: 20px 0;
    }

    .btn {
      display: inline-block;
      background: #3490dc;
      color: #fff;
      padding: 12px 20px;
      text-decoration: none;
      border-radius: 4px;
      transition: background 0.3s;
    }

    .btn:hover {
      background: #2779bd;
    }
    .link {
            display: inline-block;
        background-color: #3490dc; /* أزرق جميل */
       color: #fff;
          text-decoration: none;
          padding: 10px 20px;
         border-radius: 4px;
         font-weight: bold;
              transition: background-color 0.3s, transform 0.2s;
            margin: 20px 0;
            margin-left: 20px;
    }
    .di{
            color: #555;
            margin: 10px 0;
            font-size: 16px;
        }

        .di:hover {
            color: #3490dc;
        }

        .product-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
    }

  </style>
</head>
<body>
    <a href="{{route('shops.index')}}" class="link"> Home</a>
  <div class="container">
    <div class="product-image">
      <img src="https://via.placeholder.com/500x400" alt="منتج 1" />
    </div>
    <div class="product-details">
   <h1>{{ $shops->name }}</h1>

  <div class="price">{{ $shops->price }} EGP</div>
  <div class="di">{{ $shops->description }}</div>
  <div class="di">Created at: {{ $shops->created_at->format('Y-M-D') }}</div>
  <div class="di">Updated at: {{ $shops->updated_at }}</div>

    </div>
  </div>
</body>
</html>
