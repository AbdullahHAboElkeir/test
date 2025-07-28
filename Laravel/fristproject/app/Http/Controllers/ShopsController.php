<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shop; // Ensure the model is imported

class ShopsController extends Controller
{
    public function index()
    {
        $dbshops=shop::all();
         
        // Logic to retrieve and display shops
        return view('shops.index',['shops' => $dbshops]);
    }
   public function show($id)
    {
    $shop = shop::findOrFail($id);
    return view('shops.show', ['shops' => $shop]);  
    }

    public function create()
    {
        // Logic to show the form for creating a new shop
        return view('shops.create');
    }
    // Add other methods as needed for your controller
public function store(Request $request)
{
    // Validate the request data
   $request->validate([
    'name' => ['required', 'string', 'max:255', 'min:3', 'unique:shops,name'],
    'description' => ['nullable', 'string', 'max:1000', 'min:10'],
    'price' => ['required', 'numeric', 'min:1'],
]);

    // Retrieve the input data from the request
    $name = $request->input('name');
    $description = $request->input('description');
    $price = $request->input('price');

    // تقدر هنا تعمل save في الداتا بيز لو عاوز
    $shop = new shop();
    $shop->name = $name;
    $shop->description = $description;
    $shop->price = $price;
    $shop->save();
    // Product::create([...]);
    //dd($name, $description, $price);

    return to_route('shops.index');
}
    public function edit(shop $shop)
    {
      
       
        // Logic to show the form for editing a shop
        return view('shops.edit', ['shop' => $shop]);
    }
 

public function update(Request $request, Shop $shop)
{
    $name = $request->input('name');
    $description = $request->input('description');
    $price = $request->input('price');

    $shop->update([
        'name' => $name,
        'description' => $description,
        'price' => $price,
    ]);
    
    return to_route('shops.show', $shop->id);
}
    public function destroy(Shop $shop)
    {
        // Logic to delete a shop
        $shop->delete();
        return to_route('shops.index');
    }
    
    

}
 