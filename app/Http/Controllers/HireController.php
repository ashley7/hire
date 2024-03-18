<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hires = Hire::paginate('50');

        $users = User::where('user_type','customer')->get();

        $data = [
            'hires'=>$hires,
            'title'=>'Hires',
            'users'=>$users
        ];

        return view('hires.list')->with($data);
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
            'user_id'=>'required'
        ];

        $this->validate($request,$rules);

        $saveHire = new Hire();

        $saveHire->user_id = $request->user_id;

        $saveHire->date_placed = $request->date_placed;

        $saveHire->save();

        return redirect()->route('hires.show',$saveHire->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hire $hire)
    {

        $payment_methods = ['cash','mobile_money','bank','digital'];

        $payments = Hire::sumPaid($hire->id);

        $data = [
            'hire'=>$hire,
            'title'=>'Hire No. '.$hire->id,
            'payment_methods'=>$payment_methods,
            'payments'=>$payments,
        ];

        return view('hires.details')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hire $hire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hire $hire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hire $hire)
    {
        //
    }


    public function add_items($hire_id) {

        $hire = Hire::find($hire_id);

        $dates_eliminated =  Hire::hiredDates($hire->user_id);

        $products = Product::get();       

        $data = [
            'dates_eliminated'=>$dates_eliminated,
            'products'=>$products,
            'title'=>'Add Items to hire No. '.$hire->id." for ".$hire->user->name,
            'hire'=>$hire,
        ];

        return view('hires.add_items')->with($data);
        
    }
}
