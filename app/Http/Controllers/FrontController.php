<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Contact;
use App\Pagination\Paginator;

class FrontController extends Controller
{
    public function index()
    {
        $product=Product::paginate(8);
        return view('Frontend.diet',compact('product'));
    
    }
    public function add_cart(Request $request,$id)
    {
        if (Auth::check()) {
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
            return redirect()->route('account.login');
        }
       
    }

    public function show_cart()
    {
       
        if (Auth::check()) {
            // User is authenticated, retrieve the cart items
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', $id)->get();
            return view('Frontend.showCart', compact('cart'));
        } else {
            // User is not authenticated, redirect to the login page
            return redirect()->route('account.login');
        }
        
       
    }
    public function remove_cart($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function back()
    {
        return redirect()->route('front.diet');
    }
    public function cash_order(){

        $user=Auth::user();
        $userid=$user->id;

        $data=Cart::where('user_id','=',$userid)->get();
         
        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->product_id=$data->product_id;

            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';
            $order->save();

            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();

        }
        return redirect()->back()->with('message','We have received your orders.');

    }
    public function submitContactForm(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'mobile_number' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Save form data to database
        $contact = new Contact();
        $contact->full_name = $request->full_name;
        $contact->email = $request->email;
        $contact->mobile_number = $request->mobile_number;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        // Optionally, you can return a response
        return redirect()->back()->with('success', 'Your message has been submitted successfully!');
    }

    

}
