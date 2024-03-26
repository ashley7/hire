@extends('layouts.items')
@section('content') 
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <h3>{{$title}}</h3>
                <div class="card">
                     <div class="card-body">

                        <p class="text-success">Disabled dates mean that the instrument is not available on that date</p>

                        <form action="{{ route('carts.store') }}" method="post">
                            @csrf   
                            
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            
                            <label for="quantity">How many units?</label>
                            <input type="number" name="quantity" value="1" class="form-control">

                            <div class="form-group">
                                <label for="from">From</label>
                                <input type="text" class="form-control datepicker" placeholder="From date" name="from">
                            </div>

                            <label for="to">To</label>
                            <input type="text" class="form-control datepickerone" placeholder="To Date" name="to">
                            
                            <hr>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
