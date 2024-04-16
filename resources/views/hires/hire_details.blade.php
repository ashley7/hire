@extends('layouts.app')
@section('content')

<div class="card-box">
    <div class="table-responsive">
        <table class="table"  id="table_unsorted">
            <thead>
                <th>Product</th> <th>Quantity</th> <th>Period</th> <th>Unit price</th> <th>Discount</th> <th>Amount</th>
            </thead>

            <tbody>
                @foreach($details as $detail)
 

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
                        <td>{{ number_format($detail->cost($detail->id)) }}</td>
                         
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@include("layouts.data_tables")
 