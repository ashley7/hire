@extends('layouts.app')
@section('content') 

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_return">
    Record a product return
</button>

<hr style="background-color: #12cd22; height:1px"> 


<div class="card-box">
    <div class="table-responsive">
        <table class="table table-striped table-hover" id="table_unsorted">
            <thead>
               <th>Hire No.</th> <th>Product</th>  <th>Date Taken</th> <th>Return Date</th> <th>Customer</th> <th>Description</th>  <th>Action</th>
            </thead>

            <tbody>
                @foreach($returns as $return)                
                <tr>
                    <td> <a href="{{ route('hires.show',$return->detail->hire_id) }}">{{ $return->detail->hire_id }}</a></td>
                    <td>{!! $return->detail->product->name !!}</td>
                    <td>{{ $return->detail->from }}</td>
                    <td>{{ $return->date_returned }}</td>
                    <td>{{ $return->detail->hire->user->name." ".$return->detail->hire->user->phone_number }}</td>
                    <td>{{ $return->description }}</td>                   
                    <td>
                      <form action="{{ route('hire_returns.destroy',$return->id) }}" method="post" onsubmit="return confirm('Delete record?'); return false;">
                        @csrf
                        @method('DELETE')
                        @if(Carbon\Carbon::parse($return->created_at)->isToday())
                        <button class="badge badge-danger p-1" type="submit">Delete</button>
                        @endif
                      </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $returns->links() }}
    </div>
</div>

<div class="modal fade" id="add_return" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new Hire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            <form action="{{ route('hire_returns.store') }}" method="post">
                @csrf               
                <label for="name">Select Hire</label>
                <select name="hire_id" id="hire_id" class="form-control">
                    <option value=""></option>
                    @foreach($hires as $hire)
                        <option value="{{$hire->id}}">{{ "Hire No. ".$hire->id." =>".$hire->user->name." ".$hire->user->phone_number ."-Date: ".$hire->date_placed }}</option>
                    @endforeach
                </select>
                
                <label for="name">Select Hire details</label>
                <select name="hire_detail_id" id="hire_detail_id" class="form-control"></select> 
                
                <label for="date_returned">Date returned</label>
                <input type="date" name="date_returned" class="form-control" value="{{ date('Y-m-d') }}">

                <label for="description">Description</label>
                <input type="text" name="description" class="form-control">

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
    $("#hire_id").chosen({
        width:"100%"
    })
</script>

<script>    
    $('#hire_id').on('change',function(e){

        var hire_id = e.target.value;
 
        $.get('/hire_returns/'+hire_id,function(data){

          $('#hire_detail_id').empty();

          $.each(data,function(index,subObject){

            $('#hire_detail_id').append("<option value="+subObject.id+">"+subObject.name+" Expected date: "+subObject.date+"</option>");

          });

        });

    });
</script>
@endpush