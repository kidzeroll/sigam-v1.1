<x-backend-layout>
    <x-slot name="title">Pengaduan</x-slot>

    <x-card label="Tabel Pengaduan">

        {{ $dataTable->table(['class' => 'table table-sm table-bordered']) }}

    </x-card>

    @push('modal')
        @include('layouts._modal')
    @endpush

    @push('script')
        {{ $dataTable->scripts() }}

        <script>
            // tanggapi
            $('body').on('click', '.tanggapi', function(event) {
                event.preventDefault();

                var me = $(this),
                    url = me.attr('href'),
                    table = $('#pengaduan-table'),
                    csrf_token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        '_token': csrf_token,
                    },
                    success: function(response) {
                        table.DataTable().ajax.reload();
                        iziToast.success({
                            message: response.message,
                            position: 'topRight'
                        });
                    }
                });
            });

            // whatsapp
            $('body').on('click', '.btn-wa', function(event) {
                event.preventDefault();

                var me = $(this),
                    url = me.attr('href'),
                    table = $('#pengaduan-table'),
                    csrf_token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        '_token': csrf_token,
                    },
                    success: function(response) {
                        table.DataTable().ajax.reload();
                        iziToast.success({
                            message: 'Pengaduan berhasil diberitahukan lewat Whatsapp',
                            position: 'topRight'
                        });
                    }
                });
            });

            // show data
            $('body').on('click', '.btn-show', function(event) {
                event.preventDefault();

                var me = $(this),
                    url = me.attr('href'),
                    title = me.attr('title');

                $('#modal-title').text(title + ' Pengaduan');
                $('#modal-btn-save').addClass('invisible');

                $.ajax({
                    url: url,
                    dataType: 'html',
                    success: function(response) {
                        $('#modal-body').html(response);
                    }
                });

                $('#modal').modal('show');
            });

            //delete data
            $('body').on('click', '.btn-delete', function(event) {
                event.preventDefault();

                var table = $('#pengaduan-table'),
                    me = $(this),
                    url = me.attr('href'),
                    title = me.attr('title'),
                    csrf_token = $('meta[name="csrf-token"]').attr('content');


                swal({
                        title: 'Apakah anda ingin menghapus pengaduan?',
                        text: '',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: url,
                                type: "POST",
                                data: {
                                    '_method': 'DELETE',
                                    '_token': csrf_token,
                                },
                                success: function(response) {
                                    table.DataTable().ajax.reload();
                                    iziToast.success({
                                        message: response.message,
                                        position: 'topRight'
                                    });
                                },
                                error: function(xhr) {
                                    swal('Oops...', xhr, 'error');
                                }
                            });
                        }
                    });

            });
        </script>
    @endpush
</x-backend-layout>
