{!! Form::model($model, [
    'route' => $model->exists ? ['penduduk.update', $model->id] : 'penduduk.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'enctype' => 'multipart/form-data',
]) !!}

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="no_kk">NO KK</label>
            <input id="no_kk" type="text" class="form-control" name="no_kk"
                value="{{ old('no_kk', $model->no_kk) }}">
        </div>

        <div class="form-group">
            <label for="name">Nama</label>
            <input id="name" type="text" class="form-control" name="name"
                value="{{ old('name', $model->name) }}">
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control select2" id="jenis_kelamin" name="jenis_kelamin" style="width: 100%">
                <option disabled selected>Pilih</option>
                <option value="L" {{ old('jenis_kelamin', $model->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                    Laki-Laki
                </option>
                <option value="P" {{ old('jenis_kelamin', $model->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="kewarganegaraan">Jenis Kelamin</label>
            <select class="form-control select2" id="kewarganegaraan" name="kewarganegaraan" style="width: 100%">
                <option disabled selected>Pilih</option>
                <option value="WNI"
                    {{ old('kewarganegaraan', $model->kewarganegaraan) == 'WNI' ? 'selected' : '' }}>
                    WNI
                </option>
                <option value="WNA"
                    {{ old('kewarganegaraan', $model->kewarganegaraan) == 'WNA' ? 'selected' : '' }}>
                    WNA
                </option>
                <option value="GANDA"
                    {{ old('kewarganegaraan', $model->kewarganegaraan) == 'GANDA' ? 'selected' : '' }}>
                    GANDA
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="golongan_darah">Golongan Darah</label>
            <input id="golongan_darah" type="text" class="form-control" name="golongan_darah"
                value="{{ old('golongan_darah', $model->golongan_darah) }}">
        </div>


    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="nik">NIK</label>
            <input id="nik" type="text" class="form-control" name="nik"
                value="{{ old('nik', $model->nik) }}">
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir"
                value="{{ old('tanggal_lahir', $model->tanggal_lahir?->format('Y-m-d') ?? '') }}">
        </div>

        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir"
                value="{{ old('tempat_lahir', $model->tempat_lahir) }}">
        </div>

        <div class="form-group">
            <label for="agama_id">Agama</label>
            <select class="form-control select2" id="agama_id" name="agama_id" style="width: 100%">
                <option disabled selected>Pilih</option>
                @foreach ($agamas as $agama)
                    <option value="{{ $agama->id }}"
                        {{ old('agama_id', $model->agama_id) == $agama->id ? 'selected' : '' }}>
                        {{ $agama->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="dusun_id">Dusun</label>
            <select class="form-control select2" id="dusun_id" name="dusun_id" style="width: 100%">
                <option disabled selected>Pilih</option>
                @foreach ($dusuns as $dusun)
                    <option value="{{ $dusun->id }}"
                        {{ old('dusun_id', $model->dusun_id) == $dusun->id ? 'selected' : '' }}>
                        {{ $dusun->name }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>
</div>

<div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', $model->alamat) }}</textarea>
</div>

<hr class="bg-primary">

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="pendidikan_id">Pendidikan</label>
            <select class="form-control select2" id="pendidikan_id" name="pendidikan_id" style="width: 100%">
                <option disabled selected>Pilih</option>
                @foreach ($pendidikans as $pendidikan)
                    <option value="{{ $pendidikan->id }}"
                        {{ old('pendidikan_id', $model->pendidikan_id) == $pendidikan->id ? 'selected' : '' }}>
                        {{ $pendidikan->name }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="pekerjaan_id">Pekerjaan</label>
            <select class="form-control select2" id="pekerjaan_id" name="pekerjaan_id" style="width: 100%">
                <option disabled selected>Pilih</option>
                @foreach ($pekerjaans as $pekerjaan)
                    <option value="{{ $pekerjaan->id }}"
                        {{ old('pekerjaan_id', $model->pekerjaan_id) == $pekerjaan->id ? 'selected' : '' }}>
                        {{ $pekerjaan->name }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>
</div>

<div class="form-group">
    <label for="penghasilan">Penghasilan</label>
    <textarea class="form-control" id="penghasilan" name="penghasilan">{{ old('penghasilan', $model->penghasilan) }}</textarea>
</div>

<hr class="bg-primary">

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="no_pasport">No Pasport</label>
            <input id="no_pasport" type="text" class="form-control" name="no_pasport"
                value="{{ old('no_pasport', $model->no_pasport) }}">
        </div>

    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="no_kitas_kitap">No KITAS/KITAP</label>
            <input id="no_kitas_kitap" type="text" class="form-control" name="no_kitas_kitap"
                value="{{ old('no_kitas_kitap', $model->no_kitas_kitap) }}">
        </div>
    </div>
</div>

<hr class="bg-primary">

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="status_perkawinan">Status Perkawinan</label>
            <select class="form-control select2" id="status_perkawinan" name="status_perkawinan"
                style="width: 100%">
                <option disabled selected>Pilih</option>
                <option value="BELUM KAWIN"
                    {{ old('status_perkawinan', $model->status_perkawinan) == 'BELUM KAWIN' ? 'selected' : '' }}>
                    BELUM KAWIN
                </option>
                <option value="KAWIN"
                    {{ old('status_perkawinan', $model->status_perkawinan) == 'KAWIN' ? 'selected' : '' }}>
                    KAWIN
                </option>
                <option value="CERAI HIDUP"
                    {{ old('status_perkawinan', $model->status_perkawinan) == 'CERAI HIDUP' ? 'selected' : '' }}>
                    CERAI HIDUP
                </option>
                <option value="CERAI MATI"
                    {{ old('status_perkawinan', $model->status_perkawinan) == 'CERAI MATI' ? 'selected' : '' }}>
                    CERAI MATI
                </option>
                <option value="LAINNYA"
                    {{ old('status_perkawinan', $model->status_perkawinan) == 'LAINNYA' ? 'selected' : '' }}>
                    LAINNYA
                </option>
            </select>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="hubungan">Hubungan Dalam Keluarga</label>
            <select class="form-control select2" id="hubungan" name="hubungan" style="width: 100%">
                <option disabled selected>Pilih</option>
                <option value="KEPALA KELUARGA"
                    {{ old('hubungan', $model->hubungan) == 'KEPALA KELUARGA' ? 'selected' : '' }}>
                    KEPALA KELUARGA
                </option>
                <option value="SUAMI" {{ old('hubungan', $model->hubungan) == 'SUAMI' ? 'selected' : '' }}>
                    SUAMI
                </option>
                <option value="ISTRI" {{ old('hubungan', $model->hubungan) == 'ISTRI' ? 'selected' : '' }}>
                    ISTRI
                </option>
                <option value="ANAK KANDUNG"
                    {{ old('hubungan', $model->hubungan) == 'ANAK KANDUNG' ? 'selected' : '' }}>
                    ANAK KANDUNG
                </option>
                <option value="ANAK TIRI" {{ old('hubungan', $model->hubungan) == 'ANAK TIRI' ? 'selected' : '' }}>
                    ANAK TIRI
                </option>
                <option value="MERTUA" {{ old('hubungan', $model->hubungan) == 'MERTUA' ? 'selected' : '' }}>
                    MERTUA
                </option>
                <option value="MENANTU" {{ old('hubungan', $model->hubungan) == 'MENANTU' ? 'selected' : '' }}>
                    MENANTU
                </option>
                <option value="ORANG TUA" {{ old('hubungan', $model->hubungan) == 'ORANG TUA' ? 'selected' : '' }}>
                    ORANG TUA
                </option>
                <option value="CUCU" {{ old('hubungan', $model->hubungan) == 'CUCU' ? 'selected' : '' }}>
                    CUCU
                </option>
                <option value="LAINNYA" {{ old('hubungan', $model->hubungan) == 'LAINNYA' ? 'selected' : '' }}>
                    LAINNYA
                </option>
            </select>
        </div>
    </div>
</div>

<hr class="bg-primary">

<div class="form-group">
    <label>KTP</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="ktp" name="ktp">
        <label class="custom-file-label" for="ktp" id="label-ktp">Choose file</label>
    </div>
</div>

{!! Form::close() !!}

<script type="text/javascript">
    document.querySelector("#ktp").onchange = function() {
        document.querySelector("#label-ktp").textContent = this.files[0].name;
    }
</script>
