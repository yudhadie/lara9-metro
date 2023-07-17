@if ($type == 'show')
    <a class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" title="Show details" {{$attributes}}>
        <i class="bi bi-eye"></i>
    </a>
@elseif ($type == 'edit')
    <a class="btn btn-icon btn-active-light-warning w-30px h-30px me-3" title="Edit details" {{$attributes}}>
        <i class="bi bi-pencil-square"></i>
    </a>
@elseif ($type == 'delete')
    <button class="btn btn-icon btn-active-light-danger w-30px h-30px me-3" id="delete" title="Delete" {{$attributes}}>
        <i class="bi bi-trash3-fill"></i>
    </button>
@endif
