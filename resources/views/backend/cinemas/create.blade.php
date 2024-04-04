<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="card-title">Create Drink Category</h2>

                <form action="{{ route('cinema.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="form-group">
                                <label >Location</label>
                                <input type="location" name="location" class="form-control" value="{{ old('location') }}" required>
                                @error('location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>File upload</label>
                                <div class="input-group">
                                    <input type="file" name="image" class="file-upload-default">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <div class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </div>
                                </div>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                              {{-- <div class="mb-3">
                                <label for="image" class="form-label fw-bold">Upload Photo (Image)</label>
                                <input type="file" name="image" class="form-control" accept="image/*" required>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a class="btn btn-light" href="{{route('cinema.create')}}">Cancel</a>

                </form>
              </div>
            </div>
          </div>
        </div>




        {{-- @component('components.create-btn')
            @slot('route')
                {{route('room.create')}}
            @endslot
        @endcomponent --}}


        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Cinema</h4>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>ID #</th>
                          <th>Location</th>
                          <th>Cinema</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($cinemas as $cinema)
                       <tr>
                        <td>
                           <span> {{$cinema->id}}</span>
                        </td>
                        <td>
                            <span> {{ $cinema->location }}</span>
                        </td>

                        <td>
                            <span style="display: block; width: 200px; height: 200px; overflow: hidden;">
                                <img src="{{ asset('cinemas/'.$cinema->image) }}" alt="Current Image" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: cover;">
                            </span>
                        </td>

                      <td>
                        <a href="{{route('cinema.edit',$cinema->id)}}"class="btn btn-outline-primary">View</a>
                      </td>
                      <td>
                        <x-delete route="{{route('cinema.destroy',$cinema->id)}}"></x-delete>
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
