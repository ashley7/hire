@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                         <p>This is not supported</p>

                         <a href="{{url('login')}}">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
