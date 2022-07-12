<x-backend-layout>
    <x-slot name="title">Profil Gampong</x-slot>

    <div class="row">
        <div class="col-9">
            <x-card class="card-primary" label="Profil Gampong">

                <form action="{{ route('profil-gampong.update', $gampong->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-6">

                            <div class="form-group">
                                <label for="nama_gampong">Nama Gampong</label>
                                <input id="nama_gampong" type="nama_gampong" class="form-control" name="nama_gampong"
                                    value="{{ old('nama_gampong', $gampong->nama_gampong) }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_kabupaten">Nama Kabupaten</label>
                                <input id="nama_kabupaten" type="nama_kabupaten" class="form-control"
                                    name="nama_kabupaten"
                                    value="{{ old('nama_kabupaten', $gampong->nama_kabupaten) }}">
                            </div>

                            <div class="form-group">
                                <label for="kode_gampong">Kode Gampong</label>
                                <input id="kode_gampong" type="kode_gampong" class="form-control" name="kode_gampong"
                                    value="{{ old('kode_gampong', $gampong->kode_gampong) }}">
                            </div>

                            <div class="form-group">
                                <label for="alamat_gampong">Alamat Gampong</label>
                                <input id="alamat_gampong" type="alamat_gampong" class="form-control"
                                    name="alamat_gampong"
                                    value="{{ old('alamat_gampong', $gampong->alamat_gampong) }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_keuchik">Nama Keuchik</label>
                                <input id="nama_keuchik" type="nama_keuchik" class="form-control" name="nama_keuchik"
                                    value="{{ old('nama_keuchik', $gampong->nama_keuchik) }}">
                            </div>

                        </div>

                        <div class="col-6">

                            <div class="form-group">
                                <label for="nama_kecamatan">Nama Kecamatan</label>
                                <input id="nama_kecamatan" type="nama_kecamatan" class="form-control"
                                    name="nama_kecamatan"
                                    value="{{ old('nama_kecamatan', $gampong->nama_kecamatan) }}">
                            </div>

                            <div class="form-group">
                                <label for="nama_provinsi">Nama Provinsi</label>
                                <input id="nama_provinsi" type="nama_provinsi" class="form-control" name="nama_provinsi"
                                    value="{{ old('nama_provinsi', $gampong->nama_provinsi) }}">
                            </div>

                            <div class="form-group">
                                <label for="kode_pos">Kode Pos</label>
                                <input id="kode_pos" type="kode_pos" class="form-control" name="kode_pos"
                                    value="{{ old('kode_pos', $gampong->kode_pos) }}">
                            </div>

                            <div class="form-group">
                                <label for="alamat_keuchik">Alamat Keuchik</label>
                                <input id="alamat_keuchik" type="alamat_keuchik" class="form-control"
                                    name="alamat_keuchik"
                                    value="{{ old('alamat_keuchik', $gampong->alamat_keuchik) }}">
                            </div>

                            <div class="form-group">
                                <label>Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="logo" name="logo">
                                    <label class="custom-file-label" for="logo" id="label-logo">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input id="twitter" type="twitter" class="form-control" name="twitter"
                            value="{{ old('twitter', $gampong->twitter) }}">
                    </div>

                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input id="facebook" type="facebook" class="form-control" name="facebook"
                            value="{{ old('facebook', $gampong->facebook) }}">
                    </div>

                    <div class="form-group">
                        <label for="whatsapp">Whatsapp</label>
                        <input id="whatsapp" type="whatsapp" class="form-control" name="whatsapp"
                            value="{{ old('whatsapp', $gampong->whatsapp) }}">
                    </div>

                    <div class="form-group">
                        <label for="instagram">instagram</label>
                        <input id="instagram" type="instagram" class="form-control" name="instagram"
                            value="{{ old('instagram', $gampong->instagram) }}">
                    </div>

                    <div class="form-group">
                        <label>Map</label>
                        <textarea class="form-control" id="map" name="map">{{ old('map', $gampong->map) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Update</button>

                </form>

            </x-card>
        </div>

        <div class="col-3">
            <x-card class="card-primary">
                @slot('button')
                    <img src="{{ asset('storage/' . $gampong->logo) }}" alt=""
                        class="img image-preview img-thumbnail">
                @endslot

                <div class="align-center">
                    <h5>{{ $gampong->nama_gampong }}</h5>
                    <p>Kec. {{ $gampong->nama_kecamatan }} Kab. {{ $gampong->nama_kabupaten }}</p>
                </div>
            </x-card>

            <x-card class="card-primary" label="Map" style="overflow: hidden">
                {!! $gampong->map !!}
            </x-card>

            <x-card class="card-primary align-items-center text-center" label="Social Media">

                <div class="badge badge-info mt-2">
                    <i class="fab fa-twitter"></i>
                    <span>{{ $gampong->twitter }}</span>
                </div> <br>

                <div class="badge badge-primary mt-2">
                    <i class="fab fa-facebook"></i>
                    <span>{{ $gampong->facebook }}</span>
                </div> <br>

                <div class="badge badge-success mt-2">
                    <i class="fab fa-whatsapp"></i>
                    <span>{{ $gampong->whatsapp }}</span>
                </div> <br>

                <div class="badge badge-secondary mt-2 mb-2">
                    <i class="fab fa-instagram"></i>
                    <span>{{ $gampong->instagram }}</span>
                </div>

            </x-card>

        </div>
    </div>


    @push('script')
        <script type="text/javascript">
            document.querySelector("#logo").onchange = function() {
                document.querySelector("#label-logo").textContent = this.files[0].name;
            }
        </script>
    @endpush
</x-backend-layout>
