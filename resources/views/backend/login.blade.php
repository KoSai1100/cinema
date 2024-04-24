<x-backend-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Login</h2>
                        <form action="/admin/login" class="forms-sample" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    Remember me <i class="input-helper"></i></label>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Login</button>
                            <a class="btn btn-light" href="#">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend-layout>
