<form action="{{route('delete-photo-user',$item)}}" method="post" id="deletePhoto">
    @csrf
    @method("PUT")
    <input type="submit" value="Hapus" class="btn btn-danger" style="display: none">
</form>
