
  
<?php foreach ($datakp as $kp) { ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengajuan Kerja Praktek
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Data Kerja Pratek ID <?php echo $kp->id; ?></h3>
              </div>
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td>Nama</td>
                    <td><?php echo $kp->nama_mahasiswa; ?></td>
                  </tr>
                  <tr>
                    <td>NPM/NIM</td>
                    <td><?php echo $kp->npm; ?></td>
                  </tr>
                  <tr>
                    <td>Semester</td>
                    <td><?php echo $kp->semester; ?></td>
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
                    <td>Topik Kerja Praktek</td>
                    <td><?php echo $kp->topik_kp; ?></td>
                  </tr>
                  <tr>
                    <td>Usulan Pembimbing 1</td>
                    <td><?php echo $kp->pembimbing1; ?></td>
                  </tr>
                  <tr>
                    <td>Usulan Pembimbing 2</td>
                    <td><?php echo $kp->pembimbing2; ?></td>
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
                    <td>Jumlah SKS</td>
                    <td><?php echo $kp->jumlah_sks; ?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td><?php echo $kp->status; ?></td>
                  </tr>
                </table>
                <h4>Lampiran persyaratan kerja praktek</h4>
                <table class="table">
                  <tr>
                    <td>Foto copy Bukti Pembayaran Kuliah dan FRS (yang mencantumkan Kerja Praktek)</td>
                    <td><a href="<?php echo base_url().'/files/pengajuankp/'.$kp->lampiran1 ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download"></i> DOWNLOAD</a></td>
                  </tr>
                  <tr>
                    <td>Daftar Nilai (transkrip akademik) terbaru</td>
                    <td><a href="<?php echo base_url().'/files/pengajuankp/'.$kp->lampiran2 ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-download" ></i> DOWNLOAD</a></td>
                  </tr>
                  <tr>
                    <td>Foto diri ukuran 3x4</td>
                    <td><a href="<?php echo base_url().'/files/pengajuankp/'.$kp->lampiran3 ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-download" ></i> DOWNLOAD</a></td>
                  </tr>
                  
                </table>                
              </div>
              <div class="box-footer">
                <a href="<?php echo base_url().'admin/listpengajuankp' ?>" class="btn btn-info pull-left"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
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


