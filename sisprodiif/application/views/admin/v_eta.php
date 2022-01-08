<?php echo form_open_multipart('c_admin/editdta'); ?>
  
<?php foreach ($datata as $ta) { ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Tugas Akhir
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Data Tugas Akhir ID <?php echo $ta->id_ta; ?></h3>
              </div>
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td>Nama Mahasisiwa</td>
                    <td><input class="form-control" name="nama_mahasiswa" type="text" value="<?php echo $ta->nama_mahasiswa; ?>"></td>
                  </tr>
                  <tr>
                    <td>NPM/NIM</td>
                    <td><input class="form-control" name="npm" type="text" value="<?php echo $ta->npm; ?>"></td>
                  </tr>
                  <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td>
                      <div class="col-xs-3">
                          <input class="form-control" name="tempat_lahir" type="text" placeholder="Tempat Lahir" value="<?php echo $ta->tempat_lahir; ?>" required>
                        </div>
                        <div class="col-xs-9">
                            <div class="form-group">
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker2" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo $ta->tanggal_lahir; ?>" >
                              </div>
                            </div> 
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><textarea class="form-control" name="alamat"><?php echo $ta->alamat; ?></textarea></td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td><input class="form-control" name="telepon" type="text" value="<?php echo $ta->telepon; ?>"></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><input class="form-control" name="email" type="email" value="<?php echo $ta->email; ?>"></td>
                  </tr>
                  <tr>
                    <td>Konsentrasi</td>
                    <td>
                      <select class="form-control" name="konsentrasi" style="width: 100%;">
                          <option value="Applied Database" <?php if ($ta->konsentrasi=='Applied Database') { echo "selected"; } ?> >Applied Database</option>
                          <option value="Applied Networking" <?php if ($ta->konsentrasi=='Applied Networking') { echo "selected"; } ?> >Applied Networking</option>
                          <option value="Information Technology" <?php if ($ta->konsentrasi=='Information Technology') { echo "selected"; } ?> >Information Technology</option>
                          <option value="Game dan Multimedia" <?php if ($ta->konsentrasi=='Game dan Multimedia') { echo "selected"; } ?> >Game dan Multimedia</option>
                          <option value="Interfacing System" <?php if ($ta->konsentrasi=='Interfacing System') { echo "selected"; } ?> >Interfacing System</option>
                      </select>
                    </td>
                  </tr>                  
                  <tr>
                    <td>Semester</td>
                    <td>
                      <select class="form-control" name="semester" style="width: 100%;">
                          <option value="">-</option>
                          <option value="7" <?php if ($ta->semester==7){ echo "selected";} ?>>7</option>
                          <option value="8" <?php if ($ta->semester==8){ echo "selected";} ?>>8</option>
                          <option value="9" <?php if ($ta->semester==9){ echo "selected";} ?>>9</option>
                          <option value="10" <?php if ($ta->semester==10){ echo "selected";} ?>>10</option>
                          <option value="11" <?php if ($ta->semester==11){ echo "selected";} ?>>11</option>
                          <option value="12" <?php if ($ta->semester==12){ echo "selected";} ?>>12</option>
                          <option value="13" <?php if ($ta->semester==13){ echo "selected";} ?>>13</option>
                          <option value="14" <?php if ($ta->semester==14){ echo "selected";} ?>>14</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Topik Kerja Praktek</td>
                    <td><textarea class="form-control" name="topik_ta" ><?php echo $ta->topik_ta; ?></textarea></td>
                  </tr>
                  <tr>
                    <td>Dosen Pembimbing</td>
                    <td>
                      
                      <?php 
                        $nids = $ta->nid; 


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
                          <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_peng" value="<?php echo $ta->tanggal_peng; ?>">
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
                        <option value="<?php echo ($thn-1).'/'.$thn;?>" <?php if ($ta->tahun_akademik_peng == ($thn-1).'/'.$thn) { echo "selected"; } ?>><?php echo ($thn-1).'/'.$thn; ?></option>  
                        <?php $thn=$thn+1; } ?>
                        <?php for ($i=0; $i < 2 ; $i++) { ?>
                        <option value="<?php echo ($thn-1).'/'.$thn;?>" <?php if ($ta->tahun_akademik_peng == ($thn-1).'/'.$thn) { echo "selected"; } ?>><?php echo ($thn-1).'/'.$thn; ?></option>
                        <?php $thn=$thn+1; } ?>

                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Awal Bimbingan</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker1" name="tanggal_awal" value="<?php echo $ta->tanggal_awal; ?>">
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
                          <input type="text" class="form-control pull-right" id="datepicker3" name="tanggal_akhir" value="<?php echo $ta->tanggal_akhir; ?>">
                        </div>
                      </div> 
                    </td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios1" value="Dalam Bimbingan" type="radio" <?php if ($ta->status == 'Dalam Bimbingan') { echo 'checked'; } ?>>
                            Dalam Bimbingan
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios3" value="Lulus" type="radio" <?php if ($ta->status == 'Lulus') { echo 'checked'; } ?>>
                            Lulus
                          </label>
                        </div>
                      </div>                      
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Perpanjang Bimbingan</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker4" name="tanggal_panjang" value="<?php if($ta->tanggal_panjang != null){ echo $ta->tanggal_panjang; } ?>">
                        </div>
                      </div> 
                    </td>
                  </tr>
                  <tr>
                    <td>Batas Waktu</td>
                    <td><input class="form-control" name="batas_waktu" type="text" value="<?php echo $ta->batas_waktu; ?>"></td>
                  </tr>
                  <tr>
                    <td>IPK</td>
                    <td><input class="form-control" name="ipk" type="text" value="<?php echo $ta->ipk; ?>"></td>
                  </tr>
                  <tr>
                    <td>Topik Tugas Akhir Sebelumnya</td>
                    <td><textarea class="form-control" name="topik_ta_sebelum" ><?php echo $ta->topik_ta_sebelum; ?></textarea></td>
                  </tr>
                  <tr>
                    <td>Penguji 1</td>
                    <td><input class="form-control" name="penguji1" type="text" value="<?php echo $ta->penguji1; ?>"></td>
                  </tr>
                  <tr>
                    <td>Penguji 2</td>
                    <td><input class="form-control" name="penguji2" type="text" value="<?php echo $ta->penguji2; ?>"></td>
                  </tr>
                  <tr>
                    <td>Tanggal Sidang</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker5" name="tanggal_sidang" value="<?php if($ta->tanggal_sidang != null){ echo $ta->tanggal_sidang; } ?>">
                        </div>
                      </div> 
                    </td>
                  </tr>
                  <tr>
                    <td>Tempat Sidang</td>
                    <td><input class="form-control" name="tempat_sidang" type="text" value="<?php echo $ta->tempat_sidang; ?>"></td>
                  </tr>
                  <tr>
                    <td>Waktu Sidang</td>
                    <td>
                      <div class="bootstrap-timepicker">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="text" class="form-control timepicker" name="waktu_sidang" value="<?php echo $ta->waktu_sidang; ?>">
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                      </div>                      
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Yudisium</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker6" name="tanggal_yudisium" value="<?php if($ta->tanggal_yudisium != null){ echo $ta->tanggal_yudisium; } ?>">
                        </div>
                      </div> 
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Pra Sidang</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker7" name="tanggal_pra_sid" value="<?php if($ta->tanggal_pra_sid != null){ echo $ta->tanggal_pra_sid; } ?>">
                        </div>
                      </div> 
                    </td>
                  </tr>
                  <tr>
                    <td>Status Pra Sidang</td>
                    <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="status_pra_sid" id="optionsRadios1" value="Ya" type="radio" <?php if ($ta->status_pra_sid == 'Ya') { echo 'checked'; } ?>>
                            Ya
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status_pra_sid" id="optionsRadios2" value="Tidak" type="radio" <?php if ($ta->status_pra_sid == 'Ya') { echo 'checked'; } ?>>
                            Tidak
                          </label>
                        </div>
                      </div>
                    </td>                    
                  </tr>
                  <tr>
                    <td>Penguji Pra Sidang</td>
                    <td><input class="form-control" name="penguji_pra_sid" type="text" value="<?php echo $ta->penguji_pra_sid; ?>"></td>
                  </tr>
                  <tr>
                    <td>Waktu Pra Sidang</td>
                    <td>
                      <div class="bootstrap-timepicker">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="text" class="form-control timepicker" name="waktu_pra_sid" value="<?php echo $ta->waktu_pra_sid; ?>">
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                      </div>                      
                    </td>
                  </tr>
                  <tr>
                    <td>Tempat Pra Sidang</td>
                    <td><input class="form-control" name="tempat_pra_sid" type="text" value="<?php echo $ta->tempat_pra_sid; ?>" ></td>
                  </tr>
                  <tr>
                    <td>Semester Akademik Lulus</td>
                    <td>
                      <select class="form-control" name="semesterh_lulus" style="width: 100%;">
                          <option value="">-</option>
                          <option value="Ganjil" <?php if ($ta->semesterh_lulus=='Ganjil'){ echo "selected";} ?>>Ganjil</option>
                          <option value="Genap" <?php if ($ta->semesterh_lulus=='Genap'){ echo "selected";} ?>>Genap</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Tahun Akademik Lulus</td>
                    <td>
                      <?php $thn = 1999; $cthn = date('Y'); ?>
                      <select class="form-control select2" name="tahun_akademik_lulus" style="width: 100%;">
                        <option value="">-</option>
                        <?php while ($thn<=$cthn) { ?>
                        <option value="<?php echo ($thn-1).'/'.$thn;?>" <?php if ($ta->tahun_akademik_lulus == ($thn-1).'/'.$thn) { echo "selected"; } ?>><?php echo ($thn-1).'/'.$thn; ?></option>  
                        <?php $thn=$thn+1; } ?>
                        <?php for ($i=0; $i < 2 ; $i++) { ?>
                        <option value="<?php echo ($thn-1).'/'.$thn;?>" <?php if ($ta->tahun_akademik_lulus == ($thn-1).'/'.$thn) { echo "selected"; } ?>><?php echo ($thn-1).'/'.$thn; ?></option>
                        <?php $thn=$thn+1; } ?>

                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Proposal Tugas Akhir</td>
                    <td>
                      <input type="file" name="lampiran_proposal">
                      <br>
                      <div class="col-md-3">
                        <a href="<?php echo base_url().'files/ta/'.$ta->lampiran_proposal; ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download" ></i> DOWNLOAD</a>
                      </div>
                      
                    </td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td><textarea class="form-control" name="keterangan" ><?php echo $ta->keterangan; ?></textarea></td>
                  </tr>
                  <tr>
                    <td>Foto 3x4cm</td>
                    <td><input type="file" name="lampiran_foto">  <img src="<?php echo base_url().'files/ta/'.$ta->lampiran_foto; ?>" width="128px"></td>
                  </tr>
                </table>
              </div>
              <input type="hidden" name="id_ta" value="<?php echo $ta->id_ta; ?>">
              <input type="hidden" name="lampiran_foto_lm" value="<?php echo $ta->lampiran_foto; ?>">
              <input type="hidden" name="lampiran_proposal_lm" value="<?php echo $ta->lampiran_proposal; ?>">
              <div class="box-footer">
                <input class="btn btn-info pull-right" type="submit" value="Edit">
                <a href="<?php echo base_url().'listta' ?>" class="btn btn-info pull-left"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
                
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

