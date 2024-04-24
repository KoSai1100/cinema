<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="card-title">Create staff</h2>
                <form action="{{route('staff.update',$staff->id)}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    @error('name')
                        {{$message}}
                    @enderror
                    <input type="text" value="{{$staff->name}}" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    @error('email')
                    {{$message}}
                @enderror
                    <input type="email" value="{{$staff->email}}" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                  </div>
                  <div class="form-group">
                    @error('password')
                    {{$message}}
                @enderror
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label>File upload</label>
                    @error('photo')
                    {{$message}}
                @enderror
                    <br>
                    @empty($staff->photo)
                        <h5>No Photos Found</h5>
                        @else
                        <img class="mb-4" src="{{asset('staffs/'.$staff->photo)}}" width="200" height="200" alt="">
                    @endempty
                    <input type="file" name="photo" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <a class="btn btn-light" href="{{route('staff.index')}}">Cancel</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-backend-layout>
