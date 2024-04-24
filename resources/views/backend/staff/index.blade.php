<x-backend-layout>


    <div class="content-wrapper">

        @component('components.create-btn')
            @slot('route')
                {{route('staff.create')}}
            @endslot
        @endcomponent


        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data table</h4>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>ID #</th>
                          <th>Created At</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($staffs as $staff)
                       <tr>
                        <td>
                           <span> {{$staff->id}}</span>
                        </td>
                        <td>
                            <span> {{ $staff->created_at }}</span>
                        </td>
                        <td>
                            <span> {{$staff->name}}</span>
                        </td>
                        <td>
                            <span>  {{$staff->email}}</span>
                        </td>
                      <td>
                        <a href="{{route('staff.edit',$staff->id)}}"class="btn btn-outline-primary">View</a>
                      </td>
                      <td>
                        <x-delete route="{{route('staff.destroy',$staff->id)}}"></x-delete>
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

<style>
    td{
       height: 60px;
    }
    td span{
        font-size: 16px;
    }
</style>


