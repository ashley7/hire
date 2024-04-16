<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::paginate(50);

        $categories = Category::get();

        $data = [
            'categories'=>$categories,
            'expenses'=>$expenses,
            'title'=>'Expenditure record'
        ];

        return view('expenses.expenditures')->with($data);
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
            'category_id'=>'required',
            'unit_amount'=>'required|numeric',
            'quantity'=>'required|numeric',
            'date_spend'=>'required',
        ];

        $this->validate($request,$rules);

        $saveExpense = new Expense();

        $saveExpense->category_id = $request->category_id;

        $saveExpense->user_id = Auth::id();

        $saveExpense->particular = $request->particular;

        $saveExpense->unit_amount = $request->unit_amount;

        $saveExpense->quantity = $request->quantity;

        $saveExpense->date_spend = $request->date_spend;

        $saveExpense->save();

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {

        $categories = Category::get();

        $data = [
            'expense'=>$expense,
            'categories'=>$categories,
            'title'=>'Edit expenditure'
        ];

        return view('expenses.edit_expenditures')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {

        $expense->category_id = $request->category_id;

        $expense->user_id = Auth::id();

        $expense->particular = $request->particular;

        $expense->unit_amount = $request->unit_amount;

        $expense->quantity = $request->quantity;

        $expense->date_spend = $request->date_spend;

        $expense->save();

        return redirect()->route('expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
