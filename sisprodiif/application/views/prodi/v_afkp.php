<?php echo form_open('c_prodi/approvekp'); ?>
  
<?php foreach ($datakp as $kp) { ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menyetujui Pengajuan Kerja Praktek
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Formulir Pengajuan Kerja Praktek telah di cek kelengkapannya.</h3>
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
                    <td>Usulan Pembimbing</td>
                    <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="pembimbing" id="optionsRadios1" value="<?php echo $kp->nid1.'|'.$kp->pembimbing1.'|'.$kp->nidn1; ?>" checked="" type="radio">
                            <?php echo $kp->pembimbing1; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="pembimbing" id="optionsRadios2" value="<?php echo $kp->nid2.'|'.$kp->pembimbing2.'|'.$kp->nidn2; ?>" type="radio">
                            <?php echo $kp->pembimbing2; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="pembimbing" id="optionsRadios3" value="Dosen Lain" type="radio">
                            Dosen Lain      
                            
                            <select class="form-control pull-right select2" name="pembimbing_alt" >
                                <option>-</option>
                              <?php foreach ($listdosen as $dosen) { ?>
                                <?php if ($dosen->nid!=$kp->nid1&&$dosen->nid!=$kp->nid2){ ?>
                                  <option value="<?php echo $dosen->nid.'|'.$dosen->nama_dosen.'|'.$dosen->nidn; ?>"><?php echo $dosen->nama_dosen; ?></option>
                                <?php } ?>
                                
                                <?php } ?>
                            </select>                          
                          </label>
                        </div>
                      </div>
                    </td>
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
                    <td>Daftar Nilai (transkrip akademik) terbaru</td>
                    <td><a href="<?php echo base_url().'files/pengajuankp/'.$kp->lampiran3 ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download" ></i> DOWNLOAD</a></td>
                  </tr>
                  
                </table>

                <table class="table">
                  <td>Setujui Pengajuan</td>
                  <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios1" value="Diterima" checked="" type="radio">
                            Diterima
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios2" value="Ditolak" type="radio">
                            Ditolak
                          </label>
                        </div>
                      </div>                    
                  </td>
                </table>
              </div>
              <div class="box-footer">
                <input type="hidden" name="id" value="<?php echo $kp->id; ?>">
                <input type="hidden" name="nama_mahasiswa" value="<?php echo $kp->nama_mahasiswa; ?>">
                <input type="hidden" name="npm" value="<?php echo $kp->npm; ?>">
                <input type="hidden" name="semester" value="<?php echo $kp->semester; ?>">
                <input type="hidden" name="telepon" value="<?php echo $kp->telepon; ?>">
                <input type="hidden" name="alamat" value="<?php echo $kp->alamat; ?>">
                <input type="hidden" name="email" value="<?php echo $kp->email; ?>">
                <input type="hidden" name="topik_kp" value="<?php echo $kp->topik_kp; ?>">
                <input type="hidden" name="tanggal_peng" value="<?php echo $kp->tanggal_peng; ?>">
                <input type="hidden" name="nama_perusahaan" value="<?php echo $kp->nama_perusahaan; ?>">
                <input type="hidden" name="alamat_perusahaan" value="<?php echo $kp->alamat_perusahaan; ?>">
                <input type="hidden" name="pembimbinglap" value="<?php echo $kp->pembimbinglap; ?>">
                <input type="hidden" name="tahun_akademik_peng" value="<?php echo $kp->tahun_akademik_peng; ?>">
                <input type="hidden" name="lampiran1" value="<?php echo $kp->lampiran1; ?>">
                <input type="hidden" name="lampiran2" value="<?php echo $kp->lampiran2; ?>">
                <input type="hidden" name="lampiran3" value="<?php echo $kp->lampiran3; ?>">
                <input type="submit" class="btn btn-info pull-right" value="Kirim">
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