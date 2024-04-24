<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Create Showtime</h2>
                        <form action="{{ route('showtimes.store') }}" class="forms-sample" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="movie_id">Movie</label>
                                <select class="form-control" id="movie_id" name="movie_id">
                                    @foreach ($movies as $movie)
                                        <option value="{{ $movie->id }}">{{ $movie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cinema_building_id">Cinema Building</label>
                                <select class="form-control" id="cinema_building_id" name="cinema_building_id">
                                    @foreach ($cinemaBuildings as $cinemaBuilding)
                                        <option value="{{ $cinemaBuilding->id }}">{{ $cinemaBuilding->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="datetime-local" class="form-control" id="start_time" name="start_time">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a class="btn btn-light" href="{{ route('showtimes.index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend-layout>
