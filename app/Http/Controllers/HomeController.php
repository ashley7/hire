<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\HireDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->user_type == "customer") return redirect('/');

        $hires = Hire::where('status','confirmed')->get();

        $customers = User::whereIn('id',$hires->pluck('user_id')->toArray())->count();

        $unreturned_products = HireDetail::unreturned();

        $data = [
            'title'=>'Dashboard',
            'hires'=>$hires,
            'customers'=>$customers,
            'unreturned_products'=>$unreturned_products,
            'total_amount'=>0,
        ];

        return view('home')->with($data);
    }
}
