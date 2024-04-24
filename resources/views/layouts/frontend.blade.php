<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/main.css') }}">

    <link rel="shortcut icon" href="{{ asset('/frontend/assets/images/favicon.png') }}" type="{{asset ('/frontend/assets/image/x-icon') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>NashVista - Online Ticket Booking Website HTML Template</title>


</head>

<body>
    <!-- ==========Preloader========== -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->
    <!-- ==========Overlay========== -->
    <div class="overlay"></div>
    <a href="#0" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="/">
                        <img src="./frontend/assets/images/ticket/ticket-tab01.png" alt="ticket">
                        <h5>NashVista</h5>
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                        {{-- <ul class="submenu">
                            <li>
                                <a href="index.html">Home One</a>
                            </li>
                            <li>
                                <a href="index-2.html">Home Two</a>
                            </li>
                        </ul> --}}
                    </li>
                    <li>
                        <a href="{{ url('/booking_list') }}">Your Booking</a>
                    </li>

                    {{-- <li>
                        <a href="#0" class="active">movies</a>
                        <ul class="submenu">
                            <li>
                                <a href="movie-grid.html">Movie Grid</a>
                            </li>
                            <li>
                                <a href="movie-list.html">Movie List</a>
                            </li>
                            <li>
                                <a href="movie-details.html">Movie Details</a>
                            </li>
                            <li>
                                <a href="movie-details-2.html">Movie Details 2</a>
                            </li>
                            <li>
                                <a href="movie-ticket-plan.html">Movie Ticket Plan</a>
                            </li>
                            <li>
                                <a href="movie-seat-plan.html">Movie Seat Plan</a>
                            </li>
                            <li>
                                <a href="#0" class="active">Movie Checkout</a>
                            </li>
                            <li>
                                <a href="popcorn.html">Movie Food</a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <li>
                        <a href="#0">events</a>
                        <ul class="submenu">
                            <li>
                                <a href="events.html">Events</a>
                            </li>
                            <li>
                                <a href="event-details.html">Event Details</a>
                            </li>
                            <li>
                                <a href="event-speaker.html">Event Speaker</a>
                            </li>
                            <li>
                                <a href="event-ticket.html">Event Ticket</a>
                            </li>
                            <li>
                                <a href="event-checkout.html">Event Checkout</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#0">sports</a>
                        <ul class="submenu">
                            <li>
                                <a href="sports.html">Sports</a>
                            </li>
                            <li>
                                <a href="sport-details.html">Sport Details</a>
                            </li>
                            <li>
                                <a href="sports-ticket.html">Sport Ticket</a>
                            </li>
                            <li>
                                <a href="sports-checkout.html">Sport Checkout</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#0">pages</a>
                        <ul class="submenu">
                            <li>
                                <a href="about.html">About Us</a>
                            </li>
                            <li>
                                <a href="apps-download.html">Apps Download</a>
                            </li>
                            <li>
                                <a href="sign-in.html">Sign In</a>
                            </li>
                            <li>
                                <a href="sign-up.html">Sign Up</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#0">blog</a>
                        <ul class="submenu">
                            <li>
                                <a href="blog.html">Blog</a>
                            </li>
                            <li>
                                <a href="blog-details.html">Blog Single</a>
                            </li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="{{ route('contact.us') }}">contact</a>
                    </li>


                    @if (!auth()->check())
                    <li><a href="{{ route('login') }}">login</a></li>
                    <li><a href="{{ route('register') }}"> Register</a></li>

                    @else
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" style="color: black">Logout</button>
                    </form>

                @endif
                    {{-- <li class="header-button pr-0">
                        <a href="sign-up.html">join us</a>
                    </li> --}}
                </ul>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    <!-- ==========Header-Section========== -->

{{ $slot }}

        <!-- ==========Newslater-Section========== -->
        <footer class="footer-section">
            <div class="newslater-section padding-bottom">
                <div class="container">
                    <div class="newslater-container bg_img" data-background="./frontend/assets/images/newslater/newslater-bg01.jpg">
                        <div class="newslater-wrapper">
                            <h5 class="cate">subscribe to Boleto </h5>
                            <h3 class="title">to get exclusive benifits</h3>
                            <form class="newslater-form">
                                <input type="text" placeholder="Your Email Address">
                                <button type="submit">subscribe</button>
                            </form>
                            <p>We respect your privacy, so we never share your info</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-top">
                    <div class="logo">
                        <a href="index-1.html">
                            <img src="./frontend/assets/images/footer/footer-logo.png" alt="footer">
                        </a>
                    </div>
                    <ul class="social-icons">
                        <li>
                            <a href="#0">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="active">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i class="fab fa-google"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer-bottom">
                    <div class="footer-bottom-area">
                        <div class="left">
                            <p>Copyright © 2020.All Rights Reserved By <a href="#0">Boleto </a></p>
                        </div>
                        <ul class="links">
                            <li>
                                <a href="#0">About</a>
                            </li>
                            <li>
                                <a href="#0">Terms Of Use</a>
                            </li>
                            <li>
                                <a href="#0">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#0">FAQ</a>
                            </li>
                            <li>
                                <a href="#0">Feedback</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ==========Newslater-Section========== -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.show_confirm').click(function(event) {
                    var form = $(this).closest("form");
                    event.preventDefault();

                    swal({
                        title: `Are you sure you want to delete this record?`,
                        text: "If you delete this, it will be gone forever.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            // Submit the form using AJAX
                            $.ajax({
                                type: 'POST',
                                url: form.attr('action'),
                                data: form.serialize(),
                                success: function(response) {
                                    // Handle success response if needed
                                    // Reload the page or update the UI
                                    location.reload();
                                },
                                error: function(error) {
                                    // Handle error if needed
                                }
                            });
                        }
                    });
                });
            });
        </script>



        <script src="{{ asset('/frontend/assets/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/modernizr-3.6.0.min.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/magnific-popup.min.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/countdown.min.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/odometer.min.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/viewport.jquery.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/nice-select.js') }}"></script>
        <script src="{{ asset('/frontend/assets/js/main.js') }}"></script>

    </body>

    </html>
