@extends('layouts.app')
@section('content') 

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_hire">
    Add New Hire
</button>

<hr style="background-color: #12cd22; height:1px"> 


<div class="card-box">
    <div class="table-responsive">
        <table class="table table-striped table-hover" id="table_unsorted">
            <thead>
               <th>SN.</th>  <th>Date</th> <th>Customer</th> <th>Amount</th> <th>Payment</th> <th>Balance</th> <th>Action</th>
            </thead>

            <tbody>
                @foreach($hires as $hire)
                <?php 
                $bill = $hire->bill($hire->id);

                $paid = $hire->sumPaid($hire->id);

                $balance = $bill-$paid;                
                ?>

                <tr>
                    <td>{{ $hire->id }}</td>
                    <td>{!! $hire->date_placed !!}</td>
                    <td>{{ $hire->user->name."(".$hire->user->phone_number.")" }}</td>
                    <td>{{ number_format($bill) }}</td>
                    <td>{{ number_format($paid) }}</td>
                    <td>{{ number_format($balance) }}</td>
                    <td>
                      <a href="{{ route('hires.show',$hire->id) }}">Details</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="add_hire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new Hire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            <form action="{{ route('hires.store') }}" method="post">
                @csrf

                <label for="date_placed">Date placed</label>
                <input type="date" name="date_placed" class="form-control" value="{{ date('Y-m-d') }}">

                <label for="name">Select Customer</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value=""></option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{ $user->name." ".$user->phone_number }}</option>
                    @endforeach
                </select>               

                <hr>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
       
      </div>
    
    </div>
  </div>
</div>
@endsection
@include("layouts.data_tables")

@push('scripts')
<script>
    $("#user_id").chosen({
        width:"100%"
    })
</script>
@endpush