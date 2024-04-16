@extends('layouts.app')
@section('content') 

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_customer">
    Add New Customer
</button>

<hr style="background-color: #12cd22; height:1px"> 


<div class="card-box">
    <div class="table-responsive">
        <table class="table" id="table_unsorted">
            <thead>
               <th>Date</th>  <th>Name</th> <th>Phone Number</th> <th>Action</th>
            </thead>

            <tbody>
                @foreach($users as $user)

                <tr>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>
                      <a href="{{ route('users.show',$user->id) }}" class="badge badge-success p-1">Hires</a>
                      <a href="{{ route('users.edit',$user->id) }}" class="badge badge-info p-1">Edit</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
 
                <label for="phone_number">Phone Number</label>
                <input type="number" class="form-control" name="phone_number">

                <hr>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
       
      </div>
    
    </div>
  </div>
</div>



@endsection

@include("layouts.data_tables")