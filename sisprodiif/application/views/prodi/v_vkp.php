
  
<?php foreach ($datakp as $kp) { ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kerja Praktek
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Data Kerja Praktek ID <?php echo $kp->id_kp; ?></h3>
              </div>
              <div class="box-body">
                <img class="profile-user-img img-responsive img-circle" src="<?php if($kp->lampiran_foto!=null){echo base_url().'files/kp/'.$kp->lampiran_foto ;}else{echo base_url().'asset/photo.png';} ?>" alt="User profile picture">
                <br>
                <br>
                <table class="table">
                  <tr>
                    <td>Nama Mahasisiwa</td>
                    <td><?php echo $kp->nama_mahasiswa; ?></td>
                  </tr>
                  <tr>
                    <td>NPM/NIM</td>
                    <td><?php echo $kp->npm; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?php echo $kp->alamat; ?></td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td><?php echo $kp->telepon; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $kp->email; ?></td>
                  </tr>
                  <tr>
                    <td>Semester</td>
                    <td><?php echo $kp->semester; ?></td>
                  </tr>
                  <tr>
                    <td>Topik Kerja Praktek</td>
                    <td><?php echo $kp->topik_kp; ?></td>
                  </tr>
                  <tr>
                    <td>Dosen Pembimbing</td>
                    <td><?php echo $kp->pembimbing_kp; ?></td>
                  </tr>
                  <tr>
                    <td>NID</td>
                    <td><?php echo $kp->nid; ?></td>
                  </tr>
                  <tr>
                    <td>NIDN</td>
                    <td><?php echo $kp->nidn; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Pengajuan</td>
                    <td><?php echo date_indo($kp->tanggal_peng); ?></td>
                  </tr>
                  <tr>
                    <td>Tahun Akademik Pengajuan</td>
                    <td><?php echo $kp->tahun_akademik_peng; ?></td>
                  </tr>
                  <tr>
                    <td>Nama Perusahaan/Inst</td>
                    <td><?php echo $kp->nama_perusahaan; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat Perusahaan/Inst</td>
                    <td><?php echo $kp->alamat_perusahaan; ?></td>
                  </tr>
                  <tr>
                    <td>Pembimbing Lapangan</td>
                    <td><?php echo $kp->pembimbinglap; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Awal Bimbingan</td>
                    <td><?php echo date_indo($kp->tanggal_awal); ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Akhir Bimbingan</td>
                    <td><?php echo date_indo($kp->tanggal_akhir); ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Penyerahan Laporan</td>
                    <td><?php if ($kp->tanggal_laporan != null) { echo date_indo($kp->tanggal_laporan); } ?></td>

                  </tr>
                  <tr>
                    <td>Semester selesai Kerja Praktek</td>
                    <td><?php echo $kp->semester_akhir; ?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td><?php echo $kp->status; ?></td>
                  </tr>
                  <tr>
                    <td>Status Selesai</td>
                    <td><?php echo $kp->status_selesai; ?></td>
                  </tr>
                  <tr>
                    <td>Nilai (Angka)</td>
                    <td><?php echo $kp->nilai; ?></td>
                  </tr>
                  <tr>
                    <td>Nilai</td>
                    <td><?php echo $kp->nilaih; ?></td>
                  </tr>
                  <tr>
                    <td>Semester Akademik Lulus</td>
                    <td><?php echo $kp->semesterh_lulus; ?></td>
                  </tr>
                  <tr>
                    <td>Tahun Akademik Lulus</td>
                    <td><?php echo $kp->tahun_akademik_lulus; ?></td>
                  </tr>
                  <tr>
                    <td>Topik Kerja Praktek Sebelumnya</td>
                    <td><?php echo $kp->topik_kp_sebelum; ?></td>
                  </tr>
                  <tr>
                    <td>Perusahaan Sebelumnya</td>
                    <td><?php echo $kp->perusahaan_sebelum; ?></td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <a href="<?php echo base_url().'prodi/listkp' ?>" class="btn btn-info pull-left"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
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

