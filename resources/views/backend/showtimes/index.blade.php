<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Showtimes</h2>
                        <a href="{{ route('showtimes.create') }}" class="btn btn-primary mb-3">Add New Showtime</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Movie</th>
                                        <th>Name</th>
                                        <th>Cinema Building</th>
                                        <th>Start Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($showtimes as $showtime)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <img src="{{ asset('movies/'.$showtime->movie->image) }}" alt="Current Image" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;"></td>
                                        <td>{{ $showtime->movie->name }}</td>
                                        <td>{{ $showtime->cinema_building->name }}</td>
                                        <td>{{ $showtime->start_time }}</td>
                                        <td>
                                            <a href="{{ route('showtimes.edit', $showtime->id) }}" class="btn btn-outline-primary">Edit</a>
                                        </td>
                                        <td>
                                            <x-delete route="{{ route('showtimes.destroy', $showtime->id) }}"></x-delete>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend-layout>
