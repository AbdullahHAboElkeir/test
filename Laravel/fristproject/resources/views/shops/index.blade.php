<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>متجر المنتجات</title>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3490dc;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 0 20px;
        }

        .product-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-info {
            padding: 15px;
            flex: 1;
        }

        .product-info h3 {
            margin: 0 0 10px;
            color: #3490dc;
        }

        .product-info p {
            color: #555;
            margin: 0 0 10px;
        }

        .product-info .price {
            color: #38c172;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            background: #38c172;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #2d995b;
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
       .lin{
            display: inline-block;
            background-color: #e3342f; /* أحمر جميل */
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
            margin: 20px 0;
            margin-left: 20px;
        }
        .link:hover, .lin:hover {
            background-color: #2c3e50; /* لون داكن عند التمرير */
            transform: translateY(-2px); /* تأثير رفع خفيف */
       }
    </style>
</head>
<body>
    <header>
        <h1>متجر بيع المنتجات</h1>
        
    </header>
        <div class="links">
            <a href="{{route('shops.create')}}" class="link"> addprodcut </a>
            <a href="{{route('shops.login')}}" class="link"> Login</a>
            <a href="{{route('shops.register')}}" class="link"> Register</a>
            <a href="{{route('shops.showall')}}"class="lin" >Show all Account In Web </a>


        </div>
       
    <div class="container">
         @foreach($shops as $shop)
        <div class="product-card">
        
            <div class="product-info">
                   <h3>{{ $shop->name }}</h3>
                  <p>{{ $shop->description }}</p>
                     <p>Price: {{ $shop->price }} EGP</p>
                     <p>cretedat: {{ $shop->created_at }}</p>
                <p>updatedat: {{ $shop->updated_at }}</p>

                <a href="{{ route('shops.show', $shop->id) }}" class="btn">Show</a> 
                <a href="{{ route('shops.edit', $shop->id) }}" class="btn">Edit</a>
                <form action="{{ route('shops.destroy', $shop->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="background-color: #e3342f;">Delete</button>
             
            </div>
   @endforeach
        </div>
     
     
        </div>
    </div>
</body>
</html>
