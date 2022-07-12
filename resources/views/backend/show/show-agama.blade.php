<table cellpadding="10">

    <tr>
        <td>Id</td>
        <td>: {{ $model->id }}</td>
    </tr>

    <tr>
        <td>Agama</td>
        <td>: {{ $model->name }}</td>
    </tr>

    <tr>
        <td>Created</td>
        <td>: {{ $model->created_at->format('d-m-Y') }}</td>
    </tr>

</table>
