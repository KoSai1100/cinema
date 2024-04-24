<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="card-title">Entry Movie Info</h2>
                <form action="{{route('movie.store')}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="exampleSelectGender">Choose cinema</label>

                        <select class="form-control" id="exampleSelectGender" name="cinema_id">
                            @foreach ($cinemas as $item)
                                <option value="{{ $item->id }}">{{ $item->location }}</option>
                            @endforeach
                        </select>


                    </div> --}}
                  <div class="form-group">
                    <label for="exampleInputName1">Movie name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Cast</label>
                    <input type="text" name="cast" class="form-control" id="exampleInputEmail3" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail3">Director</label>
                    <input type="text" name="director" class="form-control" id="exampleInputEmail3" >
                  </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Description</label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                </div>

                  <div class="form-group">
                    <label for="exampleInputEmail3">Duration(mins)</label>
                    <input type="number" name="duration" class="form-control" id="exampleInputEmail3" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail3">Release Date</label>
                    <input type="date" name="release_date" class="form-control" id="exampleInputEmail3" >
                  </div>

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

                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <a class="btn btn-light" href="{{route('movie.index')}}">Cancel</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-backend-layout>
