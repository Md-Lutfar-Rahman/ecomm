<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\CartItem;
class AdminController extends Controller
{
    public function home()
    {
        return view('Admin.home');
    }

    function adminProducts(){
        $products = Product::all();
        return view('Admin.products.index',compact('products'));
    }

    function adminOrders() {
        // Retrieve all orders
        $orders = Order::all();
    
        // return $orders;
        return view('Admin.orders.index',compact('orders'));
    }
    

    function adminEdit(Request $request, $id ){
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order'));

    }
    function adminUpdate(Request $request, $id ){
        $request->validate([
            'status' => 'required|in:Processing,Confirmed,Shipped',
        ]);

        $order = Order::findOrFail($id);

        // Update the order status
        $order->update([
            'order_status' => $request->status // Assuming 'status' is the field to update
        ]);
            
        return redirect()->route('admin.orders')->with('success', 'Order status updated successfully!');
        

    }



    function adminDestroy(Request $request, $id ){
        $order = Order::findOrFail($id);

        // Delete the order
        $order->delete();

        return redirect()->route('admin.orders')->with('success', 'Order deleted successfully!');

    }


    // for Course related operations
        function courses (){
            return  view('Admin.courses.index');
        }
}
