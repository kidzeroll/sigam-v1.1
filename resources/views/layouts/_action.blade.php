<a href="{{ $url_show }}" class="text-decoration-none btn-sm btn-warning mr-1 btn-show" title="Detail">
    <i class="fas fa-eye"></i>
</a>

@can('isAdmin')
    <a href="{{ $url_edit }}" class="text-decoration-none btn-sm btn-primary modal-show edit" title="Edit">
        <i class="fas fa-edit"></i>
    </a>

    <a href="{{ $url_destroy }}" class="text-decoration-none btn-sm btn-danger ml-1 btn-delete" title="Hapus">
        <i class="fas fa-trash"></i>&nbsp;
    </a>
@endcan
