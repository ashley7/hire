<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use App\Models\Hire;
use App\Models\HireDetail;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{


    function generate_reports() {

        $report_types = [
            'Expenses','Customers','Income'
        ];

        $dates_eliminated = [];

        $data = [
            'title'=>'Generate Reports',
            'report_types'=>$report_types,
            'dates_eliminated'=>$dates_eliminated,
        ];

        return view('hires.reports')->with($data);        
    }

    function generateReport(Request $request) {

        $rules = [
            'report_type'=>'required',
            'from'=>'required',
            'to'=>'required'
        ];

        $this->validate($request,$rules);

        switch ($request->report_type) {

            case 'Expenses':

                $expenses = Expense::whereBetween('date_spend',[$request->from,$request->to])->paginate(500);

                $categories = Category::get();
        
                $data = [
                    'categories'=>$categories,
                    'expenses'=>$expenses,
                    'title'=>'Expenditure record from '.$request->from." to ".$request->to,
                ];
        
                return view('expenses.expenditures')->with($data);
                
                break;

            case 'Customers':
                $users = User::where('user_type','customer')->whereBetween('created_at',[$request->from,$request->to])->get();

                $data = [
                    'users'=>$users,
                    'title'=>'List of customers onboarded from '.$request->from." to ".$request->to,
                ];
        
                return view('users.customers')->with($data);
                break;

            case 'Income':

                $hires = Hire::where('status','confirmed')->whereBetween('created_at',[$request->from,$request->to])->pluck('id')->toArray();

                $details = HireDetail::whereIn('hire_id',$hires)->get();

                $data = [
                    'details'=>$details,
                    'title'=>'Hires made from '.$request->from." to ".$request->to,
                ];
        
                return view('hires.hire_details')->with($data);
                 
                break;
            
            default:
                # code...
                break;
        }


        
    }
    
}
