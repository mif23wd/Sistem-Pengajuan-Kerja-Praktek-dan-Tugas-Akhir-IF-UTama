<?php echo form_open_multipart('c_admin/editdkp'); ?>
  
<?php foreach ($datakp as $kp) { ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Kerja Praktek 
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Data Kerja Pratek ID <?php echo $kp->id_kp; ?></h3>
              </div>
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td>Nama Mahasisiwa</td>
                    <td><input class="form-control" name="nama_mahasiswa" type="text" value="<?php echo $kp->nama_mahasiswa; ?>"></td>
                  </tr>
                  <tr>
                    <td>NPM/NIM</td>
                    <td><input class="form-control" name="npm" type="text" value="<?php echo $kp->npm; ?>"></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><textarea class="form-control" name="alamat"><?php echo $kp->alamat; ?></textarea></td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td><input class="form-control" name="telepon" type="text" value="<?php echo $kp->telepon; ?>"></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><input class="form-control" name="email" type="email" value="<?php echo $kp->email; ?>"></td>
                  </tr>
                  <tr>
                    <td>Semester</td>
                    <td>
                      <select class="form-control" name="semester" style="width: 100%;">
                          <option value="">-</option>
                          <option value="7" <?php if ($kp->semester==7){ echo "selected";} ?>>7</option>
                          <option value="8" <?php if ($kp->semester==8){ echo "selected";} ?>>8</option>
                          <option value="9" <?php if ($kp->semester==9){ echo "selected";} ?>>9</option>
                          <option value="10" <?php if ($kp->semester==10){ echo "selected";} ?>>10</option>
                          <option value="11" <?php if ($kp->semester==11){ echo "selected";} ?>>11</option>
                          <option value="12" <?php if ($kp->semester==12){ echo "selected";} ?>>12</option>
                          <option value="13" <?php if ($kp->semester==13){ echo "selected";} ?>>13</option>
                          <option value="14" <?php if ($kp->semester==14){ echo "selected";} ?>>14</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Topik Kerja Praktek</td>
                    <td><textarea class="form-control" name="topik_kp" ><?php echo $kp->topik_kp; ?></textarea></td>
                  </tr>
                  <tr>
                    <td>Dosen Pembimbing</td>
                    <td>
                      
                      <?php 
                        $nids = $kp->nid; 


                      ?>

                      <div class="form-group">
                          <select class="form-control select2" name="pembimbing" data-placeholder="Dosen Pembimbing" style="width: 100%;">
                           
                            <?php foreach ($listdosen as $dosen) { ?>
                            <option value="<?php echo $dosen->nid.'|'.$dosen->nama_dosen.'|'.$dosen->nidn; ?>" <?php if ($nids == $dosen->nid) { echo "selected"; } ?>><?php echo $dosen->nama_dosen; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Pengajuan</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_peng" value="<?php echo $kp->tanggal_peng; ?>">
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Tahun Akademik Pengajuan</td>
                    <td>
                      <?php $thn = 1999; $cthn = date('Y'); ?>
                      <select class="form-control select2" name="tahun_akademik_peng" style="width: 100%;">
                        <option value="">-</option>
                        <?php while ($thn<=$cthn) { ?>
                        <option value="<?php echo ($thn-1).'/'.$thn;?>" <?php if ($kp->tahun_akademik_peng == ($thn-1).'/'.$thn) { echo "selected"; } ?>><?php echo ($thn-1).'/'.$thn; ?></option>  
                        <?php $thn=$thn+1; } ?>
                        <?php for ($i=0; $i < 2 ; $i++) { ?>
                        <option value="<?php echo ($thn-1).'/'.$thn;?>" <?php if ($kp->tahun_akademik_peng == ($thn-1).'/'.$thn) { echo "selected"; } ?>><?php echo ($thn-1).'/'.$thn; ?></option>
                        <?php $thn=$thn+1; } ?>

                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Perusahaan/Inst</td>
                    <td><input class="form-control" name="nama_perusahaan" type="text" value="<?php echo $kp->nama_perusahaan; ?>"></td>
                  </tr>
                  <tr>
                    <td>Alamat Perusahaan/Inst</td>
                    <td><textarea class="form-control" name="alamat_perusahaan"><?php echo $kp->alamat_perusahaan; ?></textarea></td>
                  </tr>
                  <tr>
                    <td>Pembimbing Lapangan</td>
                    <td><input class="form-control" name="pembimbinglap" type="text" value="<?php echo $kp->pembimbinglap; ?>"></td>
                  </tr>
                  <tr>
                    <td>Tanggal Awal Bimbingan</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker1" name="tanggal_awal" value="<?php echo $kp->tanggal_awal; ?>">
                        </div>
                      </div>                      
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Akhir Bimbingan</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker2" name="tanggal_akhir" value="<?php echo $kp->tanggal_akhir; ?>">
                        </div>
                      </div> 
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Penyerahan Laporan</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker3" name="tanggal_laporan" value="<?php echo $kp->tanggal_laporan; ?>">
                        </div>
                      </div> 
                    </td>

                  </tr>
                  <tr>
                    <td>Semester selesai Kerja Praktek</td>
                    <td>
                      <select class="form-control" name="semester_akhir" style="width: 100%;">
                          <option value="">-</option>
                          <option value="7" <?php if ($kp->semester_akhir==7){ echo "selected";} ?>>7</option>
                          <option value="8" <?php if ($kp->semester_akhir==8){ echo "selected";} ?>>8</option>
                          <option value="9" <?php if ($kp->semester_akhir==9){ echo "selected";} ?>>9</option>
                          <option value="10" <?php if ($kp->semester_akhir==10){ echo "selected";} ?>>10</option>
                          <option value="11" <?php if ($kp->semester_akhir==11){ echo "selected";} ?>>11</option>
                          <option value="12" <?php if ($kp->semester_akhir==12){ echo "selected";} ?>>12</option>
                          <option value="13" <?php if ($kp->semester_akhir==13){ echo "selected";} ?>>13</option>
                          <option value="14" <?php if ($kp->semester_akhir==14){ echo "selected";} ?>>14</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios1" value="Dalam Bimbingan" type="radio" <?php if ($kp->status == 'Dalam Bimbingan') { echo 'checked'; } ?>>
                            Dalam Bimbingan
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios2" value="Perpanjang" type="radio" <?php if ($kp->status == 'Perpanjang') { echo 'checked'; } ?>>
                            Perpanjang
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios3" value="Lulus" type="radio" <?php if ($kp->status == 'Lulus') { echo 'checked'; } ?>>
                            Lulus
                          </label>
                        </div>
                      </div>                      
                    </td>
                  </tr>
                  <tr>
                    <td>Status Selesai</td>
                    <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="status_selesai" id="optionsRadios1" value="" type="radio" <?php if ($kp->status_selesai == null) { echo "checked"; }?>>
                            Dalam Bimbingan
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status_selesai" id="optionsRadios2" value="Pembimbing Ok" type="radio" <?php if ($kp->status_selesai == 'Pembimbing Ok') { echo "checked"; }?>>
                            Pembimbing Ok
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status_selesai" id="optionsRadios3" value="Sidang" type="radio" <?php if ($kp->status_selesai == 'Sidang') { echo "checked"; }?>>
                            Sidang
                          </label>
                        </div>
                      </div>                            
                    </td>
                  </tr>
                  <tr>
                    <td>Nilai (Angka)</td>
                    <td><input class="form-control" name="nilai" type="number" value="<?php echo $kp->nilai; ?>"></td>
                  </tr>
                  
                  <tr>
                    <td>Tahun Akademik Lulus</td>
                    <td>
                      <?php $thn = 1999; $cthn = date('Y'); ?>
                      <select class="form-control select2" name="tahun_akademik_lulus" style="width: 100%;">
                        <option value="">-</option>
                        <?php while ($thn<=$cthn) { ?>
                        <option value="<?php echo ($thn-1).'/'.$thn;?>" <?php if ($kp->tahun_akademik_lulus == ($thn-1).'/'.$thn) { echo "selected"; } ?>><?php echo ($thn-1).'/'.$thn; ?></option>  
                        <?php $thn=$thn+1; } ?>
                        <?php for ($i=0; $i < 2 ; $i++) { ?>
                        <option value="<?php echo ($thn-1).'/'.$thn;?>" <?php if ($kp->tahun_akademik_lulus == ($thn-1).'/'.$thn) { echo "selected"; } ?>><?php echo ($thn-1).'/'.$thn; ?></option>
                        <?php $thn=$thn+1; } ?>

                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Topik Kerja Praktek Sebelumnya</td>
                    <td><textarea class="form-control" name="topik_kp_sebelum" ><?php echo $kp->topik_kp_sebelum; ?></textarea></td>
                  </tr>
                  <tr>
                    <td>Perusahaan Sebelumnya</td>
                    <td><input class="form-control" name="perusahaan_sebelum" type="text" value="<?php echo $kp->perusahaan_sebelum; ?>"></td>
                  </tr>
                  <tr>
                    <td>Foto 3x4cm</td>
                    <td><input type="file" name="lampiran_foto" value="<?php echo $kp->lampiran_foto; ?>">  <img src="<?php echo base_url().'files/kp/'.$kp->lampiran_foto; ?>" width="128px"></td>
                  </tr>
                </table>
                <input type="hidden" name="id_kp" value="<?php echo $kp->id_kp; ?>">
                <input type="hidden" name="lampiran_foto_lm" value="<?php echo $kp->lampiran_foto; ?>">
              </div>
              <div class="box-footer">
                <input class="btn btn-info pull-right" type="submit" value="Edit">
                <a href="<?php echo base_url().'listkp' ?>" class="btn btn-info pull-left"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
                
                
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
