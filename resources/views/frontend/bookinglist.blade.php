<x-frontend-layout>
    @if (auth()->id() === null)
        <script>window.location = "{{ route('register') }}";</script>
    @else
        <!-- ==========Banner-Section========== -->
        <section class="banner-section">
            <div class="banner-bg bg_img bg-fixed" data-background="./frontend/assets/images/banner/banner01.jpg"></div>
            <div class="container">
                <div class="banner-content">
                    <h1 class="title  cd-headline clip"><span class="d-block">book your</span> tickets for
                        <span class="color-theme cd-words-wrapper p-0 m-0">
                            <b class="is-visible">Movie</b>
                            <b>Event</b>
                            <b>Sport</b>
                        </span>
                    </h1>
                    <p>Safe, secure, reliable ticketing. Your ticket to live entertainment!</p>
                </div>
            </div>
        </section>
        <!-- ==========Banner-Section========== -->

        <div class="container">
            <h1>Booking List</h1>

            @if ($bookings->isEmpty())
                <p>There is nothing booked yet.</p>
                <br><br><br>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-white">Movie</th>
                            <th class="text-white">Name</th>
                            <th class="text-white">Cinema Building</th>
                            <th class="text-white">Showtime</th>
                            <th class="text-white">Seat Number</th>
                            <th class="text-white">Total Price</th>
                            <th class="text-white">Promocode</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>
                                    <img src="{{ asset('movies/'.$booking->showtime->movie->image) }}" alt="{{ $booking->showtime->movie->name }}" class="img-thumbnail" style="width: 80%; height: 80%; object-fit: cover;">                                </td>
                                <td class="text-white">{{ optional($booking->showtime->movie)->name }}</td>
                                <td class="text-white">{{ optional($booking->showtime->cinema_building)->name }}</td>
                                <td class="text-white">{{ $booking->showtime->start_time }}</td>
                                <td class="text-white">{{ implode(', ', explode(',', $booking->seatnumber)) }}</td>
                                <td class="text-white">{{ $booking->totalprice }}</td>
                                <td class="text-white">{{ $booking->promocode }}</td>

                                <td>
                                    <form action="{{ route('booking.destroy', $booking->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mr-2 show_confirm">Cancel</button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endif
</x-frontend-layout>
