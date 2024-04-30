<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
   public function login()
   {
    return view('Frontend.account.login');

   }
   public function register()
   {
    return view('Frontend.account.register');

   }
   public function processRegister(Request $request)
   {
    $validator = Validator::make($request->all(), [
        
        'name' => 'required|min:3',
        'email' => 'required|email',
        'password' => 'required' // Corrected typo here
    ]);
    if ($validator->passes()) {
        
        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->password =Hash::make($request->password);
        $user->save();

        session()->flash('success','Registration Successful.');

        return redirect()->route('account.login');

        return response()->json([
            'status' => true,
        ]);
    } 
    else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
   }
}

public function authenticate(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required' // Corrected typo here
    ]);

    if ($validator->passes()) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            /* $admin = Auth::guard('admin')->user();
            if ($admin->role == 2) {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'You are not Authorized');
            } */
        } else {
           // session()->flash('error','Either email/password is incorrct. ');
            return redirect()->route('account.login') ->withInput($request->only('email'))
            ->with('error','Either email/password is incorrct. ');
        }
    } else {
        return redirect()->route('account.login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
    }
}
public function profile()
{
   
}
public function logout()
{
    Auth::logout();
    return redirect()->route('front.diet')
    ->with('success','Logged Out Successfully');
}

}
