{!! Form::model($model, [
    'route' => $model->exists ? ['pendatang.update', $model->id] : 'pendatang.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="row">
    <div class="col-6">

        <div class="form-group">
            <label for="nik">NIK</label>
            <input id="nik" type="text" class="form-control" name="nik" value="{{ old('nik', $model->nik) }}">
        </div>

        <div class="form-group">
            <label for="name">Nama</label>
            <input id="name" type="text" class="form-control" name="name"
                value="{{ old('name', $model->name) }}">
        </div>

        <div class="form-group">
            <label for="tanggal_datang">Tanggal Datang</label>
            <input id="tanggal_datang" type="date" class="form-control" name="tanggal_datang"
                value="{{ old('tanggal_datang', $model->tanggal_datang?->format('Y-m-d') ?? '') }}">
        </div>

    </div>

    <div class="col-6">
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
            <label for="alamat_asal">Alamat Asal</label>
            <input id="alamat_asal" type="text" class="form-control" name="alamat_asal"
                value="{{ old('alamat_asal', $model->alamat_asal) }}">
        </div>

        <div class="form-group">
            <label for="nomor_hp">Nomor HP</label>
            <input id="nomor_hp" type="text" class="form-control" name="nomor_hp"
                value="{{ old('nomor_hp', $model->nomor_hp) }}">
        </div>

    </div>
</div>

<div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $model->keterangan) }}</textarea>
</div>

{!! Form::close() !!}
