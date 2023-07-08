<a href="{{ route('user.edit', $model) }}" class="btn btn-icon btn-active-light-warning w-30px h-30px me-3" title="Edit details">
    <i class="bi bi-pencil-square"></i>
</a>

@if ($model->id != 1)
    <button href="{{ route('user.destroy', $model) }}" class="btn btn-icon btn-active-light-danger w-30px h-30px me-3" id="delete" title="Delete">
        <i class="bi bi-trash3-fill"></i>
    </button>
@endif

<x-admin.alert-delete/>

