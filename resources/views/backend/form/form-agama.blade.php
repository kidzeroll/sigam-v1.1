{!! Form::model($model, [
    'route' => $model->exists ? ['agama.update', $model->id] : 'agama.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="form-group">
    <label for="name">Agama</label>
    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $model->name) }}">
</div>

{!! Form::close() !!}
