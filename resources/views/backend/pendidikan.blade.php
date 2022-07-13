<x-backend-layout>
    <x-slot name="title">Kelola Pendidikan</x-slot>

    <x-card label="Tabel pendidikan">
        <x-slot name="button">
            <a href="{{ route('pendidikan.create') }}" class="btn btn-primary modal-show" title="Tambah">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Pendidikan</span>
            </a>
        </x-slot>

        {{ $dataTable->table(['class' => 'table table-sm table-bordered']) }}

    </x-card>

    @push('modal')
        @include('layouts._modal')
    @endpush

    @push('script')
        {{ $dataTable->scripts() }}

        <script>
            // show modal
            $('body').on('click', '.modal-show', function(event) {
                event.preventDefault();

                var me = $(this),
                    url = me.attr('href'),
                    title = me.attr('title');

                $('#modal-title').text(title + ' Pendidikan');
                $('#modal-btn-save')
                    .removeClass('invisible')
                    .text(me.hasClass('edit') ? 'Update' : 'Save');

                $.ajax({
                    url: url,
                    dataType: 'html',
                    success: function(response) {
                        $('#modal-body').html(response);
                        $('.select2').select2();
                    }
                });

                $('#modal').modal('show');
            });

            // store or update
            $('#modal-btn-save').click(function(event) {
                var table = $('#pendidikan-table'),
                    form = $('#modal-body form'),
                    url = form.attr('action'),
                    method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

                form.find('.text-danger').remove();
                form.find('.form-group').removeClass('has-error');
                form.bind('keypress', function(event) {
                    if (event.keyCode == 13) {
                        return false;
                    }
                });

                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData($("#modal-body form")[0]),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        form.trigger('reset');
                        $('#modal').modal('hide');
                        table.DataTable().ajax.reload();
                        iziToast.success({
                            message: response.message,
                            position: 'topRight'
                        });
                    },
                    error: function(xhr) {
                        var res = xhr.responseJSON;

                        if ($.isEmptyObject(res) == false) {
                            $.each(res.errors, function(key, value) {
                                $('#' + key)
                                    .closest('.form-group')
                                    .addClass('has-error')
                                    .append('<span class="text-danger">' + value + '</span>')
                            })
                        }
                    }
                });
            });

            // show data
            $('body').on('click', '.btn-show', function(event) {
                event.preventDefault();

                var me = $(this),
                    url = me.attr('href'),
                    title = me.attr('title');

                $('#modal-title').text(title + ' Pendidikan');
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

                var table = $('#pendidikan-table'),
                    me = $(this),
                    url = me.attr('href'),
                    title = me.attr('title'),
                    csrf_token = $('meta[name="csrf-token"]').attr('content');


                swal({
                        title: 'Apakah anda ingin menghapus pendidikan?',
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
