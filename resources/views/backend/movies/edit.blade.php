<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Edit Movie Info</h2>
                        <form action="{{ route('movie.update', $movie->id) }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <div class="form-group">
                                <label for="exampleSelectGender">Choose cinema</label>

                                <select class="form-control" id="exampleSelectGender" name="cinema_id">
                                    @foreach ($cinemas as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $movie->cinema_id) selected @endif>{{ $item->location }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputName1">Movie name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{ $movie->name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Cast</label>
                                <input type="text" name="cast" class="form-control" id="exampleInputEmail3" value="{{ $movie->cast }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">Director</label>
                                <input type="text" name="director" class="form-control" id="exampleInputEmail3" value="{{ $movie->director }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">Description</label>
                                <textarea name="description" id="" cols="30" rows="10">{{ $movie->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">Duration(mins)</label>
                                <input type="number" name="duration" class="form-control" id="exampleInputEmail3" value="{{ $movie->duration }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">Release Date</label>
                                <input type="date" name="release_date" class="form-control" id="exampleInputEmail3" value="{{ $movie->release_date }}">
                            </div>

                            @if (isset($movie) && $movie->image)
                            <div class="form-group">
                                <label for="currentImage" class="form-label fw-bold">Current Image</label>
                                <img src="{{ asset('movies/'.$movie->image) }}" alt="Current Image" class="img-thumbnail" style="width: 200px; height: auto;">
                            </div>
                            @endif

                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                                @error('image')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <a class="btn btn-light" href="{{ route('movie.index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend-layout>
