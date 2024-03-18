<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\HireDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class HireDetailController extends Controller
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
            'product_id'=>'required',
            'from'=>'required',
            'to'=>'required',
        ];

        $this->validate($request,$rules);

        $product = Product::find($request->product_id);

        $saveDetail = new HireDetail();

        $saveDetail->hire_id = $request->hire_id;

        $saveDetail->product_id = $request->product_id;

        $saveDetail->from = $request->from;

        $saveDetail->to = $request->to;

        $saveDetail->quantity = $request->quantity;

        $saveDetail->discount = $request->discount;

        $saveDetail->unit_price = $product->price;

        $saveDetail->save();

        return redirect()->route('hires.show',$saveDetail->hire_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(HireDetail $hireDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HireDetail $hireDetail)
    {
        $dates_eliminated =  Hire::hiredDates($hireDetail->hire->user_id);

        $data = [
            'detail'=>$hireDetail,
            'dates_eliminated'=>$dates_eliminated,
            'title'=>'Edit record'
        ];

        return view('hires.edit_hire')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $hire_detail_id)
    {

        $saveDetail = HireDetail::find($hire_detail_id);

        $saveDetail->from = $request->from;

        $saveDetail->to = $request->to;

        $saveDetail->quantity = $request->quantity;

        $saveDetail->discount = $request->discount;

        $saveDetail->save();

        return redirect()->route('hires.show',$saveDetail->hire_id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HireDetail $hireDetail)
    {
        //
    }
}
