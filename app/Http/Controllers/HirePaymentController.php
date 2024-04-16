<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\HirePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HirePaymentController extends Controller
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
            'amount'=>'required|numeric',
            'date_paid'=>'required',
            'mode_of_payment'=>'required'
        ];

        $this->validate($request,$rules);

        $saveHirePayment = new HirePayment();

        $saveHirePayment->hire_id = $request->hire_id;

        $saveHirePayment->user_id = Auth::id();

        $saveHirePayment->amount = $request->amount;

        $saveHirePayment->date_paid = $request->date_paid;

        $saveHirePayment->mode_of_payment = $request->mode_of_payment;

        $saveHirePayment->status = "successful";

        $saveHirePayment->save();

        if(Hire::balance($saveHirePayment->hire_id) <= 0){

            $hire = Hire::find($saveHirePayment->hire_id);

            $hire->status = "confirmed";

            $hire->save();

        }

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(HirePayment $hirePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HirePayment $hirePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HirePayment $hirePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HirePayment $hirePayment)
    {
        //
    }
}
