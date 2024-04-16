@extends('layouts.items')
@section('content') 
    <div class="container">

    <div class="row">
        <div class="col-md-8 offset-md-2 mt-5">
            <h3>{{$title}}</h3>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Product</th> <th>Quantity</th> <th>Period</th> <th>Unit price</th> <th>Amount</th> <th>Action</th>
                            </thead>

                            <tbody>
                                @foreach($carts as $cart)
                                
                                <?php
                                    $number_of_days = $cart->number_of_days($cart->id);
                                    $amount = $number_of_days * $cart->quantity * $cart->product->price;
                                ?>
                                    <tr>
                                        <td>{{ $cart->product->name }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>
                                            From: {{ $cart->from }} <br> To: {{$cart->to }} <br> {{ $number_of_days }} days
                                        </td>
                                        <td>{{ number_format($cart->product->price) }}</td>
                                        <td>{{ number_format($amount) }}</td>
                                        <td>
                                            <form action="{{ route('carts.destroy',$cart->id) }}" method="post" onsubmit="return confirm('Delete this item from cart?'); return false;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="badge badge-danger p-2" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> 
                        
                        </table>

                       

                        <form action="{{ route('carts.update',Auth::id()) }}" method="post">
                            @csrf
                            @method('PATCH')

                            @if($carts->count() > 0)
                            
                            <label for="delivery_mode">Deleivery mode</label>
                            <select name="delivery_method" id="delivery_mode" class="form-control">
                                <option value="Pick-up">I will pick it up</option>
                                <option value="Deliver">Please Deliver to me</option>
                            </select>

                            @endif

                            <hr>

                            <a href="/" class="btn btn-success">Add More Items</a>
                            @if($carts->count() > 0)
                                <button type="submit" class="btn btn-success" style="float: right;">Submit Order</button>
                            @endif
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection