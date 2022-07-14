{!! Form::model($model, [
    'route' => $model->exists ? ['pindah.update', $model->id] : 'pindah.store',
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

        <div class="form-group">
            <label for="tanggal_pindah">Tanggal Pindah</label>
            <input id="tanggal_pindah" type="date" class="form-control" name="tanggal_pindah"
                value="{{ old('tanggal_pindah', $model->tanggal_pindah?->format('Y-m-d') ?? '') }}">
        </div>
    </div>



    <div class="col-6">
        <div class="form-group">
            <label for="tujuan_pindah">Tujuan Pindah</label>
            <input id="tujuan_pindah" type="text" class="form-control" name="tujuan_pindah"
                value="{{ old('tujuan_pindah', $model->tujuan_pindah) }}">
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $model->keterangan) }}</textarea>
        </div>

    </div>
</div>

{!! Form::close() !!}
