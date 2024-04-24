<x-frontend-layout>

    <!-- ==========Banner-Section========== -->
    <section class="details-banner hero-area bg_img seat-plan-banner" data-background="./frontend/assets/images/banner/banner04.jpg">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-content style-two">
                    <h3 class="title">{{ $movie->name }}</h3>
                    <div class="tags">
                        <a href="#0">{{ $cinemaBuilding }}</a>
                        <a href="#0">English - 2D</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Page-Title========== -->
    <section class="page-title bg-one">
        <div class="container">
            <div class="page-title-area">
                <div class="item md-order-1">
                    <a href="{{ route('index.seatplan',$movie->id) }}" class="custom-button back-button">
                        <i class="flaticon-double-right-arrows-angles"></i>back
                    </a>
                </div>
                <div class="item date-item">
                    <span class="date">{{ $showtime->start_time }}</span>
                </div>
                {{-- <div class="item">
                    <h5 class="title">05:00</h5>
                    <p>Mins Left</p>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- ==========Page-Title========== -->

    <!-- ==========Movie-Section========== -->
    <div class="movie-facility padding-bottom padding-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    {{-- <div class="checkout-widget d-flex flex-wrap align-items-center justify-cotent-between">
                        <div class="title-area">
                            <h5 class="title">Already a Boleto Member?</h5>
                            <p>Sign in to earn points and make booking easier!</p>
                        </div>
                        <a href="#0" class="sign-in-area">
                            <i class="fas fa-user"></i><span>Sign in</span>
                        </a>
                    </div> --}}
                    <div class="checkout-widget checkout-contact">
                        <h5 class="title">Check your Contact Details </h5>

                        <form class="checkout-contact-form" >
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Full Name" value="{{ Auth::user()->name ?? '' }}" readonly>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter your Mail" value="{{ Auth::user()->email ?? '' }}" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone_no" placeholder="Enter your Phone Number " value="{{ Auth::user()->phone_no ?? '' }}" readonly>
                            </div>
                            {{-- <div class="form-group">
                                <input type="submit" value="Continue" class="custom-button">
                            </div> --}}
                        </form>
                    </div>

                     <div class="checkout-widget checkout-contact">
                        <h5 class="title">Promo Code </h5>
                        <form class="checkout-contact-form">
                            <div class="form-group">
                                <input type="text" placeholder="Please enter promo code">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Verify" class="custom-button">
                            </div>
                        </form>
                    </div>
                    {{-- <div class="checkout-widget checkout-card mb-0">
                        <h5 class="title">Payment Option </h5>
                        <ul class="payment-option">
                            <li class="active">
                                <a href="#0">
                                    <img src="{{asset ('frontend/assets/images/payment/card.png') }}" alt="payment">
                                    <span>Credit Card</span>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <img src="{{ asset('frontend/assets/images/payment/card.png') }}" alt="payment">
                                    <span>Debit Card</span>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <img src="{{asset ('frontend/assets/images/payment/paypal.png') }}" alt="payment">
                                    <span>paypal</span>
                                </a>
                            </li>
                        </ul>
                        <h6 class="subtitle">Enter Your Card Details </h6>
                        <form class="payment-card-form">
                            <div class="form-group w-100">
                                <label for="card1">Card Details</label>
                                <input type="text" id="card1">
                                <div class="right-icon">
                                    <i class="flaticon-lock"></i>
                                </div>
                            </div>
                            <div class="form-group w-100">
                                <label for="card2"> Name on the Card</label>
                                <input type="text" id="card2">
                            </div>
                            <div class="form-group">
                                <label for="card3">Expiration</label>
                                <input type="text" id="card3" placeholder="MM/YY">
                            </div>
                            <div class="form-group">
                                <label for="card4">CVV</label>
                                <input type="text" id="card4" placeholder="CVV">
                            </div>
                            <div class="form-group check-group">
                                <input id="card5" type="checkbox" checked>
                                <label for="card5">
                                    <span class="title">QuickPay</span>
                                    <span class="info">Save this card information to my Boleto  account and make faster payments.</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="custom-button" value="make payment">
                            </div>
                        </form>
                        <p class="notice">
                            By Clicking "Make Payment" you agree to the <a href="#0">terms and conditions</a>
                        </p>
                    </div> --}}
                </div>
                <div class="col-lg-4">
                    <div class="booking-summery bg-one">
                        <h4 class="title">booking summery</h4>
                        <ul>
                            <li>
                                <h6 class="subtitle">{{ $movie->name }}</h6>
                                <input type="hidden" id="movie_id" value="{{ $movie->id }}">
                                <span class="info">English-2d</span>
                            </li>
                            <li>
                                <h6 class="subtitle"><span>Building</span><span>{{ $cinemaBuilding }}</span></h6>
                                <div class="info">
                                    <span>{{ $showtime->start_time }}</span>
                                    <input type="hidden" id="showtime_id" value="{{ $showtime->id }}">
                                    @foreach ( $selectedSeats as $seat)
                                    <span class="seat">{{$seat}}</span>
                                    @endforeach
                                </div>
                            </li>

                            <li>
                                <h6 class="subtitle mb-0"><span>Tickets  Price</span><span>${{ $totalprice }}</span></h6>
                            </li>

                        </ul>
                         <ul class="side-shape">
                            <li>
                                <h6 class="subtitle"><span>combos</span><span>$57</span></h6>
                                <span class="info"><span>2 Nachos Combo</span></span>
                            </li>
                            <li>
                                <h6 class="subtitle"><span>food & bevarage</span></h6>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <span class="info"><span>price</span><span>${{ $totalprice }}</span></span>
                                <span class="info"><span>vat</span><span>$15</span></span>
                            </li>
                        </ul>
                    </div>
                    <div class="proceed-area  text-center">
                        <h6 class="subtitle"><span>Amount Payable</span><span id="totalprice">${{ $totalprice+15 }}</span></h6>
                        <button id="proceed-button" class="custom-button">Proceed</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- ==========Movie-Section========== -->
    <script>
        $(document).ready(function() {
            // Function to handle "proceed" button click
            $("#proceed-button").click(function() {
                console.log("button clicked");
                var seat = $(".seat").text().trim(); // Get the chosen seat numbers
                var showtimeId = $("#showtime_id").val(); // Retrieve the showtime_id value

                var totalprice = $("#totalprice").text().trim(); // Get total price
                // var name = $("input[name='name']").val(); // Get user's name
                // var email = $("input[name='email']").val(); // Get user's email
                // var phoneNo = $("input[name='phone_no']").val(); // Get user's phone number

                console.log('Seat:', seat);
                console.log('Showtime:' ,showtimeId);

                console.log('Totalprice:',totalprice);
                // console.log('Name',name);
                // console.log('email:',email);
                // console.log('phone:',phoneNo);
                // Send an AJAX request to the server
                $.ajax({
    type: "POST",
    url: "{{ route('booked.seats') }}", // Corrected route name
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                    data: {
                        showtime_id: showtimeId,
                        seats: seat,
                        totalprice: totalprice,

                    },
                    success: function(response) {
                        console.log("Server response:", response); // Log server response for debugging

                        // Check the response from the server
                        if (response.success) {
                            // If booking is successful, redirect or show a success message
                            window.location.href = "/";
                        } else {
                            // If booking fails, show an error message
                            alert("Booking failed. Please try again.");
                        }
                    },
                    // error: function(xhr, status, error) {
                    //     console.error(xhr.responseText); // Log error response for debugging
                    //     alert("An error occurred. Please try again later.");
                    // }
                });
            });
        });
    </script>


</x-frontend-layout>
