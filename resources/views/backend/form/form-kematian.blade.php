{!! Form::model($model, [
    'route' => $model->exists ? ['kematian.update', $model->id] : 'kematian.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="penduduk_id">Penduduk</label>
            <select class="form-control select2" id="penduduk_id" name="penduduk_id" style="width: 100%">
                <option disabled selected>Pilih</option>
                @foreach ($penduduks as $penduduk)
                    <option value="{{ $penduduk->id }}"
                        {{ old('penduduk_id', $model->penduduk_id) == $penduduk->id ? 'selected' : '' }}>
                        {{ $penduduk->nik }} | {{ $penduduk->name }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="tanggal_kematian">Tanggal Kematian</label>
            <input id="tanggal_kematian" type="date" class="form-control" name="tanggal_kematian"
                value="{{ old('tanggal_kematian', $model->tanggal_kematian?->format('Y-m-d') ?? '') }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $model->keterangan) }}</textarea>
</div>

{!! Form::close() !!}
