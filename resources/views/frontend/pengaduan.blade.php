<x-frontend-layout>
    <x-slot name="title">Pengaduan</x-slot>

    <section id="pengaduan">
        <div class="container">


            <div class="card shadow">
                <h5 class="card-header">Halaman Pengaduan</h5>

                <div class="card-body">
                    <div class="container">

                        <form action="{{ route('pengaduan.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="form-group mt-3">
                                <label for="name">Nama</label>
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name') }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="judul">Judul Pengaduan</label>
                                <input id="judul" type="text" class="form-control" name="judul"
                                    value="{{ old('judul') }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="isi">Isi Pengaduan</label>
                                <textarea class="form-control" name="isi" id="isi">{{ old('isi') }}</textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label for="no_hp">Nomor Whatsapp</label>
                                <input id="no_hp" type="text" class="form-control" name="no_hp"
                                    value="{{ old('no_hp') }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="laporan">Lampiran</label>
                                <input type="file" class="form-control" id="laporan" name="laporan">
                            </div>

                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </section>

    <x-slot name="footer">
        <x-frontend.footer />
    </x-slot>

</x-frontend-layout>
