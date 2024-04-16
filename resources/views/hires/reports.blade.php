@extends('layouts.app')
@section('content') 
   
    <div class="card">
        <div class="card-body">
            <form action="{{ url('generate_reports') }}" method="post" class="col-md-6">
                @csrf        
                <label for="name">Report Type</label>
                <select name="report_type" class="form-control">
                    <option value=""></option>
                    @foreach($report_types as $report_type)
                        <option value="{{$report_type}}">{{ $report_type }}</option>
                    @endforeach
                </select>                   
                    
                <div class="form-group">
                    <label for="from">From</label>
                    <input type="date" class="form-control" name="from">
                </div>

                <label for="to">To</label>
                <input type="date" class="form-control" name="to">                           

                <hr>
                <button type="submit" class="btn btn-success">Generate</button>
            </form>                    
        </div>
    </div>
         
@endsection
