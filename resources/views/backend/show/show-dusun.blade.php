<table cellpadding="10">

    <tr>
        <td>Id</td>
        <td>: {{ $model->id }}</td>
    </tr>

    <tr>
        <td>Dusun</td>
        <td>: {{ $model->name }}</td>
    </tr>

    <tr>
        <td>RT</td>
        <td>: {{ $model->rt }}</td>
    </tr>

    <tr>
        <td>RW</td>
        <td>: {{ $model->rw }}</td>
    </tr>

    <tr>
        <td>Created</td>
        <td>: {{ $model->created_at->format('d-m-Y') }}</td>
    </tr>

</table>
