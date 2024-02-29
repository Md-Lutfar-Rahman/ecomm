<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

   
    public function create()
    {
        return view('Admin.products.add');
    }

   
    public function store(Request $request)
    {
        // Validate the request data...
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure the uploaded file is an image
            // Add more validation rules as needed
        ]);
    
        // Store the image in the public directory
        $imagePath = $request->file('image')->store('public/products');
        
        // Get the actual path of the stored image
        $imageUrl = Storage::url($imagePath);
    
        // Create the product with the validated data and image URL
        $product = Product::create(array_merge($validatedData, ['image' => $imageUrl]));
    
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
   
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

   
    public function edit(Product $product)
    {
        return view('Admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // adjust validation rules as needed
        ]);
    
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($request->name) . '_' . time() . '.' . $image->getClientOriginalExtension();
            
            // Move the uploaded image to the desired location in the public directory
            $image->storeAs('public/products', $imageName);
    
            // Delete the older image if it exists
            if ($product->image) {
                Storage::delete($product->image);
            }
    
            // Update the product's image field with the new image path
            $product->image = 'storage/products/' . $imageName;

        }
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    // Add to Cart 

    public function addToCart(Request $request, Product $product)
    {
        // Check if user is authenticated
        if (Auth::check()) {
            // If user is authenticated, store cart data in database
            $cartItem = new CartItem();


            $cartItem->user_id = Auth::user()->id;

            $cartItem->product_id = $product->id;
            $cartItem->quantity = $request->input('quantity', 1); // Assuming quantity is submitted through request
            $cartItem->save();
            
            return redirect()->route('products.index')->with('success', 'Product added to cart successfully.');
        } 
        else 
        {
            // If user is not authenticated, redirect to login
            return redirect()->route('login')->with('error', 'Please login to add products to your cart.');
        }
    }
    

}
