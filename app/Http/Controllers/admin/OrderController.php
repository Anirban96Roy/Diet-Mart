<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function order()
    {
        $order=Order::all();
        return view('admin.order.order',compact('order'));
    }
    public function delivered($id)
    {
        $order=Order::find($id);
        $product=Product::find($order->product_id);
        $order->delivery_status="delivered";
        if($order->delivery_status== "delivered"){
            $product->quantity = $product->quantity - $order->quantity;
        }
        $order->payment_status="paid";
        $product->save();
        $order->save();
        return redirect()->back();
    }
}
