{!! Form::model($model, [
    'route' => $model->exists ? ['dusun.update', $model->id] : 'dusun.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="form-group">
    <label for="name">dusun</label>
    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $model->name) }}">
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="rt">RT</label>
            <input id="rt" type="text" class="form-control" name="rt"
                value="{{ old('rt', $model->rt) }}">
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="rw">RW</label>
            <input id="rw" type="text" class="form-control" name="rw"
                value="{{ old('rw', $model->rw) }}">
        </div>
    </div>
</div>

{!! Form::close() !!}
