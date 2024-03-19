@extends('layouts.app')
@section('content') 

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_record">
    Add New Expenditure Record
</button>

<hr style="background-color: #12cd22; height:1px"> 

<div class="card-box">
    <div class="table-responsive">
        <table class="table" id="table_unsorted">
            <thead>
                <th>Date</th> <th>Particular</th> <th>Category</th> <th>Unit</th> <th>Quantity</th> <th>Amount</th> <th>Action</th>
            </thead>

            <tbody>
                @foreach($expenses as $expense)
                <tr>
                  <td>{{ $expense->date_spend }}</td>
                  <td>{{ $expense->particular }}</td>
                  <td>{{ $expense->category->name }}</td>
                  <td>{{ number_format($expense->unit_amount) }}</td>
                  <td>{{ $expense->quantity }}</td> 
                  <td>{{ number_format($expense->quantity * $expense->unit_amount) }}</td>
                  <td><a href="{{ route('expenses.edit',$expense->id) }}">Edit</a></td>         
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $expenses->links() }}
    </div>
</div>

<div class="modal fade" id="add_record" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new expenditure</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            <form action="{{ route('expenses.store') }}" method="post">
                @csrf

                <label for="date_spend">Date spent</label>
                <input type="date" class="form-control" name="date_spend">

                <label for="category_id">Select category</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value=""></option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                
                <label for="particular">Particular</label>
                <input type="text" class="form-control" name="particular">
 
                <label for="unit_amount">Unit amount</label>
                <input type="number" class="form-control" name="unit_amount">

                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity">

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
    $("#category_id").chosen({
        width:"100%"
    })
</script>

@endpush