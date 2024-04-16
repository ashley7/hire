<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <meta content="For the proper record keeping of processes in the Legal Department" name="description" />
        <meta content="ashley7520charles@gmail.com" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">

        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />

        <style>
            body.authentication-bg-pattern {
                background-color: #FFFFFF;
            }
        </style>
    </head>

    <body class="authentication-bg authentication-bg-pattern">
        <div class="row">

            <div class="col-md-3 col-lg-3 col-sm-12">

            </div>
           

            <div class="col-md-6 col-lg-6 col-sm-12">
                <br>

                <div class="text-center w-75 m-auto">
                    <a href="/">
                        <span><img src="/assets/images/logo.png" alt="" width="50%"></span>
                    </a>
                </div>                 

                @if (session('bad'))              
                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('bad') }}
                    </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>                            
                </div>     
                @endif

                <hr style="background-color: #CD9212; height:1px">                        
                @yield("content")
                     
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12">

            </div>         
        </div>      
        
        <hr style="background-color: #CD9212; height:1px"> 

        <footer class="footer footer-alt text-dark">
             <!-- &copy;   -->
        </footer>

        <script src="/assets/js/vendor.min.js"></script>
        <script src="/assets/js/app.min.js"></script>
        
    </body>
</html>