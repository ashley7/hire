@extends('layouts.app')
@section('content') 
<div class="card-box">

<form action="{{ route('expenses.update',$expense->id) }}" method="post">
    @csrf
    @method('PATCH')

    <label for="date_spend">Date spent</label>
    <input type="date" class="form-control" value="{{ $expense->date_spend }}" name="date_spend">

    <label for="category_id">Select category</label>
    <select name="category_id" id="category_id" class="form-control">
        <option value=""></option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $category->id == $expense->category_id ? "selected":""  }} >{{ $category->name }}</option>
        @endforeach
    </select>
    
    <label for="particular">Particular</label>
    <input type="text" class="form-control" name="particular" value="{{ $expense->particular }}">

    <label for="unit_amount">Unit amount</label>
    <input type="number" class="form-control" name="unit_amount" value="{{ $expense->unit_amount }}">

    <label for="quantity">Quantity</label>
    <input type="number" class="form-control" name="quantity" value="{{ $expense->quantity }}">

    <hr>
    <button type="submit" class="btn btn-success">Save changes</button>
</form>

</div>
@endsection