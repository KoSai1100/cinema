<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="card-title">Create staff</h2>
                <form action="{{route('staff.store')}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                  </div>

                  <div class="form-group">
                    <label>File upload</label>
                    <input type="file" name="photo" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                    @error('photo')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
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
