{!! Form::model($model, [
    'route' => $model->exists ? ['pendidikan.update', $model->id] : 'pendidikan.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="form-group">
    <label for="name">Pendidikan</label>
    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $model->name) }}">
</div>

{!! Form::close() !!}
