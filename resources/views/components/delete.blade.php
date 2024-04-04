<form action="{{$route}}" method="post">
    {{-- @csrf --}}
    @method('DELETE')
    <button type="submit" class="btn btn-danger mr-2 show_confirm" >Delete</button>
</form>
