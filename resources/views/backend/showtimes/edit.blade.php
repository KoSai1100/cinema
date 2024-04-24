<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Edit Showtime</h2>
                        <form action="{{ route('showtimes.update', $showtime->id) }}" class="forms-sample" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="movie_id">Movie</label>
                                <select class="form-control" id="movie_id" name="movie_id">
                                    @foreach ($movies as $movie)
                                        <option value="{{ $movie->id }}" {{ $showtime->movie_id == $movie->id ? 'selected' : '' }}>{{ $movie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cinema_building_id">Cinema Building</label>
                                <select class="form-control" id="cinema_building_id" name="cinema_building_id">
                                    @foreach ($cinemaBuildings as $cinemaBuilding)
                                        <option value="{{ $cinemaBuilding->id }}" {{ $showtime->cinema_building_id == $cinemaBuilding->id ? 'selected' : '' }}>{{ $cinemaBuilding->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ date('Y-m-d\TH:i', strtotime($showtime->start_time)) }}">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <a class="btn btn-light" href="{{ route('showtimes.index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend-layout>
