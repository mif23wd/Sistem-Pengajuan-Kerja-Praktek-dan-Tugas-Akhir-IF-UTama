
  
<?php foreach ($datata as $ta) { ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tugas Akhir
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Data Kerja Akhir ID <?php echo $ta->id_ta; ?></h3>
                <a href="<?php echo base_url().'c_admin/cetakkartuta/'.$ta->id_ta ?>" class="btn btn-info pull-right">Cetak Kartu</a>
              </div>
              <div class="box-body">
                <img class="profile-user-img img-responsive img-circle" src="<?php if($ta->lampiran_foto!=null){echo base_url().'files/ta/'.$ta->lampiran_foto ;}else{echo base_url().'asset/photo.png';} ?>" alt="User profile picture">
                <br>
                <br>
                <table class="table">
                  <tr>
                    <td>Nama Mahasisiwa</td>
                    <td><?php echo $ta->nama_mahasiswa; ?></td>
                  </tr>
                  <tr>
                    <td>NPM/NIM</td>
                    <td><?php echo $ta->npm; ?></td>
                  </tr>
                  <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td><?php echo $ta->tempat_lahir.', '.date_indo($ta->tanggal_lahir); ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?php echo $ta->alamat; ?></td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td><?php echo $ta->telepon; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $ta->email; ?></td>
                  </tr>
                  <tr>
                    <td>Konsentrasi</td>
                    <td><?php echo $ta->konsentrasi; ?></td>
                  </tr>                  
                  <tr>
                    <td>Semester</td>
                    <td><?php echo $ta->semester; ?></td>
                  </tr>
                  <tr>
                    <td>Topik Tugas Akhir</td>
                    <td><?php echo $ta->topik_ta; ?></td>
                  </tr>
                  <tr>
                    <td>Dosen Pembimbing</td>
                    <td><?php echo $ta->pembimbing_ta; ?></td>
                  </tr>
                  <tr>
                    <td>NID</td>
                    <td><?php echo $ta->nid; ?></td>
                  </tr>
                  <tr>
                    <td>NIDN</td>
                    <td><?php echo $ta->nidn; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Pengajuan</td>
                    <td><?php echo date_indo($ta->tanggal_peng); ?></td>
                  </tr>
                  <tr>
                    <td>Tahun Akademik Pengajuan</td>
                    <td><?php echo $ta->tahun_akademik_peng; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Awal Bimbingan</td>
                    <td><?php echo date_indo($ta->tanggal_awal); ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Akhir Bimbingan</td>
                    <td><?php echo date_indo($ta->tanggal_akhir); ?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td><?php echo $ta->status; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Perpanjang Bimbingan</td>
                    <td><?php if ($ta->tanggal_panjang != null) { echo date_indo($ta->tanggal_panjang); } ?></td>
                  </tr>
                  <tr>
                    <td>Batas Waktu</td>
                    <td><?php echo $ta->batas_waktu; ?></td>
                  </tr>
                  <tr>
                    <td>IPK</td>
                    <td><?php echo $ta->ipk; ?></td>
                  </tr>
                  <tr>
                    <td>Topik Tugas Akhir Sebelumnya</td>
                    <td><?php echo $ta->topik_ta_sebelum; ?></td>
                  </tr>
                  <tr>
                    <td>Penguji 1</td>
                    <td><?php echo $ta->penguji1; ?></td>
                  </tr>
                  <tr>
                    <td>Penguji 2</td>
                    <td><?php echo $ta->penguji2; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Sidang</td>
                    <td><?php if ($ta->tanggal_sidang) { echo date_indo($ta->tanggal_sidang); } ?></td>
                  </tr>
                  <tr>
                    <td>Tempat Sidang</td>
                    <td><?php echo $ta->tempat_sidang; ?></td>
                  </tr>
                  <tr>
                    <td>Waktu Sidang</td>
                    <td><?php echo $ta->waktu_sidang; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Yudisium</td>
                    <td><?php if ( $ta->tanggal_yudisium ) { echo date_indo($ta->tanggal_yudisium); } ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Pra Sidang</td>
                    <td><?php if ($ta->tanggal_pra_sid) { echo date_indo($ta->tanggal_pra_sid); } ?></td>
                  </tr>
                  <tr>
                    <td>Status Pra Sidang</td>
                    <td><?php echo $ta->status_pra_sid; ?></td>
                  </tr>
                  <tr>
                    <td>Penguji Pra Sidang</td>
                    <td><?php echo $ta->penguji_pra_sid; ?></td>
                  </tr>
                  <tr>
                    <td>Waktu Pra Sidang</td>
                    <td><?php echo $ta->waktu_pra_sid; ?></td>
                  </tr>
                  <tr>
                    <td>Tempat Pra Sidang</td>
                    <td><?php echo $ta->tempat_pra_sid; ?></td>
                  </tr>
                  <tr>
                    <td>Semester Akademik Lulus</td>
                    <td><?php echo $ta->semesterh_lulus; ?></td>
                  </tr>
                  <tr>
                    <td>Tahun Akademik Lulus</td>
                    <td><?php echo $ta->tahun_akademik_lulus; ?></td>
                  </tr>
                  <tr>
                    <td>Proposal Tugas Akhir</td>
                    <td>
                      <?php if ($ta->lampiran_proposal!=null){ ?>
                        <div class="col-md-3">
                        <a href="<?php echo base_url().'files/ta/'.$ta->lampiran_proposal; ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download" ></i> DOWNLOAD</a>
                        </div>
                      <?php } else{echo "Data tidak ada";} ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td><?php echo $ta->keterangan; ?></td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <a href="<?php echo base_url().'admin/listta' ?>" class="btn btn-info pull-left"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
                <a href="<?php echo base_url().'c_admin/editta/'.$ta->id_ta ?>" class="btn btn-info pull-right"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              </div>
            </div>
          </div>
          <div class="col-md-1"></div>       
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php } ?>

