<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="card-title">Edit Cinema location</h2>

                <form action="{{route('cinema.update',$cinema->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                            <!-- room type Name -->
                            <div class="form-group">
                                <label for="exampleInputName1">Location</label>
                            <input value="{{ old('location', $cinema->location) }}" name="location" type="text" class="form-control"  placeholder="Enter Meal Category">
                            @error('location')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a class="btn btn-light" href="{{route('cinema.create')}}">Cancel</a>

                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-backend-layout>
