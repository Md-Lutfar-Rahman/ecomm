<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Product;

use App\Models\Order;



class CartController extends Controller
{
   

    function index(){
        return view('frontend.card.card');
    }


    public function showCard()
        {
    $totalPrice = 0;
    $cartItems = [];

    if (Auth::check()) {
        // If user is authenticated, retrieve cart data from the database
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();

        // Calculate total price
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->product->price * $cartItem->quantity;
        }
    } else {
        // If user is not authenticated, retrieve cart data from session storage
        $cartItems = session()->get('cart', []);

        // Calculate total price
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem['product_id']);
            if ($product) {
                // Check if the product has been ordered
                if (!$this->isProductOrdered($product)) {
                    $totalPrice += $product->price * $cartItem['quantity'];
                }
            }
        }
    }

    // Return cart items and total price
    return view('frontend.card.card',['cartItems' => $cartItems, 'totalPrice' => $totalPrice]);
}

private function isProductOrdered($product)
{
    // Check if the product has any orders
    return $product->orders()->exists();
}



// public function placeOrder(Request $request)
// {
//     // Retrieve the authenticated user
//     $user = Auth::user();
    
//     // Check if the user has cart items
//     if ($user->cartItems()->exists()) {
//         // Calculate total price and update inventory for each item in the cart
//         $totalPrice = 0;
//         foreach ($user->cartItems as $cartItem) {
//             // Calculate total price
//             $totalPrice += $cartItem->product->price * $cartItem->quantity;

//             // Reduce inventory quantity
//             $cartItem->product->decrement('quantity', $cartItem->quantity);

//             // Save product_id and quantity for each cart item in the order
//             $orderItems[] = [
//                 'product_id' => $cartItem->product_id,
//                 'quantity' => $cartItem->quantity
//             ];
//         }

//         // Create a new order record
//         $order = new Order();
//         $order->user_id = $user->id;
//         $order->cart_id = $request->cart_id;
//         $order->order_date = now(); // Set the order date to current date and time
//         $order->order_status = 'Pending'; // Set the order status to 'Pending' (or any other default status)
//         $order->total_amount = $totalPrice; // Set the total amount
//         $order->payment_status = 'Pending'; // Set the payment status to 'Pending' (or any other default status)
//         $order->shipping_address = $request->shipping_address;
//         $order->billing_address = $request->billing_address;
//         $order->shipping_method = $request->shipping_method;
//         $order->payment_method = $request->payment_method;
        
//         // Save the order
//         $order->save();

//         // Save order items (products) associated with the order
//         $order->products()->attach($orderItems);
        
//         // Clear the user's cart
//         $user->cartItems()->delete();

//         // Redirect to a confirmation page
//         return redirect()->route('placeorder')->with('success', 'Order placed successfully!');
//     } else {
//         // If the user has no cart items, redirect to the placeOrder view with error message
//         return redirect()->route('placeorder')->with('error', 'Your cart is empty.');
//     }
// }

public function placeOrder(Request $request)
{
    // Retrieve the authenticated user
    $user = Auth::user();

    // Retrieve cart items from the session or database
    $cartItems = $user->cartItems()->get();

    // Create an array to store order details
    $ordersData = [];

    // Iterate over product_ids and quantities arrays
    for ($i = 0; $i < count($request->product_ids); $i++) {
        $product_id = $request->product_ids[$i];
        $quantity = $request->quantities[$i];

        // Calculate total price for this product
        $total_price = $quantity * $cartItems[$i]->product->price;

        // Add order details to the array
        $ordersData[] = [
            'user_id' => $user->id,
            'total_price' => $total_price,
            'cart_id' => $request->cart_id,
            'quantity' => $quantity,
            'product_id' => $product_id,
            'order_date' => now(),
            'order_status' => 'Pending',
            'total_amount' => $total_price,
            'payment_status' => 'Pending',
            'shipping_address' => $request->shipping_address,
            'billing_address' => $request->billing_address,
            'shipping_method' => $request->shipping_method,
            'payment_method' => $request->payment_method,
        ];

        // Reduce product quantity in inventory (if applicable)
        // Assuming you have a method to update the inventory
        // $cartItems[$i]->product->decrement('quantity', $quantity);
    }

    // Insert orders data into the orders table
    Order::insert($ordersData);

    // Clear the user's cart
    $user->cartItems()->delete();

    // Redirect to a confirmation page
    return redirect()->route('placeorder')->with('success', 'Order placed successfully!');
}

    

        function checkout(Request $request)
        
        {
            // Assuming you have a way to retrieve cart items associated with the current user
                $cartItems = CartItem::where('user_id', auth()->id())->with('product')->get();

                // Calculate total price if needed
                $totalPrice = $cartItems->sum(function ($item) {
                    return $item->product->price * $item->quantity;
                });

                return view('frontend.card.chackout', compact('cartItems', 'totalPrice'));
        }


    function Ordercomplete(Request $request){

        $successMessage = $request->session()->get('success');
        $errorMessage = $request->session()->get('error');

        // Pass the session messages to the view
        return view('frontend.card.placeorder', compact('successMessage', 'errorMessage'));
    }
}
