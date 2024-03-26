<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Hire construction tools" name="description" />
        <meta content="ashley7520charles@gmail.com" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">
        
        <!-- <link href="/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" /> -->

        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />

        <link href="/css/style.css" rel="stylesheet" type="text/css" />

        <style>
            .content-page{
                padding-top: 2%;
            }

            .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                background-color: #1abc9c;
            }
        </style>
        @yield("styles")

    </head>

    <body>
 
        <div id="wrapper">

        <!-- f67c04 -->
 
            <div class="navbar-custom" style="background-color: #ffffff;">
                <ul class="list-unstyled topnav-menu float-right mb-0">                    
                
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="pro-user-name ml-1 text-dark">
                            @guest
                            @else
                            <i class="fa fa-user"></i>  {{Auth::user()->name}} <i class="fa fa-arrow-down" aria-hidden="true"></i>
                            @endguest
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                         
                            <!-- <a href="{{ route('password.request') }}" class="dropdown-item notify-item">
                                <i class="fa fa-key"></i>
                                <span>Change password</span>
                            </a>-->
                            <!-- <div class="dropdown-divider"></div> -->

                            <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-out"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>

                 <div class="logo-box">
                    <a href="/" class="logo text-center">
                        <span class="logo-lg text-white">
                            <img src="/assets/images/logo.png" alt="" style="border-radius: 5px;" width="50%">
                         </span>
                        <span class="logo-sm text-white">
                             <img src="/assets/images/logo.png" alt="" style="border-radius: 5px;" width="100%">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light text-dark">
                            <i class="fa fa-bars"></i>
                        </button>
                    </li>       
                     
                </ul>
            </div>

            @guest

            @else

            <div class="left-side-menu">
                <div class="slimscroll-menu">
                    <div id="sidebar-menu">                    
                        <ul class="metismenu" id="side-menu">

                            <li>
                                <a href="{{url('home')}}"  class="text-dark">
                                    <i class="fa fa-home text-success"></i>
                                    <span> HOME </span>
                                </a>                                 
                            </li>

                            <li>
                                <a href="{{route('hires.index')}}"  class="text-dark">
                                    <i class="fa fa-cart-plus text-success"></i>
                                    <span> HIRES </span>
                                </a>                                 
                            </li>

                            
                            <li>
                                <a href="{{route('products.index')}}"  class="text-dark">
                                    <i class="fa fa-book text-success"></i>
                                    <span> PRODUCTS </span>
                                </a>                                 
                            </li>

                            <li>
                                <a href="{{route('users.index')}}"  class="text-dark">
                                    <i class="fa fa-users text-success"></i>
                                    <span> CUSTOMERS </span>
                                </a>                                 
                            </li>

                            <li>
                                <a href="{{route('hire_returns.index')}}"  class="text-dark">
                                    <i class="fa fa-book text-success"></i>
                                    <span> RETURNS </span>
                                </a>                                 
                            </li>

                            <li>
                                <a href="{{route('categories.index')}}"  class="text-dark">
                                    <i class="fa fa-book text-success"></i>
                                    <span> EXP CATEGORY </span>
                                </a>                                 
                            </li>

                            <li>
                                <a href="{{route('expenses.index')}}"  class="text-dark">
                                    <i class="fa fa-book text-success"></i>
                                    <span> EXPENSES </span>
                                </a>                                 
                            </li>                            

                        </ul>                 
                    </div>
                    <div class="clearfix"></div>
                </div> 
            </div>

            @endguest
          
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">                       
                   
                        @if (session('status'))              
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('status') }}
                            </div>
                        @endif

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

                        <h2>{{$title}}</h2>

  
                        @yield('content')                
                    </div>
                </div>

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                              &copy; 
                            </div> 
                            <div class="col-md-6 col-sm-12">
                              <span style="float: right;">Developed by <a href="https://schooltool.lesson.co.ug/" target="_blank" class="text-dark">Mpabaisi Technologies</a> </span>
                            </div>                         
                        </div>
                    </div>
                </footer> 
            </div>        
        </div>
        
      
 
        <!-- <div class="rightbar-overlay"></div> -->

        <script src="/assets/js/vendor.min.js"></script>
        <script src="/assets/js/app.min.js"></script> 
        
        <script src="/js/choosen.js"></script>
        <script src="https://cdn.ckeditor.com/4.20.1/basic/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('description');            
                     
        </script>

        @stack('scripts')
        
    </body>
</html>