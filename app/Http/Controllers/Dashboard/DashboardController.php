<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;




class DashboardController extends Controller
{
    public function getIndex(){
        // echo $dt->toDayDateTimeString();  Thu, Oct 18, 2018 9:16 PM

        // echo $dt->toFormattedDateString(); // Oct 18, 2018

        // echo $dt->format('l jS \\of F Y h:i:s A'); // Thursday 18th of October 2018 09:18:57 PM

        // echo $dt->toDateString();               // 2018-10-18
        // echo $dt->toTimeString();               // 21:16:20
        // echo $dt->toDateTimeString();           // 2018-10-18 21:16:16

        $date = Carbon::now()->format('l\\, jS \\of F\\, Y');

        $users = User::all();
        $userAdmin = User::where('level', 0)->get();
        $userStaff = User::where('level', 2)->get();
        $userNormal = User::where('level', 1)->get();

        $products = Product::all();
        $product1 = Product::where('product_category_id', 1)->get();
        $product2 = Product::where('product_category_id', 2)->get();
        $product3 = Product::where('product_category_id', 3)->get();

        $orders = Order::all();
        $order1 = Order::where('status', 1)->get();
        $order2 = Order::where('status', 2)->get();
        $order3 = Order::where('status', 3)->get();

        return view('dashboard.index', compact('date', 'userAdmin', 'userStaff', 'userNormal', 'users','product1','product2','product3','products','order1','order2','order3','orders'));
    }
}
