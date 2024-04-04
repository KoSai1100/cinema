<x-backend-layout>


    <div class="content-wrapper">

        @component('components.create-btn')
            @slot('route')
                {{route('movie.create')}}
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
                          <th>Movie</th>
                          <th>Name</th>
                          <th>Cinema</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach ($movies as $movie)
                        <tr>
                            <td>{{ $movie->id }}</td>

                            <td>
                                <img src="{{ asset('movies/'.$movie->image) }}" alt="Current Image" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: cover;">
                            </td>

                            <td>{{ $movie->name }}</td>

                            <td>
                                {{ $movie->location ?? 'Location Not Available' }}
                            </td>

                            <td>{{ $movie->cast }}</td>
                            <td>{{ $movie->director }}</td>
                            <td>
                                <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-outline-primary">View</a>
                            </td>
                            <td>
                                <x-delete route="{{ route('movie.destroy', $movie->id) }}"></x-delete>
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
