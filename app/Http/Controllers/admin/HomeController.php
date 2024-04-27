<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Pagination\Paginator;

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::paginate(8);
        return view('Frontend.diet',compact('product'));
       //$admin= Auth::guard('admin')->user();
       // echo 'welcome'.$admin->name.'<a href="'.route('admin.logout').'">Logout</a>';
    }
    public function logout()
    {
       Auth::guard('admin')->logout();
       return redirect()->route('admin.login');
    }
    public function in()
    {
        return view('Frontend.diet');
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $product=Product::find($id);
            $cart=new Cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
        
            $cart->user_id=$user->id;
            $cart->product_title=$product->title;
            if($product->discount_price!=null)
            {
                 $cart->price=$product->discount_price * $request->quantity;
            }
            else{
                $cart->price=$product->price * $request->quantity;
            }
           
            $cart->product_id=$product->id;
            $cart->quantity=$request->quantity;
            $cart->save();

            return redirect()->back();
        }
        else{
            return redirect('admin.login');
        }
    }

 
}