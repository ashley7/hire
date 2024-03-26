<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Hire;
use App\Models\HireDetail;
use App\Models\HireHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'from'=>'required',
            'to'=>'required',
            'quantity'=>'required|numeric'
        ];

        $this->validate($request,$rules);

        $saveCart = new Cart();

        $saveCart->user_id = Auth::id();

        $saveCart->product_id = $request->product_id;

        $saveCart->from = $request->from;

        $saveCart->to = $request->to;

        $saveCart->quantity = $request->quantity;

        $saveCart->save();


        return redirect()->route('carts.show',$saveCart->user_id);
    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
    {
        $carts = Cart::where('user_id',$user_id)->get();

        $data = [
            'carts'=>$carts,
            'title'=>'Your Cart',
            'dates_eliminated'=>[]
        ];

        return view('market.cart_details')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        $carts = Cart::where('user_id',$user_id)->get();

        $saveHire = new Hire();

        $saveHire->user_id = Auth::id();

        $saveHire->date_placed = now();

        $saveHire->save();

        foreach ($carts as $cart) {

            HireDetail::saveDetails($saveHire->id,$cart->product_id,$cart->from,$cart->to,$cart->quantity,NULL, $cart->product->price);

        }       

        Cart::where('user_id',$user_id)->delete();

        $message = "Hello Admin, Hire order No.: ".$saveHire->id." for " .env('APP_NAME'). ", from ".$saveHire->user->name." has been place, please follow it up.";

        HireHelper::sendSMS(env("ADMIN_PHONE"),$message);

        return back()->with(['status'=>'Your Order has been placed']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        Cart::destroy($cart->id);

        return back();
    }
}
