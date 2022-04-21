<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mail;





class LoginController extends Controller
{
    // -----------------------------Login--------------------------------------------

    function getLogin(){
        return view('front.login');
    }

    function postLogin(Request $request){
        // dd($request->all());
        $this->validate($request,
            [
                'email' => 'required|email|min:3|max:100',
                'password' => 'required|min:3|max:100',
            ],
            [
                'email.required' => 'You have not entered data',
                'email.email' => 'You have not entered data Email',      
                'email.min' =>'Min: 3',
                'email.max' =>'Max: 100',
                'password.required' => 'You have not entered data',
                'password.min' =>'Min: 3',
                'password.max' =>'Max: 100',
            ]);
        if (Auth::attempt(
            [
                'email'=>$request->email,
                'password'=>$request->password,
            ]))
        {
            return redirect('/');
        }
        else {
            return redirect('login')->with('error', 'Login Error');
        }

        // return view('front.login');
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }

    // -----------------------------Register--------------------------------------------


    function getRegister(){
        return view('front.register');
    }

    function postRegister(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
                'email' => 'required|email|unique:users,email|min:3|max:100',
                'password' => 'required|min:3|max:100',
                'passwordRe' => 'required|same:password|min:3|max:100',
            ],
            [   
                'name.required' => 'You have not entered data',
                'name.min' =>'Min: 3',
                'name.max' =>'Max: 100',
                'email.required' => 'You have not entered data',
                'email.email' => 'You have not entered data Email',      
                'email.unique' => 'User Email is have',
                'email.min' =>'Min: 3',
                'email.max' =>'Max: 100',
                'password.required' => 'You have not entered data',
                'password.min' =>'Min: 3',
                'password.max' =>'Max: 100',
                'passwordRe.required' => 'You have not entered data',
                'passwordRe.same' => 'You have not entered data password 1',
                'passwordRe.min' =>'Min: 3',
                'passwordRe.max' =>'Max: 100',
            ]);
        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = 1;

        // if ($request->hasFile('fImages')){
        //     $file = $request->file('fImages');
        //     $duoi = $file->getClientOriginalExtension();
        //     if ($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' &&  $duoi !='PNG'){
        //         return redirect('dashboard/user/add')->with('message', 'Add User Error !');
        //     }
        //     $name = $file->getClientOriginalName();
        //     $hinh = Str::random(4)."_". $name;
        //     echo($hinh);
        //     while (file_exists("front/img/".$hinh)){
        //         $hinh = Str::random(4)."_".$name;
        //     }
        //     $file->move("front/img/product-single",$hinh);
        $user->avatar = 'default-avatar.PNG';
        // }
        // else{
        //     $user->avatar = "";
        // }

        // dd($request->all());
        $user->save();

        return redirect('login')->with('success', 'Add User Success !');
    }



    // -----------------------------User info--------------------------------------------
    function getUser(){
        return view('front.user');
    }

    public function postUser(Request $request){

        $user = Auth::user();
        $this->validate($request,
            [
                'first_name' => 'required|min:2|max:100',
                'last_name' => 'required|min:2|max:100',
                'company_name' => 'required|min:2|max:100',
                'country' => 'required|min:2|max:100',
                'street_address' => 'required|min:2|max:100',
                'postcode_zip' => 'required|min:2|max:100',
                'town_city' => 'required|min:2|max:100',
                'phone' => 'required|min:2|max:100',
            ],
            [
                'first_name.required' => 'You have not entered data',
                'first_name.min' =>'Min: 2',
                'first_name.max' =>'Max: 100',
                'last_name.required' => 'You have not entered data',
                'last_name.min' =>'Min: 2',
                'last_name.max' =>'Max: 100',
                'company_name.required' => 'You have not entered data',
                'company_name.min' =>'Min: 2',
                'company_name.max' =>'Max: 100',
                'country.required' => 'You have not entered data',
                'country.min' =>'Min: 2',
                'country.max' =>'Max: 100',
                'street_address.required' => 'You have not entered data',
                'street_address.min' =>'Min: 2',
                'street_address.max' =>'Max: 100',
                'postcode_zip.required' => 'You have not entered data',
                'postcode_zip.min' =>'Min: 2',
                'postcode_zip.max' =>'Max: 100',
                'town_city.required' => 'You have not entered data',
                'town_city.min' =>'Min: 2',
                'town_city.max' =>'Max: 100',

            ]);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->company_name = $request->company_name;
        $user->country = $request->country;
        $user->street_address = $request->street_address;
        $user->postcode_zip = $request->postcode_zip;
        $user->town_city = $request->town_city;
        $user->phone = $request->phone;

        if ($request->hasFile('fImages')){
            $file = $request->file('fImages');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' &&  $duoi !='PNG'){
                return redirect('user')->with('message', 'Add User Error !');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_". $name;
            echo($hinh);
            while (file_exists("front/img/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("front/img/product-single", $hinh);
            $user->avatar = $hinh;
        }

        // dd($request->all());
        $user->save();

        return redirect('user')->with('message', 'Edit User Success !');

    }




    //------------------------------------Password Edit-----------------------------------------
    function getEditPassword(){
        return view('front.editPassword');
    }

    public function postEditPassword(Request $request){
        // dd($request->all());

        $user = Auth::user();
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->passwordOld,]))
        {
            $this->validate($request,
            [
                'passwordNew' => 'required|min:3|max:100',
                'passwordNewRe' => 'required|same:passwordNew|min:3|max:100',
            ],
            [
                'passwordNew.required' => 'You have not entered data Password',
                'passwordNew.min' =>'Min: 3',
                'passwordNew.max' =>'Max: 100',
                'passwordNewRe.required' => 'You have not entered data PasswordRe',
                'passwordNewRe.same' => 'You have not entered data password 1',
                'passwordNewRe.min' =>'Min: 3',
                'passwordNewRe.max' =>'Max: 100',
            ]);
            $user->password = bcrypt($request->passwordNew);
            $user->save();
            return redirect('user/editPassword')->with('success', 'Change Password Success !');
        }
        else{
            return redirect('user/editPassword')->with('error', 'Password no correct !');
        }
    }



    //------------------------------------Password Forget-----------------------------------------
    function getForgetPassword(){
        return view('front.forgetPassword');
    }
    public function postForgetPassword(Request $request){
        $data = $request->all();

        // dd($data);
        $user = User::where('email', $data['email'])->first();
        
        // dd($users->id);
        if($user){
            $token_random = Str::random();

            $user = User::find($user->id);
            $user->user_token = $token_random;
            $user->save();

            $email_to =  $data['email'];
            // dd ($email_to);
            $link_reset_pass = url('login/editForgetPassword?email='.$email_to.'&token='.$token_random);
            $data = array('name'=>"Forget Password", 'body'=>$link_reset_pass, 'email'=>$data['email']);
            Mail::send('front.emailForgetPassword', compact('data'), function($message) use ($data){
                $message->to($data['email'])->subject('Forget Password');
                $message->from('dunght97nd@gmail.com','Shop4Men');
            });

            return redirect()->back()->with('success','Send to email success, please check your email !');

        }else{
            return redirect()->back()->with('error','Send to email error, your email do not register!');
        }   
        
    }

    //------------------------------------Edit Password Forget-----------------------------------------

    function getEditForgetPassword(){
        $token = $_GET['token'];
        $email = $_GET['email'];
        return view('front.editForgetPassword', compact('token', 'email'));
    }

    public function postEditForgetPassword(Request $request){
        // dd($request->all());
        $data = $request->all();
        $token_random = Str::random();
        $user = User::where('email', $data['email'])->where('user_token', $data['token'])->first();

        $user = User::find($user->id);
        if ($user){
            $this->validate($request,
                [
                    'passwordNew' => 'required|min:3|max:100',
                    'passwordNewRe' => 'required|same:passwordNew|min:3|max:100',
                ],
                [
                    'passwordNew.required' => 'You have not entered data Password',
                    'passwordNew.min' =>'Min: 3',
                    'passwordNew.max' =>'Max: 100',
                    'passwordNewRe.required' => 'You have not entered data PasswordRe !',
                    'passwordNewRe.same' => 'Your PasswordRe does not correct !',
                    'passwordNewRe.min' =>'Min: 3',
                    'passwordNewRe.max' =>'Max: 100',
                ]);
            $user->password = bcrypt($request->passwordNew);
            $user->user_token = $token_random;
            $user->save();
            return redirect('login')->with('success', 'Change Password Success !');
        }
        else{
            return redirect('login/forgetPassword')->with('error', 'Please Enter Email Again !');
        }
    }
}
