<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Order;
use App\CmsPage;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function loginUser()
    {
        // echo "test"; die;
        $cmsDetails = CmsPage::where('status',1)->get();
        return view('users.login_register')->with(compact('cmsDetails'));
    }
    public function confirmAccount($code)
    {
        $email =base64_decode($code);
        $userCount = User::where('email',$email)->count();
        if($userCount >0){
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status ==1){
                return redirect('login-register')->with('1','Your Email Account already verified. You can Login');
            }else{
                User::where('email',$email)->update(['status'=>1]);
                return redirect('login-register')->with('1','Your Email Account has been verified successfully Activate. You can Login');
            }
        }else{
            abort(404);
        }
    }
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
                $userStatus= User::where('email',$data['email'])->first();
                if($userStatus->status == 0){
                    return redirect()->back()->with('flash_login_massage_error','Please activate your Account before login');
                }
                Session::put('frontSession',$data['email']);

                if(!empty(Session::get('session_id'))){
                $session_id =Session::get('session_id');
                DB::table('cart')->where(['session_id'=>$session_id])->update(['user_email'=>$data['email']]);
                }
                return redirect('/cart');
            }else{
                return redirect()->back()->with('flash_login_massage_error','Invalid email or password');
            }
        }
    }
    public function forgotPassword(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $userCount = User::where('email',$data['email'])->count();
            if($userCount>0){
                $userDetail =  User::where('email',$data['email'])->first();
                $random_password = str_random(8);
                $new_password = bcrypt($random_password);
                User::where('email',$data['email'])->update(['password'=>$new_password]);
                
                $name = $userDetail->name;
                // echo "<pre>";print_r($userDetail->name);die;

                // Send Random password to user by Mail
                $email = $data['email'];
                $messageData=[
                    'name'=>$name,
                    'email'=>$email,
                    'password'=>$random_password
                ];
                Mail::send('emails.forgotPassword',$messageData,function($message) use($email){
                    $message->to($email)->subject('Reset Password --EASY_SHOP');
                });
                return redirect('login-register')->with('flash_massage_success_reset','Password Reset Successfully! Please check your email');
            }else{
                return redirect()->back()->with('flash_login_massage_error','Sorry! Enter Your Correct Email and Try again.');
            }
        }
        $cmsDetails = CmsPage::where('status',1)->get();
        return view('users.forgot_password')->with(compact('cmsDetails'));
    }
    public function register(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            //check if already user exsist or not!!
            $userCount = User::where('email',$data['email'])->count();
            if($userCount>0){
                return redirect()->back()->with('flash_massage_error','Email already exists!');
            }else{
                $user = new User;
                $user->name = $data['name'];
                $user->email =$data['email'];
                $user->password = bcrypt($data['password']);
                $user->save();

                // User Email confirmation Activating
                $email =$data['email'];
                $messageData = ['email'=>$data['email'],'name'=>$data['name'],'code'=>base64_encode($email)];
                Mail::send('emails.activateAccount',$messageData,function($message) use($email){
                    $message->to($email)->subject('Verify Your Email!');
                });
                return redirect()->back()->with('flash_massage_success','Account Has Been Created! Please verify your email to activate account');
                // if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
                //     Session::put('frontSession',$data['email']);
                //     return redirect('/cart');
                // }
            }
        }
        return view('users.login_register');
    }
    public function checkEmail(Request $request)
    {
        $data = $request->all();
        $userCount = User::where('email',$data['email'])->count();
            if($userCount>0){
                echo "false";
            }else{
                echo "true"; die;
            }
    }
    public function existEmail(Request $request)
    {
        $data = $request->all();
        $userCount = User::where('email',$data['email'])->count();
            if($userCount>0){
                echo "true";
            }else{
                echo "false"; die;
            }
    }
    //User details
    public function account(Request $request)
    {
        $user_id =Auth::user()->id;
        $userDetails =User::find($user_id);
        $countries= Country::get();
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre/>"; print_r($data); die;
            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->state = $data['state'];
            $user->city = $data['city'];
            $user->country = $data['country'];
            $user->postcode = $data['postcode'];
            $user->mobile = $data['mobile'];
            $user->save();
            

            return redirect()->back()->with('flash_massage_success','Your account details has been Updated Successfully');
        }

        return view('users.account')->with(compact('countries','userDetails'));
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id',$user_id)->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        } else{
            echo "false"; die;
        }
    }
    public function updatePassword(Request $request)
    {
        if($request->isMethod('post')){
            $data =$request->all();
            $old_password = User::where('id',Auth::User()->id)->first();
            // echo "<pre>";print_r(bcrypt($old_password->password));die;
            $current_password= $data['current_pwd'];
            if(Hash::check($current_password,$old_password->password)){
                $new_pwd = bcrypt($data['new_pwd']);
                User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
                return redirect()->back()->with('Update_massage_success','Password has been updated successfully');
            }else{
                return redirect()->back()->with('Update_massage_error','Incorrect Current password');
            }
        }
    }
    public function orders()
    {
        $user_id = Auth::user()->id;
        $orders = Order::with('orders')->where('user_id',$user_id)->orderBy('id','DESC')->get();
        $orders= json_decode(json_encode($orders));
        
        return view('users.orders')->with(compact('orders'));
    }
    public function orderDetails($order_id)
    {
        $user_id = Auth::user()->id;
        $orders = Order::with('orders')->where('id',$order_id)->orderBy('id','DESC')->get();
        $orders= json_decode(json_encode($orders));
        // echo "<pre>";print_r($orders);die;
        return view('users.order_details')->with(compact('orders'));
    }
 


    //User logout functionality
    public function logout(Request $request)
    {
        Auth::logout();
        Session::forget('frontSession');
        Session::forget('session_id');
        return redirect('/');
    }
}
