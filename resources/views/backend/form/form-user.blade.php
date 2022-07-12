{!! Form::model($model, [
    'route' => $model->exists ? ['user.update', $model->id] : 'user.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="form-group">
    <label for="name">Nama</label>
    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $model->name) }}">
</div>

<div class="row">
    <div class="col-6">

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email"
                value="{{ old('email', $model->email) }}">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control select2" id="gender" name="gender" style="width: 100%">
                <option disabled selected>Pilih</option>
                <option value="L" {{ old('gender', $model->gender) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="P" {{ old('gender', $model->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

    </div>

    <div class="col-6">

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control select2" id="role" name="role" style="width: 100%">
                <option disabled selected>Pilih</option>
                <option value="admin" {{ old('role', $model->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="petugas" {{ old('role', $model->role) == 'petugas' ? 'selected' : '' }}>Petugas
                </option>
            </select>
        </div>

    </div>
</div>

{!! Form::close() !!}
