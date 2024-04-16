<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="ashley7520charles@gmail.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Cost-effective construction equipment rental solutions">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/market/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="/market/css/style.css">
    <link rel="shortcut icon" href="/assets/images/logo.png">

    <style>
        #hero-bg-image:before, #hero-particles-effect:before {
            opacity: 0.5;
            background-color: #28a745;
        }

        .header-shrink .nav-item .nav-link.active, .header-shrink .nav-item .nav-link:hover, .section .section-heading h2 span {
            color: #28a745;
        }

        .header-shrink .nav-item .nav-link:after,.footer, .product-item .top,.product-item .text {
            background: #28a745;
        }

        .section .section-heading h2:after {     
            background: #28a745;
        }   
 
    </style>
</head>
<body data-spy="scroll" data-target="#fixedNavbar">
 
    <div class="page-wrapper" id="wrapper">
 
        <header class="header fixed-top" id="header">
            <div id="nav-menu-wrap">
                <div class="container">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="navbar-brand" title="Home" href="/">
                            <img style="background-color: #FFF; border-radius: 5%; padding: 1%;" src="{{asset('assets/images/logo.png')}}" alt="Logo White" width="25%" class="img-fluid logo-transparent">
                            <img src="{{asset('assets/images/logo.png')}}" alt="Logo White" width="25%" class="img-fluid logo-normal">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fixedNavbar" 
                            aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="togler-icon-inner">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#" data-scroll-nav="1">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#" data-scroll-nav="2">About</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#" data-scroll-nav="4">Products</a>
                                </li>

                                @guest

                                @else

                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ route('carts.show',Auth::id()) }}">Cart</a>
                                </li>

                                @endguest

                                
                                
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <main class="main-area">
            <section class="hero-banner jarallax" id="hero-bg-image" data-jarallax data-speed="0.5s" data-scroll-index="1">
                <img src="{{asset('assets/images/one.jpg')}}" alt="bg image"  class="jarallax-img">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-9 col-md-10 wow fadeInUp">
                            <div class="hero-inner">
                                <h1 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">Cost-effective construction equipment rental solutions</h1>
                                <h2 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                                We strive to contribute to the success of construction projects by offering a wide range of 
                                high-quality equipment, exceptional service, and technical support.</h2>
                                <a href="javascript:void(0)" data-scroll-nav="4" title="Discovery Now" class="white-btn wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">Hire Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg"  id="svg-pattern-4"  viewBox="0 0 1440 320">
                    <path fill="#ffffff" fill-opacity="1" d="M0,256L14.1,256C28.2,256,56,256,85,234.7C112.9,213,141,171,169,160C197.6,149,226,171,254,176C282.4,181,311,171,339,160C367.1,149,395,139,424,138.7C451.8,139,480,149,508,181.3C536.5,213,565,267,593,256C621.2,245,649,171,678,149.3C705.9,128,734,160,762,192C790.6,224,819,256,847,240C875.3,224,904,160,932,165.3C960,171,988,245,1016,261.3C1044.7,277,1073,235,1101,218.7C1129.4,203,1158,213,1186,186.7C1214.1,160,1242,96,1271,96C1298.8,96,1327,160,1355,192C1383.5,224,1412,224,1426,224L1440,224L1440,320L1425.9,320C1411.8,320,1384,320,1355,320C1327.1,320,1299,320,1271,320C1242.4,320,1214,320,1186,320C1157.6,320,1129,320,1101,320C1072.9,320,1045,320,1016,320C988.2,320,960,320,932,320C903.5,320,875,320,847,320C818.8,320,791,320,762,320C734.1,320,706,320,678,320C649.4,320,621,320,593,320C564.7,320,536,320,508,320C480,320,452,320,424,320C395.3,320,367,320,339,320C310.6,320,282,320,254,320C225.9,320,198,320,169,320C141.2,320,113,320,85,320C56.5,320,28,320,14,320L0,320Z"></path>
                </svg>
                
            </section>
            
            <section class="section" id="about" data-scroll-index="2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-inner wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                                <span>About us</span>
                                <h2>Green life holdings ltd is a Ugandan company that rents out construction equipement.</h2>
                                <p>
                                    We are the preferred partner for construction contractors and builders seeking equipment
                                    rental services. We aim to expand our presence, enhance our rental fleet, and uphold our
                                    reputation for excellence in the construction industry.
                                </p>
                                <span>Core values</span>
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <span class="fa fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <h5>Customer Focus.</h5>
                                            <p>Prioritizing customer satisfaction by understanding and meeting equipment rental needs.</p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <span class="fa fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <h5>Reliability</h5>
                                            <p>Consistently delivering on promises and providing dependable equipment rental solutions to support projects</p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <span class="fa fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <h5>Safety</h5>
                                            <p>Prioritizing safety in all operations to ensure the well-being of customers and employees</p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <span class="fa fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <h5>Integrity</h5>
                                            <p>Conducting business with honesty, transparency, and ethical practices in all interactions.</p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <span class="fa fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <h5>Innovation</h5>
                                            <p>Continuously seeking new ways to improve services, enhance rental offerings, and adapt to industry advancements.</p>
                                        </div>
                                    </li>
                                </ul>                                
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.2s">
                            <div class="about-img">
                                <img src="{{asset('assets/images/crane.png')}}" alt="About image" title="About image" class="img-fluid">
                            </div>

                            <div class="about-img">
                                <img src="{{asset('assets/images/vibrator.jpg')}}" alt="About image" title="About image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

       
            <section class="section bg-light-grey pb-minus-76" data-scroll-index="4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2>Our<span> Products </span></h2>
                                <h4>We deal in a variaty of construction instruments for Hire</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                    @foreach($products as $product)


                        <div class="col-lg-4 col-md-6 col-sm-12">

                            <div class="product-item">

                                <div class="top">
                                    <h6 class="text-white">{{$product->name}}</h6>
                                </div>

                                <div class="img">
                                    <img src="{{asset('product_files/'.$product->image($product->id))}}" alt="" style="width: 100%; height: 300px;" >
                                </div>

                                <div class="text text-white">
                                   UGX {{ number_format( $product->price ) }} per day                                 
                                </div>

                                <div class="btn-block">
                                    <a href="{{ url('load_cart/'.$product->id) }}" title="Order Now" class="primary-btn">Hire Now <i class="ml-3 fa fa-shopping-cart"></i></a>
                                </div>

                            </div>

                        </div>

                    @endforeach


                    </div>
                </div>
            </section>


            <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                        <div class="col-md-12 col-lg-12 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">Contact Info</h6>
                                    <div class="footer-contact-info-wrap">
                                        <ul class="footer-contact-info-list">
                                            <li>
                                                <h6>Address:</h6>
                                                <p>
                                                    Nansana Wakiso District
                                                </p>
                                            </li>
                                            <li>
                                                <h6>Phone:</h6>
                                                <div class="text">
                                                    <p>+256 750 402460 | +256 779 140242 | +256 784 414368</p>                                                  
                                                </div>
                                            </li>

                                            <li>
                                                <a href="/login" class="text-white">Admin Login</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
 
                          
                        </div>
                    </div>
                </div>
 
            </footer>
        </main>

        <a href="#" class="scroll-top-btn" data-scroll-goto="1">
            <i class="fa fa-arrow-up"></i>
        </a>
       
    </div>
    
    <div class="modal fade custom-modal" id="formSuccessModal" tabindex="-1" role="dialog" aria-labelledby="formSuccessModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header success">
                    <h5 class="modal-title" id="formSuccessModalLabel">Please Identify yourself</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-popup-inner">
                        <div class="form-icon success">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                <circle class="path circle" fill="none"  stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                <polyline class="path check" fill="none" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                            </svg>
                        </div>
                        <div class="form-body">
                            <form action="{{ url('get_user') }}" method="post">
                                @csrf

                                <label for="name" style="float: left;">Name</label>
                                <input type="text" name="name" required class="form-control">

                                <label for="phone_number" style="float: left;">Phone Number</label>
                                <input type="text" name="phone_number" required class="form-control">

                                <hr>
                                <button type="submit" class="popup-btn success">Okay</button>

                            </form>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
 
      
    <script src="/market/vendor/js/jquery.min.js"></script>
     
    <script src="/market/vendor/js/jarallax.min.js"></script>
    
    <script src="/market/vendor/js/popper.min.js"></script>
    
    <script src="/market/vendor/js/bootstrap.min.js"></script>
    
    <script src="/market/vendor/js/wow.min.js"></script>
     
    <script src="/market/vendor/js/magnific.popup.min.js"></script>
  
    <script src="/market/vendor/js/waypoint.min.js"></script>
   
    <script src="/market/vendor/js/counter.up.min.js"></script>
   
    <script src="/market/vendor/js/owl.carousel.min.js"></script>
    
    <script src="/market/vendor/js/scrollit.min.js"></script>
    
    <script src="/market/js/main.js"></script>

    @if(Auth::guest())
    <script>
        $('#formSuccessModal').modal('show');
    </script>
    @endif
    


</body>
</html>