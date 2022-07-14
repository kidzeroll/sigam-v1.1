<table cellpadding="10">

    <tr>
        <td>NIK</td>
        <td>: {{ $model->penduduk->nik }}</td>
    </tr>

    <tr>
        <td>Nama</td>
        <td>: {{ $model->penduduk->name }}</td>
    </tr>

    <tr>
        <td>Jenis Kelamin</td>
        <td>: {{ $model->penduduk->jenis_kelamin }}</td>
    </tr>

    <tr>
        <td>Alamat</td>
        <td>: {{ $model->penduduk->alamat }}</td>
    </tr>


    <tr>
        <td>Tanggal Kematian</td>
        <td>: {{ $model->tanggal_kematian->format('d-m-y') }}</td>
    </tr>

    <tr>
        <td>Keterangan</td>
        <td>: {{ $model->keterangan }}</td>
    </tr>

</table>
