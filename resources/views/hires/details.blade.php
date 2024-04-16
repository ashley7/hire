@extends('layouts.app')
@section('content') 

<a href="{{ url('add_items/'.$hire->id) }}" class="btn btn-success">Add Product</a>

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_hire_payment">
    Add Payment
</button>

<hr style="background-color: #12cd22; height:1px"> 

<div class="card-box">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-lg-4">
            <p>TO.</p>
            <p>{{$hire->user->name}}</p>
            <p>Tel: {{ $hire->user->phone_number }}</p>
            <p>Date: {{ $hire->date_placed }}</p>
            <p>Delivery method: {{ $hire->delivery_method }}</p>
        </div>

        <div class="col-md-4 col-sm-4 col-lg-4">
            <center>
                <p>RECIEPT</p>
                <p class="text-success">No. {{ $hire->id }}</p>                
            </center>
        </div>

        <div class="col-md-4 col-sm-4 col-lg-4">
            <p>Company Information</p>
        </div>
    </div>

    <hr>

    <?php  $total_amount = 0;?>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>Product</th> <th>Quantity</th> <th>Period</th> <th>Unit price</th> <th>Discount</th> <th>Amount</th> <th>Action</th>
            </thead>

            <tbody>
                @foreach($hire->details as $detail)

                <?php 
                    $amount = $detail->cost($detail->id);
                    $total_amount = $total_amount + $amount;                
                ?>

                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->quantity }}</td>
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
                        <td>
                         @if(!$detail->returned($detail->id))
                            <a href="{{ route('hire_details.edit',$detail->id) }}">Edit</a>     
                         @endif                    
                        </td>
                    </tr>
                @endforeach
            </tbody> 
          
        </table>
    </div>

    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8">
            <h4>Payments</h4>
            <table class="table">
                <th>Date</th> <th>Particular</th> <th>Amount</th>

                @foreach($hire->payments as $payment)
                  <tr>
                    <td>{{ $payment->date_paid }}</td> <td>{!! $payment->mode_of_payment." <br> ".$payment->status !!} <br> ID:{{ $payment->transaction_id }}</td> <td>{{ number_format($payment->amount) }}</td>
                  </tr>
                @endforeach

            </table>

        </div>

        <?php 
        $balance = $total_amount - $payments;        
        ?>

        <div class="col-md-4 col-sm-4 col-lg-4">
            <h4>Summary</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <td>TOTAL</td>  <td>UGX {{ number_format($total_amount) }}</td>
                    </tr>

                    <tr>
                        <td>SUM PAID</td> <td> UGX {{ number_format($payments) }} </td>
                    </tr>

                    <tr>
                        <td>BALANCE</td> <td> UGX {{number_format( $balance )}} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


 



<div class="modal fade" id="add_hire_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Record Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            <form action="{{ route('hire_payments.store') }}" method="post">
                @csrf

                <input type="hidden" value="{{$hire->id}}" name="hire_id"> 
                
                <label for="quantity">Amount paid</label>
                <input type="number" name="amount" value="{{ $balance }}" class="form-control">

                <label for="date_paid">Date Paid</label>
                <input type="date" name="date_paid" value="{{ date('Y-m-d') }}" class="form-control">
 
                <label for="transaction_id">Transaction id</label>
                <input type="text" name="transaction_id" class="form-control">

                <label for="mode_of_payment">Mode of payment</label>
                <select name="mode_of_payment" id="mode_of_payment" class="form-control">
                    @foreach($payment_methods as $payment_method)
                    <option value="{{ $payment_method }}">{{ $payment_method }}</option>
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

 
 

@push('scripts')
<script>
    $("#product_id").chosen({
        width:"100%"
    })
</script>
 
 
@endpush