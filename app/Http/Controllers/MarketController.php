<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MarketController extends Controller
{
    public function landing() {

        $products = Product::get();

        $data = [
            'products'=>$products,
        ];

        return view('welcome')->with($data);
        
    }

    public  function get_user(Request $request){

        $rules = [
            'name'=>'required',
            'phone_number'=>'required',
        ];

        $this->validate($request,$rules);

        $user = User::where('phone_number',$request->phone_number)->get();

        if($user->count() == 1){

            Auth::login($user->last());

            return redirect("/");

        }

        $saveUser = new User();

        $saveUser->name = $request->name;

        $saveUser->phone_number = $request->phone_number;       

        $saveUser->password = Hash::make("!user123@");

        $saveUser->user_type = "customer";

        $saveUser->save();

        Auth::login($saveUser);

        return back();

        
    }

    public  function load_cart($product_id){

        $dates_eliminated =  Hire::hiredDates(Auth::id());

        $product = Product::find($product_id);

        $data = [
            'product'=>$product,
            'title'=>'Add to card',
            'dates_eliminated'=>$dates_eliminated,
        ];

        return view('market.cart')->with($data);
        
    }
}
