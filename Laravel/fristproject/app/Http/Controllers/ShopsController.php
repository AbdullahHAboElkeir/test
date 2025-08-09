<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // ✅ الصح
use App\Models\Shop; // ✅ اسم الموديل لازم يكون بحروف كبيرة لو كده في المشروع
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
    public function login()
    {
        return view('shops.login');
    }
     public function dashboard()
    {
        // Logic to show the dashboard
        return view('shops.dashboard');
    }


    public function loginstore(Request $request): RedirectResponse
    {
            // Logic to handle login
        // Validate and authenticate the user
        // Redirect to dashboard or another page after successful login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    
    public function register(){
        return view('shops.register');
    }
     public function registerstore(Request $request): RedirectResponse
    { 
        // Validate the registration data
        $userdata= $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:4', 'confirmed'],
            'password_confirmation' => ['required', 'min:4'],
        ]);
        // Create the user
        $userdata ['password'] = Hash::make($userdata['password']);
        $user = User::create($userdata);
        // Log the user in
        Auth::login($user);
        return redirect()->route('dashboard');

        
    }
    
    public function logout(){
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('shops.index');
    }
    public function showall()
    {
        // Logic to show all accounts in the web
        $users = User::paginate(10);

        return view('shops.showall', ['users' => $users]);
    }
    

}
 