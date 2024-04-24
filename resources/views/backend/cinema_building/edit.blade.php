<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Edit Cinema Building</h2>
                        <form action="{{ route('cinema_building.update', $cinemaBuilding->id) }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $cinemaBuilding->name }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ $cinemaBuilding->address }}">
                            </div>

                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control" id="city" value="{{ $cinemaBuilding->city }}">
                            </div>

                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" name="state" class="form-control" id="state" value="{{ $cinemaBuilding->state }}">
                            </div>


                            @if (isset($cinemaBuilding) && $cinemaBuilding->image)
                            <div class="form-group">
                                <label for="currentImage" class="form-label fw-bold">Current Image</label>
                                <img src="{{ asset('cinema-building-images/'.$cinemaBuilding->image) }}" alt="Current Image" class="img-thumbnail" style="width: 200px; height: auto;">
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
                            <a class="btn btn-light" href="{{ route('cinema_building.index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend-layout>
