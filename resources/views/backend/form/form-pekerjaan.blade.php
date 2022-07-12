{!! Form::model($model, [
    'route' => $model->exists ? ['pekerjaan.update', $model->id] : 'pekerjaan.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="form-group">
    <label for="name">Pekerjaan</label>
    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $model->name) }}">
</div>

{!! Form::close() !!}
