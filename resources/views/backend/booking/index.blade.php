<x-backend-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Booking List') }}
            </h2>
        </x-slot>


    <div class="content-wrapper">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"> Booking List</h4>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">

                        @if ($bookings->isEmpty())
                            <p>There are no bookings yet.</p>
                        @else
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Movie</th>
                                        <th>Cinema</th>
                                        <th>Showtime</th>
                                        <th>Seat Numbers</th>
                                        <th>Total Price</th>

                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td >{{ $booking->id }}</td>
                                            <td >{{ $booking->user->name }}</td>
                                            <td >{{ optional($booking->showtime->movie)->name }}</td>
                                            <td>{{ optional($booking->showtime->cinema_building)->name }}</td>
                                            <td >{{ $booking->showtime->start_time }}</td>
                                            <td >{{  implode(', ', explode(',', $booking->seatnumber)) }}</td>
                                            <td >{{ $booking->totalprice }}</td>
                                            {{-- <td >
                                                <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Cancel</button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>


</x-backend-layout>
<style>
    td{
       height: 60px;
    }
    td span{
        font-size: 16px;
    }

</style>
