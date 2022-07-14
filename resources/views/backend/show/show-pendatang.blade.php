<table cellpadding="10">
    <tr>
        <td>Nik</td>
        <td>: {{ $model->nik }}</td>
    </tr>

    <tr>
        <td>Nama</td>
        <td>: {{ $model->name }}</td>
    </tr>

    <tr>
        <td>Jenis Kelamin</td>
        <td>: {{ $model->jenis_kelamin }}</td>
    </tr>

    <tr>
        <td>Tanggal Datang</td>
        <td>: {{ $model->tanggal_datang->format('d-m-Y') }}</td>
    </tr>

    <tr>
        <td>Alamat Asal</td>
        <td>: {{ $model->alamat_asal }}</td>
    </tr>

    <tr>
        <td>Nomor HP</td>
        <td>: {{ $model->nomor_hp }}</td>
    </tr>

    <tr>
        <td>Keterangan</td>
        <td>: {{ $model->keterangan }}</td>
    </tr>

</table>
