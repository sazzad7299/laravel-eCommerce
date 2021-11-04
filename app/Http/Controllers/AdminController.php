<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\User;

use App\Admin;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
     public function login(Request $request)
    {
    	if ($request->isMethod('post')) {
    		$data = $request->input();
             $adminCount = Admin::where(['username'=>$data['username'],'password'=>md5($data['password']),'status'=>'1'])->count();
    		if ($adminCount > 0) {
                Session::put('adminSession',$data['username']);
    			return redirect('/admin/dashboard');
    		} else {
    			return redirect('/admin')->with('flash_massage_error', 'Invaild Username or Password');
    		}
    	}
    	return view('admin.admin_login');
    }

    public function dashboard()
    {
        // if (Session::has('adminSession')) {
        //     //perform all task for admin
        // }else{
        //     return redirect('/admin')->with('flash_massage_error', 'LogIn To Access');
        // }
        return view('admin.dashboard');
    }


    public function settings(){
        $adminDetails = Admin::where(['username'=>Session::get('adminSession')])->first();
        $adminDetails =json_decode(json_encode($adminDetails));
        // echo "<pre/>"; print_r($adminDetails);die;
        return view('admin.settings')->with(compact('adminDetails'));
    }
    public function chkPassword(Request $request){
        $data = $request->all();
        
        $adminCount = Admin::where(['username'=>Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
        if($adminCount == 1){
            echo "true"; die;
        } else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data =$request->all();
            //echo "<pre>"; print_r($data); die;

           
            $adminCount = Admin::where(['username'=>Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
        if($adminCount == 1){
            $password = md5($data['new_pwd']);
            Admin::where('username',Session::get('adminSession'))->update(['password'=>$password]);
            return redirect('/admin/settings')->with('flash_massage_success','Password Update Successfully!');
        } else{
            return redirect('/admin/settings')->with('flash_massage_error','Current Password is incorrect!');
        }
        }
    }
    public function viewUsers()
    {
        $users =User::get();
        return view('admin.users')->with(compact('users'));
    }
    public function orderInvoice($order_id)
    {
        $orderDetails = Order::with('orders')->where('id',$order_id)->orderBy('id','DESC')->first();
        $orderDetails= json_decode(json_encode($orderDetails));
        // echo "<pre>";print_r($orderDetails);die; 
        $user_id =$orderDetails->user_id;
        // echo "<pre>";print_r($user_id);die;
        $userDetails = User::where('id',$user_id)->first();
        $userDetails= json_decode(json_encode($userDetails));
        // echo "<pre>";print_r($userDetails);die; 
        return view('admin.products.invoice')->with(compact('orderDetails','userDetails'));
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_massage_success', 'Logged out Successfully');
    }
}
