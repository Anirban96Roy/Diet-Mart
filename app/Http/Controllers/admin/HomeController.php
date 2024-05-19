<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Pagination\Paginator;

class HomeController extends Controller
{
    public function index()
    {
        $total_product=Product::all()->count();
        $total_order=Order::all()->count();
        $total_user=User::all()->count();
        $order=Order::all();
        $total_sale=0;
        foreach($order as $order)
        {
            $total_sale=$total_sale + $order->price;

        }
        $total_delivered=Order::where('delivery_status','=','delivered')->get()->count();
        $total_processing=Order::where('delivery_status','=','processing')->get()->count();
        return view('admin.dashboard',compact('total_product','total_order','total_user','total_sale','total_delivered','total_processing'));
       
    }
    public function logout()
    {
       Auth::guard('admin')->logout();
       return redirect()->route('front.diet');
    }
    
 
}