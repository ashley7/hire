@extends('layouts.items')
@section('content') 
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <h3>{{$title}}</h3>
                <div class="card">
                     <div class="card-body">

                            <form action="{{ route('hire_details.store') }}" method="post">
                                @csrf

                                <input type="hidden" value="{{$hire->id}}" name="hire_id">
                
                                <label for="name">Select product</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{ $product->name." = ". number_format($product->price) }}</option>
                                    @endforeach
                                </select>
                                
                                <label for="quantity">How many units?</label>
                                <input type="number" name="quantity" value="1" class="form-control">

                                <div class="form-group">
                                    <label for="from">From</label>
                                    <input type="text" class="form-control datepicker" placeholder="From date" name="from">
                                </div>

                                <label for="to">To</label>
                                <input type="text" class="form-control datepickerone" placeholder="To Date" name="to">

                                <label for="discount">Discount (All amount discounted)</label>
                                <input type="number" name="discount" class="form-control">

                                <hr>
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
