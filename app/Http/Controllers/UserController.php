<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('user_type','customer')->get();

        $data = [
            'users'=>$users,
            'title'=>'List of customers'
        ];

        return view('users.customers')->with($data);
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
            'name'=>'required',
            'phone_number'=>'required|unique:users'
        ];

        $this->validate($request,$rules);

        $saveUser = new User();

        $saveUser->name = $request->name;

        $saveUser->phone_number = $request->phone_number;

        if(Auth::user()->user_type == "admin")

            $saveUser->email_verified_at = now();

        $saveUser->password = Hash::make("user123@");

        $saveUser->user_type = "customer";

        $saveUser->save();

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
    {

        $user = User::find($user_id);

        $hires = Hire::where('user_id',$user_id)->paginate('50');

        $users = User::where('user_type','customer')->get();

        $data = [
            'hires'=>$hires,
            'title'=>'Hires for '.$user->name,
            'users'=>$users
        ];

        return view('hires.list')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        $user = User::find($user_id);

        $data = [
            'user'=>$user,
            'title'=>'Edit User'        
        ];

        return view("users.edit_user")->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $saveUser = new User();

        $saveUser->name = $request->name;

        $saveUser->phone_number = $request->phone_number;

        try {
            $saveUser->save();
        } catch (\Throwable $th) {}      

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
