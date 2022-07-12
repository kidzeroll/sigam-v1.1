       <ul class="nav nav-tabs" id="myTab" role="tablist">
           <li class="nav-item">
               <a class="nav-link active" id="data-diri-tab" data-toggle="tab" href="#data-diri" role="tab"
                   aria-controls="home" aria-selected="true">Data Diri</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="data-orang-tua-tab" data-toggle="tab" href="#data-orang-tua" role="tab"
                   aria-controls="profile" aria-selected="false">Data Orang Tua</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab"
                   aria-controls="contact" aria-selected="false">Status</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="pekerjaan-tab" data-toggle="tab" href="#pekerjaan" role="tab"
                   aria-controls="contact" aria-selected="false">Data Pendidikan & Pekerjaan</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="identitas-lain-tab" data-toggle="tab" href="#identitas-lain" role="tab"
                   aria-controls="contact" aria-selected="false">Identitas Lain</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" id="identitas-lain-tab" data-toggle="tab" href="#lainnya" role="tab"
                   aria-controls="contact" aria-selected="false">Lainnya</a>
           </li>
       </ul>

       <div class="tab-content" id="myTabContent">

           <!-- data diri -->
           <div class="tab-pane fade show active" id="data-diri" role="tabpanel" aria-labelledby="data-diri-tab">

               <table cellpadding="10">
                   <tr>
                       <td>KK</td>
                       <td>: {{ $model->no_kk }}</td>
                   </tr>

                   <tr>
                       <td>NIK</td>
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
                       <td>Agama</td>
                       <td>: {{ $model->agama->name }}</td>
                   </tr>

                   <tr>
                       <td>Alamat</td>
                       <td>: {{ $model->alamat }}</td>
                   </tr>

                   <tr>
                       <td>Dusun</td>
                       <td>: {{ $model->dusun->name }}</td>
                   </tr>

                   <tr>
                       <td>RT</td>
                       <td>: {{ $model->dusun->rt }}</td>
                   </tr>

                   <tr>
                       <td>RW</td>
                       <td>: {{ $model->dusun->rw }}</td>
                   </tr>

                   <tr>
                       <td>Tempat Lahir</td>
                       <td>: {{ $model->tempat_lahir }}</td>
                   </tr>

                   <tr>
                       <td>Tanggal Lahir</td>
                       <td>: {{ $model->tanggal_lahir->format('d-m-Y') }}</td>
                   </tr>

                   <tr>
                       <td>Golongan Darah</td>
                       <td>: {{ $model->golongan_darah }}</td>
                   </tr>

                   <tr>
                       <td>Kewarganegaraan</td>
                       <td>: {{ $model->kewarganegaraan }}</td>
                   </tr>
               </table>
           </div>

           <!-- data orang tua -->
           <div class="tab-pane fade" id="data-orang-tua" role="tabpanel" aria-labelledby="data-orang-tua-tab">
               <table cellpadding="10">
                   <tr>
                       <td>Nama Ayah</td>
                       <td>: {{ $model->nama_ayah }}</td>
                   </tr>

                   <tr>
                       <td>Nama Ibu</td>
                       <td>: {{ $model->nama_ibu }}</td>
                   </tr>
               </table>
           </div>

           <!-- status -->
           <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">

               <table cellpadding="10">
                   <tr>
                       <td>Status Perkawinan</td>
                       <td>: {{ $model->status_perkawinan }}</td>
                   </tr>

                   <tr>
                       <td>Hubungan Dalam Keluarga</td>
                       <td>: {{ $model->hubungan }}</td>
                   </tr>
               </table>

           </div>

           <!-- data pendidikan & pekerjaan -->
           <div class="tab-pane fade" id="pekerjaan" role="tabpanel" aria-labelledby="pekerjaan-tab">
               <table cellpadding="10">
                   <tr>
                       <td>Pendidikan</td>
                       <td>: {{ $model->pendidikan->name }}</td>
                   </tr>

                   <tr>
                       <td>Pekerjaan</td>
                       <td>: {{ $model->pekerjaan->name }}</td>
                   </tr>

                   <tr>
                       <td>Penghasilan</td>
                       <td>: {{ $model->penghasilan }}</td>
                   </tr>
               </table>
           </div>

           <!-- Identitas Lain -->
           <div class="tab-pane fade" id="identitas-lain" role="tabpanel" aria-labelledby="identitas-lain-tab">

               <table cellpadding="10">
                   <tr>
                       <td>No Pasport</td>
                       <td>: {{ $model->no_pasport }}</td>
                   </tr>

                   <tr>
                       <td>No KITAS/KITAP</td>
                       <td>: {{ $model->no_kitas_kitap }}</td>
                   </tr>
               </table>
           </div>


           <!-- Lainnya -->
           <div class="tab-pane fade" id="lainnya" role="tabpanel" aria-labelledby="lainnya-tab">
               <table cellpadding="10">
                   <tr>
                       <td>KTP</td>
                       <td>: @if ($model->ktp)
                               <a href="{{ asset('storage/' . $model->ktp) }}" target="_blank">KTP
                                   {{ $model->name }}</a>
                           @else
                               -
                           @endif
                       </td>
                   </tr>
               </table>
           </div>

       </div>
