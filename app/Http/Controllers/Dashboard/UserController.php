<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;



class UserController extends Controller
{
    public function getList(){
        $users = User::orderBy('id','DESC')->get();
        // dd($productCategory);
        return view('dashboard.user.list', compact('users'));
    }

    public function getAdd(){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        $users = User::all();

        return view('dashboard.user.add', compact('users'));
    }
    public function postAdd(Request $request){
        // $tenkodau = Str::slug($request->txtName,'-');
        // echo $tenkodau;
        $this->validate($request,
            [
                'txtName' => 'required|min:3|max:100',
                'txtEmail' => 'required|email|unique:users,email|min:3|max:100',
                'txtPassword' => 'required|min:3|max:100',
                'txtPasswordRe' => 'required|same:txtPassword|min:3|max:100',
            ],
            [
                'txtName.required' => 'You have not entered data',
                'txtName.min' =>'Min: 3',
                'txtName.max' =>'Max: 100',
                'txtEmail.required' => 'You have not entered data',
                'txtEmail.email' => 'You have not entered data Email',      
                'txtEmail.unique' => 'User Email is have',
                'txtEmail.min' =>'Min: 3',
                'txtEmail.max' =>'Max: 100',
                'txtPassword.required' => 'You have not entered data',
                'txtPassword.min' =>'Min: 3',
                'txtPassword.max' =>'Max: 100',
                'txtPasswordRe.required' => 'You have not entered data',
                'txtPasswordRe.same' => 'You have not entered data password 1',
                'txtPasswordRe.min' =>'Min: 3',
                'txtPasswordRe.max' =>'Max: 100',
            ]);
        $user = new user;
        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        $user->password = bcrypt($request->txtPassword);
        $user->level = $request->rdoLevel;

        if ($request->hasFile('fImages')){
            $file = $request->file('fImages');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' &&  $duoi !='PNG'){
                return redirect('dashboard/user/add')->with('message', 'Add User Error !');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_". $name;
            echo($hinh);
            while (file_exists("front/img/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("front/img/product-single",$hinh);
            $user->avatar = $hinh;
        }
        else{
            $user->avatar = "";
        }

        // dd($request->all());
        $user->save();

        return redirect('dashboard/user/add')->with('message', 'Add User Success !');

    }

    public function getEdit($id){
        // $productCategory = ProductCategory::all();
        // dd($brand);
        $user = User::find($id);

        // dd($productCategory);
        return view('dashboard.user.edit', compact('user'));
    }

    public function postEdit(Request $request,$id){

        $user = User::find($id);
        $this->validate($request,
            [
                'txtName' => 'required|min:3|max:100',
            ],
            [
                'txtName.required' => 'You have not entered data',
                'txtName.min' =>'Min: 3',
                'txtName.max' =>'Max: 100',
            ]);
        $user->name = $request->txtName;
       
        if ($request->txtPassword != null) {
            $this->validate($request,
            [
                'txtPassword' => 'required|min:3|max:100',
                'txtPasswordRe' => 'required|same:txtPassword|min:3|max:100',
            ],
            [
                'txtPassword.required' => 'You have not entered data Password',
                'txtPassword.min' =>'Min: 3',
                'txtPassword.max' =>'Max: 100',
                'txtPasswordRe.required' => 'You have not entered data PasswordRe',
                'txtPasswordRe.same' => 'You have not entered data password 1',
                'txtPasswordRe.min' =>'Min: 3',
                'txtPasswordRe.max' =>'Max: 100',
            ]);
            $user->password = bcrypt($request->txtPassword);
        }

        $user->level = $request->rdoLevel;
        if ($request->hasFile('fImages')){
            $file = $request->file('fImages');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' &&  $duoi !='PNG'){
                return redirect('dashboard/user/add')->with('message', 'Add User Error !');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_". $name;
            echo($hinh);
            while (file_exists("front/img/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("front/img/product-single",$hinh);
            $user->avatar = $hinh;
        }

        // dd($request->all());
        $user->save();

        return redirect('dashboard/user/edit/'. $id)->with('message', 'Edit User Success !');

    }
    public function getDelete($id){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        $user = User::find($id);
        $user->delete();
        // dd($productCategory);
        return redirect('dashboard/user/list')->with('message', 'Delete User Success !');
    }


    public function getLoginAdmin(){
        return view('dashboard.login');
    }

    public function postLoginAdmin(Request $request){
        $this->validate($request,
            [
                'txtEmail' => 'required|email|min:3|max:100',
                'txtPassword' => 'required|min:3|max:100',
            ],
            [
                'txtEmail.required' => 'You have not entered data',
                'txtEmail.email' => 'You have not entered data Email',      
                'txtEmail.min' =>'Min: 3',
                'txtEmail.max' =>'Max: 100',
                'txtPassword.required' => 'You have not entered data',
                'txtPassword.min' =>'Min: 3',
                'txtPassword.max' =>'Max: 100',
            ]);
        // dd($request->all());
        if (Auth::attempt(
            [
                'email'=>$request->txtEmail,
                'password'=>$request->txtPassword,
            ]))
        {
            return redirect('dashboard/brand/list');
        }
        else {
            return redirect('dashboard/login')->with('message', 'Login Error');
        }
    }

    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('dashboard/login')->with('message', 'You are Logout');
    }
}
