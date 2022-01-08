<?php echo form_open('c_admin/approvekp'); ?>
  
<?php foreach ($datakp as $kp) { ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cek Pengajuan Kerja Praktek
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Formulir Pengajuan Kerja Praktek</h3>
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
                </table>
                <br>
                <h4>Lampiran persyaratan kerja praktek</h4>
                <table class="table">
                  <tr>
                    <td>Foto copy Bukti Pembayaran Kuliah dan FRS (yang mencantumkan Kerja Praktek)</td>
                    <td><a href="<?php echo base_url().'files/pengajuankp/'.$kp->lampiran1 ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download"></i> DOWNLOAD</a></td>
                  </tr>
                  <tr>
                    <td>Daftar Nilai (transkrip akademik) terbaru</td>
                    <td><a href="<?php echo base_url().'files/pengajuankp/'.$kp->lampiran2 ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download" ></i> DOWNLOAD</a></td>
                  </tr>
                  <tr>
                    <td>Foto diri ukuran 3x4</td>
                    <td><a href="<?php echo base_url().'files/pengajuankp/'.$kp->lampiran3 ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download" ></i> DOWNLOAD</a></td>
                  </tr>
                </table>

                <table class="table">
                  <td>Teruskan ke bagian Prodi</td>
                  <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="pass" id="optionsRadios1" value="Ya" checked="" type="radio">
                            Ya
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="pass" id="optionsRadios2" value="Tidak" type="radio">
                            Tidak
                          </label>
                        </div>
                      </div>                    
                  </td>
                </table>
              </div>
              <div class="box-footer">
                <input type="hidden" name="id" value="<?php echo $kp->id; ?>">
                <input type="hidden" name="npm" value="<?php echo $kp->npm; ?>">
                <input type="hidden" name="lampiran1" value="<?php echo $kp->lampiran1; ?>">
                <input type="hidden" name="lampiran2" value="<?php echo $kp->lampiran2; ?>">
                <input type="hidden" name="lampiran3" value="<?php echo $kp->lampiran3; ?>">
                <input type="submit" class="btn btn-info pull-right" value="Kirim ke Prodi">
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

<?php echo form_close(); ?>