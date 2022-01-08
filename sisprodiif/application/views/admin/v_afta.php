<?php echo form_open('c_admin/approveta'); ?>
  
<?php foreach ($datata as $ta) { ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cek Pengajuan Tugas Akhir
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Formulir Pengajuan Tugas Akhir</h3>
              </div>
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td>Nama</td>
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
                    <td>Konsentrasi</td>
                    <td><?php echo $ta->konsentrasi; ?></td>
                  </tr>
                  <tr>
                    <td>Semester</td>
                    <td><?php echo $ta->semester; ?></td>
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
                    <td>Topik Tugas Akhir</td>
                    <td><?php echo $ta->topik_ta; ?></td>
                  </tr>
                  <tr>
                    <td>Usulan Pembimbing 1</td>
                    <td><?php echo $ta->pembimbing1; ?></td>
                  </tr>
                  <tr>
                    <td>Usulan Pembimbing 2</td>
                    <td><?php echo $ta->pembimbing2; ?></td>
                  </tr>
                  <tr>
                    <td>Jumlah SKS</td>
                    <td><?php echo $ta->jumlah_sks; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Pengajuan</td>
                    <td><?php echo date_indo($ta->tanggal_peng); ?></td>
                  </tr>
                  <tr>
                    <td>Tahun Akademik Pengajuan</td>
                    <td><?php echo $ta->tahun_akademik_peng; ?></td>
                  </tr>
                </table>
                <br>
                <h4>Lampiran persyaratan kerja praktek</h4>
                <table class="table">
                  <tr>
                    <td>Foto copy Bukti Pembayaran Kuliah dan FRS (yang mencantumkan Tugas Akhir)</td>
                    <td><a href="<?php echo base_url().'files/pengajuanta/'.$ta->lampiran1 ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download"></i> DOWNLOAD</a></td>
                  </tr>
                  <tr>
                    <td>Daftar Nilai (transkrip akademik) terbaru (yang sudah diverifikasi akademik)</td>
                    <td><a href="<?php echo base_url().'files/pengajuanta/'.$ta->lampiran2 ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download" ></i> DOWNLOAD</a></td>
                  </tr>
                  <tr>
                    <td>Proposal Tugas Akhir</td>
                    <td><a href="<?php echo base_url().'files/pengajuanta/'.$ta->lampiran3 ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download" ></i> DOWNLOAD</a></td>
                  </tr>
                  <tr>
                    <td>Surat Keterangan Ikut Karya Ilmiah</td>
                    <td><a href="<?php echo base_url().'files/pengajuanta/'.$ta->lampiran4 ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download" ></i> DOWNLOAD</a></td>
                  </tr>
                  <tr>
                    <td>Foto Copy Sertifikat TOEFL (score min 400)</td>
                    <td><a href="<?php echo base_url().'files/pengajuanta/'.$ta->lampiran5 ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download" ></i> DOWNLOAD</a></td>
                  </tr>
                  <tr>
                    <td>Foto diri 3x4cm</td>
                    <td><a href="<?php echo base_url().'files/pengajuanta/'.$ta->lampiran6 ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download" ></i> DOWNLOAD</a></td>
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
                <input type="hidden" name="id" value="<?php echo $ta->id; ?>">
                <input type="hidden" name="npm" value="<?php echo $ta->npm; ?>">
                <input type="hidden" name="lampiran1" value="<?php echo $ta->lampiran1; ?>">
                <input type="hidden" name="lampiran2" value="<?php echo $ta->lampiran2; ?>">
                <input type="hidden" name="lampiran3" value="<?php echo $ta->lampiran3; ?>">
                <input type="hidden" name="lampiran4" value="<?php echo $ta->lampiran4; ?>">
                <input type="hidden" name="lampiran5" value="<?php echo $ta->lampiran5; ?>">
                <input type="hidden" name="lampiran6" value="<?php echo $ta->lampiran6; ?>">
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