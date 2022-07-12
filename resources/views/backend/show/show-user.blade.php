<table cellpadding="10">

    <tr>
        <td>Nama</td>
        <td>: {{ $model->name }}</td>
    </tr>

    <tr>
        <td>Email</td>
        <td>: {{ $model->email }}</td>
    </tr>

    <tr>
        <td>Jenis Kelamin</td>
        <td>: {{ $model->gender }}</td>
    </tr>

    <tr>
        <td>Role</td>
        <td>:
            <span class="badge badge-{{ $model->role == 'admin' ? 'primary' : 'warning' }}">{{ $model->role }}</span>
        </td>
    </tr>

</table>
