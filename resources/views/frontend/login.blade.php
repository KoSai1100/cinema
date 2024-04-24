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

    <title>Boleto - Online Ticket Booking Website HTML Template</title>


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
    <!-- ==========Banner-Section========== -->
    <section class="main-page-header speaker-banner bg_img" data-background="{{ asset('frontend/assets/images/banner/banner07.jpg') }}">
      <div class="container">
          {{-- <div class="speaker-banner-content">
              <h2 class="title">contact us</h2>
              <ul class="breadcrumb">
                  <li>
                      <a href="index.html">
                          Home
                      </a>
                  </li>
                  <li>
                      contact us
                  </li>
              </ul>
          </div> --}}
      </div>
  </section>
  <!-- ==========Banner-Section========== -->

    <!-- ==========Login-Section========== -->
    <section class="contact-section padding-top">
        <div class="contact-container">
            <div class="bg-thumb bg_img" data-background="{{ asset('frontend/assets/images/contact/contact.jpg') }}"></div>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-7 col-lg-6 col-xl-5">
                        <form class="contact-form" id="login_form_submit" action="/login" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email <span>*</span></label>
                                <input type="email" placeholder="Enter Your Email" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password <span>*</span></label>
                                <input type="password" placeholder="Enter Your Password" name="password" id="password" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>
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

