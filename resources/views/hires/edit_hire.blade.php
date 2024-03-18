@extends('layouts.items')
@section('content') 
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <h3>{{$title}}</h3>
                <div class="card">
                     <div class="card-body">

                            <form action="{{ route('hire_details.update',$detail->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <label for="quantity">How many units?</label>
                                <input type="number" name="quantity" value="{{$detail->quantity}}" class="form-control">

                                <label for="from">From</label>
                                <input type="text" name="from" value="{{$detail->from}}" class="form-control datepicker">

                                <label for="to">To</label>
                                <input type="text" name="to" value="{{$detail->to}}" class="form-control datepickerone">

                                <label for="discount">Discount (All amount discounted)</label>
                                <input type="number" name="discount" value="{{$detail->discount}}" class="form-control">
        
                                <hr>
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



 