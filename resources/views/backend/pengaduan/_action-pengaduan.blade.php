@if ($model->status == 'ditanggapi' || $model->status == 'selesai')
    <a href="{{ $url_wa }}" class="text-decoration-none btn-sm btn-success mr-1 btn-wa" title="Whatsapp">
        <i class="fab fa-whatsapp"></i>
    </a>
@endif


@can('isAdmin')
    @if ($model->status == 'menunggu')
        <a href="{{ $url_tanggapi }}" class="text-decoration-none btn-sm btn-primary tanggapi" title="Tanggapi"
            style="margin-right: 5px">
            <i class="fas fa-check"></i>
        </a>
    @endif
@endcan

<a href="{{ $url_show }}" class="text-decoration-none btn-sm btn-warning mr-1 btn-show" title="Detail">
    <i class="fas fa-eye"></i>
</a>

@can('isAdmin')
    <a href="{{ $url_destroy }}" class="text-decoration-none btn-sm btn-danger ml-1 btn-delete" title="Hapus">
        <i class="fas fa-trash"></i>&nbsp;
    </a>
@endcan
