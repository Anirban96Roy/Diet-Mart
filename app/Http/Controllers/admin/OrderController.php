<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Order;

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
        $order->delivery_status="delivered";
        $order->payment_status="paid";
        $order->save();
        return redirect()->back();
    }
}
