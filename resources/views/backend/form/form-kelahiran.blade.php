{!! Form::model($model, [
    'route' => $model->exists ? ['kelahiran.update', $model->id] : 'kelahiran.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'enctype' => 'multipart/form-data',
]) !!}

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="name">Nama Bayi</label>
            <input id="name" type="text" class="form-control" name="name"
                value="{{ old('name', $model->name) }}">
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir"
                value="{{ old('tanggal_lahir', $model->tanggal_lahir?->format('Y-m-d') ?? '') }}">
        </div>

        <div class="form-group">
            <label for="nama_ayah">Nama Ayah</label>
            <input id="nama_ayah" type="text" class="form-control" name="nama_ayah"
                value="{{ old('nama_ayah', $model->nama_ayah) }}">
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
            <label for="tempat_lahir">Tempat Lahir</label>
            <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir"
                value="{{ old('tempat_lahir', $model->tempat_lahir) }}">
        </div>

        <div class="form-group">
            <label for="nama_ibu">Nama Ibu</label>
            <input id="nama_ibu" type="text" class="form-control" name="nama_ibu"
                value="{{ old('nama_ibu', $model->nama_ibu) }}">
        </div>


    </div>
</div>

<div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $model->keterangan) }}</textarea>
</div>

<div class="form-group">
    <label>Akte Kelahiran</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="akte" name="akte">
        <label class="custom-file-label" for="akte" id="label-akte">Choose file</label>
    </div>
</div>

{!! Form::close() !!}

<script type="text/javascript">
    document.querySelector("#akte").onchange = function() {
        document.querySelector("#label-akte").textContent = this.files[0].name;
    }
</script>
