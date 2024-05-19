<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Mail\ResetPasswordEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Str; 

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
            
            $user = Auth::user();
            if ($user->role == 1) {
                // If the user is an admin
                return redirect()->route('front.diet');// Adjust this route as needed
            }
            else {
                // If the user is not an admin, show unauthorized message
                Auth::logout();
                return redirect()->route('account.login')
                    ->with('error', 'You are not authorized to access this page.');
            }

        

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
    if(Auth::check()) {
        Auth::logout();
        return redirect()->route('front.diet')->with('success','Logged Out Successfully');
    } else {
        return redirect()->route('front.login')->with('error', 'You are not logged in.');
    }
}

public function forgetPassword()
{
    return view('Frontend.account.forget-password');
}
public function processforgetPassword(Request $request)
{
   $validator = Validator::make($request->all(),[
        'email' => 'required|email|exists:users,email'
    ],
    [
        'email.exists' => 'The provided email does not exist.',
    ] );

    if($validator->fails())
    {
        return redirect()->route('front.forget')->withErrors($validator)->withInput();
    }

$token =Str:: random(60);
\DB::table('password_reset_tokens')->where('email',$request->email)->delete();

\DB::table('password_reset_tokens')->insert([
    'email'=>$request->email,
    'token'=>$token,
    'created_at'=>now()
]);

$user =User::Where('email',$request->email)->first();
$formData =[
    'token'=>$token,
    'user'=>$user,
    'mailsubject'=>'Reset Password'
];

try {
    // Send the reset password email
    Mail::to($request->email)->send(new ResetPasswordEmail($formData));

    // Redirect with success message
    return redirect()->route('front.forget')->with('success', 'Please check your email for the password reset link.');
} catch (\Exception $e) {
    // Handle any exceptions (e.g., connection errors)
    return redirect()->route('front.forget')->with('error', 'An error occurred while sending the email. Please try again later.');
}


}

public function resetPassword($token)
{
 $tokenExist = \DB::table('password_reset_tokens')->where('token',$token)->first();
 if($tokenExist == null)
 {
    return redirect()->route('front.forget')->with('error','Invalid request');
 }   
    return view('Frontend.account.reset-password',[
        'token' =>$token
    ]);
}

public function processResetPassword(Request $request)
{
    $token= $request->token;
    $tokenobj = \DB::table('password_reset_tokens')->where('token',$token)->first();
 if($tokenobj == null)
 {
    return redirect()->route('front.forget')->with('error','Invalid request');
 } 
$user=User::where('email',$tokenobj->email)->first();

$validator = Validator::make($request->all(),[
    'new_password' => 'required|min:3',
    'confirm_password' => 'required|same:new_password'
]);

if($validator->fails())
{
    return redirect()->route('front.resetPassword',$token)->withErrors($validator);
}

User::where('id',$user->id)->update([
    'password'=>Hash::make($request->new_password)
]);

\DB::table('password_reset_tokens')->where('email',$user->email)->delete();
return redirect()->route('account.login')->with('success','Password updated successfully');

}
}


