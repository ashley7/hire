@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12">
 
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded bg-soft-primary">
                        <i class="dripicons-wallet font-24 avatar-title text-primary"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $hires->count() }}</span></h3>
                        <p class="text-muted mb-1 text-truncate">Hired</p>
                    </div>
                </div>
            </div>
        </div>        
            
     </div>

    <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded bg-soft-primary">
                        <i class="dripicons-user font-24 avatar-title text-primary"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $customers }}</span></h3>
                        <p class="text-muted mb-1 text-truncate">Customers</p>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>

<hr>

<h3>Products not returned</h3>
<div class="card-box">
    <div class="table-responsive">
        <table class="table table-striped table-hover" id="table_unsorted">
            <thead>
                <th>Product</th> <th>Quantity</th> <th>Name</th> <th>Phone</th>  <th>Period</th> <th>Unit price</th> <th>Discount</th> <th>Amount</th>
            </thead>

            <tbody>
                @foreach($unreturned_products as $detail)

                <?php 
                    $amount = $detail->cost($detail->id);

                    $total_amount = $total_amount + $amount;                
                ?>
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->hire->user->name }}</td>
                        <td>{{ $detail->hire->user->phone_number}}</td>

                        <td>
                            From: {{ $detail->from }} <br> To: {{$detail->to }} <br> {{ $detail->number_of_days($detail->id) }} days
                            <br>
                            @if($detail->returned($detail->id))
                                <span class="text-success">Returned</span>
                                @else 
                                <span class="text-danger">Not Returned</span>
                                @endif
                        </td>
                        <td>{{ number_format($detail->unit_price) }}</td>
                        <td>{{ number_format($detail->discount) }}</td>
                        <td>{{ number_format($amount) }}</td>                   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@include("layouts.data_tables")