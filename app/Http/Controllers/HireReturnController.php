<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\HireDetail;
use App\Models\HireReturn;
use Illuminate\Http\Request;

class HireReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returns = HireReturn::paginate(50);

        $hires = Hire::get();

        $data = [
            'returns'=>$returns,
            'title'=>'Product Returns',
            'hires'=>$hires
        ];

        return view('hires.returns')->with($data);
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
            'hire_detail_id'=>'required',
            'date_returned'=>'required',
        ];

        $this->validate($request,$rules);

        $check = HireReturn::where('hire_detail_id',$request->hire_detail_id)->get();

        if($check->count() == 0)

            $saveHireReturn = new HireReturn();

        else 

            $saveHireReturn = $check->last();

        $saveHireReturn->hire_detail_id = $request->hire_detail_id;

        $saveHireReturn->date_returned = $request->date_returned;

        $saveHireReturn->description = $request->description;

        $saveHireReturn->save();

        return back();




    }

    /**
     * Display the specified resource.
     */
    public function show($hire_id)
    {

        return HireDetail::select('hire_details.id','products.name','hire_details.to as date')
                            ->where('hire_id',$hire_id)
                            ->join('products','hire_details.product_id','products.id')
                            ->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HireReturn $hireReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HireReturn $hireReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HireReturn $hireReturn)
    {
        HireReturn::destroy($hireReturn->id);

        return back();
    }
}
