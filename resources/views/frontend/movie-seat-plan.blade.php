<x-frontend-layout>
    @if (auth()->id() === null)
    <script>window.location = "{{ route('register') }}";</script>
@else
    <!-- ==========Banner-Section========== -->
    <section class="details-banner hero-area bg_img seat-plan-banner" data-background="{{ asset('movies/'.$movie->image) }}">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-content style-two">
                    <h3 class="title">{{ $movie->name }}</h3>
                    <div class="tags">
                        <a href="#0">{{ $cinema_building_name }}</a>
                        <a href="#0">English - 2D</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Page-Title========== -->
    <section class="page-title bg-one">
        <input type="hidden" id="movie_id" value="{{ $movie->id }}">
        <div class="container">
            <div class="page-title-area">
                <div class="item md-order-1">
                    <a href="{{ route('home') }}" class="custom-button back-button">
                        <i class="flaticon-double-right-arrows-angles"></i>back
                    </a>
                </div>


    <div class="item date-item">
        {{-- <span class="date" format="D,M d Y">{{ $showtime->start_time }}</span> --}}
        <select class="select-bar">
            @foreach ($movie->showtimes as $showtime)
            <option value="sc1" format="H:i">{{ $showtime->start_time }}</option>
            <input type="hidden" id="showtime_id" value="{{ $showtime->id }}">
            @endforeach
        </select>
    </div>


                <div class="item">
                    <h5 class="title">05:00</h5>
                    <p>Mins Left</p>
                </div>
            </div>
        </div>
    </section>




    <!-- ==========Page-Title========== -->

    <!-- ==========Movie-Section========== -->
    <div class="seat-plan-section padding-bottom padding-top">
        <div class="container">
            <div class="screen-area">
                <h4 class="screen">screen</h4>
                <div class="screen-thumb">
                    <img src="{{asset ('frontend/assets/images/movie/screen-thumb.png') }}" alt="movie">
                </div>
                <h5 class="subtitle">silver plus</h5>



                <div class="screen-wrapper">
                    <ul class="seat-area">
                        <li class="seat-line">
                            <span>G</span>
                            <ul class="seat--area">
                                @for ($i = 1; $i <= 14; $i++)
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat" data-price="10">
                                            <img src="{{ asset('frontend/assets/images/movie/seat01.png') }}" alt="seat" data-value="G{{ $i }}">
                                            <span class="sit-num">G{{ $i }}</span>
                                        </li>
                                    </ul>
                                </li>
                            @endfor


                            </ul>
                            <span>G</span>
                        </li>
                        <li class="seat-line">
                            <span>f</span>
                            <ul class="seat--area">
                                @for ($i = 1; $i <= 14; $i++)
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <img src="{{ asset('frontend/assets/images/movie/seat01.png') }}" alt="seat"  data-value="F{{ $i }}">
                                                <span class="sit-num">F{{ $i }}</span>
                                            </li>
                                        </ul>
                                    </li>
                                @endfor
                            </ul>
                            <span>f</span>
                        </li>
                        <!-- Add more seat lines as needed -->
                    </ul>
                </div>


                <h5 class="subtitle">silver plus</h5>
                <div class="screen-wrapper">
                    <ul class="seat-area couple">
                        <li class="seat-line">
                            <span>e</span>
                            <ul class="seat--area">
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="E1,E2">
                                            <span class="sit-num">E1 E2</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="E3,E4">
                                            <span class="sit-num">E3 E4</span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="E5,E6">
                                            <span class="sit-num">E5 E6</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="E7,E8">
                                            <span class="sit-num">E7 E8</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="E9,E10">
                                            <span class="sit-num">E9 E10</span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat"  data-value="E11,E12">
                                            <span class="sit-num">E11 E12</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat"  data-value="E13,E14">
                                            <span class="sit-num">E13 E14</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <span>e</span>
                        </li>
                        <li class="seat-line">
                            <span>d</span>
                            <ul class="seat--area">
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat"  data-value="D1,D2">
                                            <span class="sit-num"> D1 D2</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat"  data-value="D3,D4">
                                            <span class="sit-num"> D3 D4</span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat"  data-value="D5,D6">
                                            <span class="sit-num"> D5 D6</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat"  data-value="D7,D8">
                                            <span class="sit-num">D7 D8</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat"  data-value="D9,D10">
                                            <span class="sit-num"> D9 D10</span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat"  data-value="D11,D12">
                                            <span class="sit-num"> D11 D12</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat"  data-value="D13,D14">
                                            <span class="sit-num"> D13 D14</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <span>d</span>
                        </li>
                        <li class="seat-line">
                            <span>c</span>
                            <ul class="seat--area">
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="C1,C2">
                                            <span class="sit-num"> C1 C2</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="C3,C4">
                                            <span class="sit-num"> C3 C4</span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="C5,C6">
                                            <span class="sit-num"> C5 C6</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="C7,C8">
                                            <span class="sit-num"> C7 C8</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="C9,C10">
                                            <span class="sit-num"> C9 C10</span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="C11,C12">
                                            <span class="sit-num">C11 C12</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="C13,C14">
                                            <span class="sit-num"> C13 C14</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <span>c</span>
                        </li>
                        <li class="seat-line">
                            <span>b</span>
                            <ul class="seat--area">
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="B1,B2">
                                            <span class="sit-num">B1 B2</span>
                                        </li>
                                        <li class="single-seat" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="B3,B4">
                                            <span class="sit-num">B3 B4</span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="B5,B6">
                                            <span class="sit-num">B5 B6</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="B7,B8">
                                            <span class="sit-num">B7 B8</span>
                                        </li>
                                        <li class="single-seat" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="B9,B10">
                                            <span class="sit-num">B9 B10</span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="B11,B12">
                                            <span class="sit-num">B11 B12</span>
                                        </li>
                                        <li class="single-seat" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="B13,B14">
                                            <span class="sit-num">B13 B14</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <span>b</span>
                        </li>
                        <li class="seat-line">
                            <span>a</span>
                            <ul class="seat--area">
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="A1,A2">
                                            <span class="sit-num">A1 A2</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="A3,A4">
                                            <span class="sit-num">A3 A4</span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="A5,A6">
                                            <span class="sit-num">A5 A6</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="A7,A8">
                                            <span class="sit-num">A7 A8</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="A9,A10">
                                            <span class="sit-num">A9 A10</span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="front-seat">
                                    <ul>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="A11,A12">
                                            <span class="sit-num">A11 A12</span>
                                        </li>
                                        <li class="single-seat seat-free-two" data-price="25">
                                            <img src="{{asset ('frontend/assets/images/movie/seat02-free.png') }}" alt="seat" data-value="A13,A14">
                                            <span class="sit-num">A13 A14</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <span>a</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="proceed-book bg_img" data-background="{{asset ('frontend/assets/images/movie/movie-bg-proceed.jpg') }}">
                <div class="proceed-to-book">
                    <div class="book-item" style="display: none;">
                        <span>You have Choosed Seat</span>
                        <h3 class="title" id="chosen-seats"></h3>
                    </div>

                    <div class="book-item">
                        <span>total price</span>
                        <h3 class="title" id="total-price">$0</h3>
                    </div>
                    <div class="book-item">
                        <button id="proceed-button" class="custom-button">Proceed</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========Movie-Section========== -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Add the click event handler for seat selection
        $(".single-seat img").on('click', function(e) {
            var seatNumber = $(this).data('value');
            var chosenSeats = $("#chosen-seats").text();
            // console.log($("#movie_id").val());
            // If the seat is already chosen, remove it
            if (chosenSeats.includes(seatNumber)) {
                chosenSeats = chosenSeats.replace(seatNumber + ",", "");
            } else {
                // chosenSeats += seatNumber + ",";
                chosenSeats += seatNumber ;
            }

            $("#chosen-seats").text(chosenSeats);

            // Show the book-item if there are chosen seats
            if (chosenSeats.trim() !== "") {
                $(".book-item").show();
            } else {
                $(".book-item").hide();
            }
        });
    });
</script>

<script>
    // Assume you have jQuery for simplicity
$(document).ready(function() {
    // Add click event listener to each seat
    $('.single-seat').click(function() {
        $(this).toggleClass('selected'); // Toggle selected class on click
        calculateTotalPrice(); // Calculate total price when a seat is clicked
    });
});

function calculateTotalPrice() {
    var totalPrice = 0;
    $('.single-seat.selected').each(function() { // Iterate through selected seats
        totalPrice += parseInt($(this).data('price')); // Add price of each selected seat
    });
    $("#total-price").text(totalPrice); // Display total price
}
</script>

<script>
    $(document).ready(function() {
        // Function to handle "proceed" button click
        $("#proceed-button").click(function() {
            var chosenSeats = $("#chosen-seats").text().trim(); // Get the chosen seat numbers
            var showtimeId = $("#showtime_id").val(); // Retrieve the showtime_id value
            var movieId = $("#movie_id").val();
            var totalprice = $("#total-price").text().trim(); // Get total price

            console.log("Chosen seats:", chosenSeats); // Log chosen seats for debugging
            console.log("Showtime ID:", showtimeId); // Log showtime ID for debugging
            console.log("Movie ID:", movieId);
            console.log("Total price:", totalprice);

            // Send an AJAX request to the server
            $.ajax({
                type: "POST",
                url: "{{ route('check.seat.availability') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { seats: chosenSeats,
                        showtime_id: showtimeId,
                        movieId: movieId,
                        totalPrice: totalprice
                    },

                success: function(response) {
                    console.log("Server response:", response); // Log server response for debugging

                    // Check the response from the server
                    if (response.available) {
                        // If seats are available, redirect to the checkout page
                        window.location.href = "/movie-checkout";
                    } else {
                        // If seats are not available, show an error message
                        alert("Sorry, the selected seats are already booked. Please choose different seats.");
                    }
                }

            });
        });
    });
</script>
@endif
</x-frontend-layout>
