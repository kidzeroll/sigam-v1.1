<table cellpadding="10">
    <tr>
        <td>Nama Bayi</td>
        <td>: {{ $model->name }}</td>
    </tr>

    <tr>
        <td>Jenis Kelamin</td>
        <td>: {{ $model->jenis_kelamin }}</td>
    </tr>

    <tr>
        <td>Tanggal Lahir</td>
        <td>: {{ $model->tanggal_lahir->format('d-m-Y') }}</td>
    </tr>

    <tr>
        <td>Tempat Lahir</td>
        <td>: {{ $model->tempat_lahir }}</td>
    </tr>

    <tr>
        <td>Nama Ayah</td>
        <td>: {{ $model->nama_ayah }}</td>
    </tr>

    <tr>
        <td>Nama Ibu</td>
        <td>: {{ $model->nama_ibu }}</td>
    </tr>

    <tr>
        <td>Keterangan</td>
        <td>: {{ $model->keterangan }}</td>
    </tr>

    <tr>
        <td>Akte</td>
        <td>: @if ($model->akte)
                <a href="{{ asset('storage/' . $model->akte) }}" target="_blank">AKTE
                    {{ $model->name }}</a>
            @else
                -
            @endif
        </td>
    </tr>
</table>
