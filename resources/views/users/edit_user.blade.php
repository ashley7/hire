@extends('layouts.app')
@section('content') 
 
<hr style="background-color: #12cd22; height:1px"> 


<div class="card-box">
    <form action="{{ route('users.update',$user->id) }}" method="post">
        @method('PATCH')

        @csrf
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}">

        <label for="phone_number">Phone Number</label>
        <input type="number" class="form-control" name="phone_number" value="{{ $user->phone_number }}">

        <hr>
        <button type="submit" class="btn btn-success">Save changes</button>
    </form>

</div>

@endsection
