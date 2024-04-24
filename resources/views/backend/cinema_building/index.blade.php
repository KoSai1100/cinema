<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Cinema Buildings</h2>
                        <a href="{{ route('cinema_building.create') }}" class="btn btn-primary mb-3">Add New Cinema Building</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Image</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cinemaBuildings as $cinemaBuilding)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cinemaBuilding->name }}</td>
                                        <td>{{ $cinemaBuilding->address }}</td>
                                        <td>{{ $cinemaBuilding->city }}</td>
                                        <td>{{ $cinemaBuilding->state }}</td>
                                        <td><img src="{{ asset('cinema-building-images/' . $cinemaBuilding->image) }}" alt="Building Image" width="100"></td>
                                        <td>
                                            <a href="{{ route('cinema_building.edit', $cinemaBuilding->id) }}" class="btn btn-outline-primary">View</a>
                                        </td>
                                        <td>
                                            <x-delete route="{{ route('cinema_building.destroy', $cinemaBuilding->id) }}"></x-delete>
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
