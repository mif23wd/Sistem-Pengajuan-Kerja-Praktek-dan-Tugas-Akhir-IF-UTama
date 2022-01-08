<?php echo form_open_multipart('c_admin/addkp'); ?>
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Kerja Praktek 
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Kerja Pratek</h3>
              </div>
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td>Nama Mahasisiwa</td>
                    <td><input class="form-control" name="nama_mahasiswa" type="text"></td>
                  </tr>
                  <tr>
                    <td>NPM/NIM</td>
                    <td><input class="form-control" name="npm" type="text"></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><textarea class="form-control" name="alamat"></textarea></td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td><input class="form-control" name="telepon" type="text"></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><input class="form-control" name="email" type="email"></td>
                  </tr>
                  <tr>
                    <td>Semester</td>
                    <td>
                      <select class="form-control" name="semester" style="width: 100%;">
                          <option value="">-</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Topik Kerja Praktek</td>
                    <td><textarea class="form-control" name="topik_kp"></textarea></td>
                  </tr>
                  <tr>
                    <td>Dosen Pembimbing</td>
                    <td>
                      <div class="form-group">
                          <select class="form-control select2" name="pembimbing" data-placeholder="Dosen Pembimbing" style="width: 100%;">
                           
                            <?php foreach ($listdosen as $dosen) { ?>
                            <option value="<?php echo $dosen->nid.'|'.$dosen->nama_dosen.'|'.$dosen->nidn; ?>"><?php echo $dosen->nama_dosen; ?></option>
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
                          <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_peng" value="<?php echo date('Y-m-d'); ?>">
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
                        <option value="<?php echo ($thn-1).'/'.$thn;?>"><?php echo ($thn-1).'/'.$thn; ?></option>  
                        <?php $thn=$thn+1; } ?>
                        <?php for ($i=0; $i < 2 ; $i++) { ?>
                        <option value="<?php echo ($thn-1).'/'.$thn;?>"><?php echo ($thn-1).'/'.$thn; ?></option>
                        <?php $thn=$thn+1; } ?>

                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Perusahaan/Inst</td>
                    <td><input class="form-control" name="nama_perusahaan" type="text"></td>
                  </tr>
                  <tr>
                    <td>Alamat Perusahaan/Inst</td>
                    <td><textarea class="form-control" name="alamat_perusahaan"></textarea></td>
                  </tr>
                  <tr>
                    <td>Pembimbing Lapangan</td>
                    <td><input class="form-control" name="pembimbinglap" type="text"></td>
                  </tr>
                  <tr>
                    <td>Tanggal Awal Bimbingan</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker1" name="tanggal_awal" value="<?php if(date('m')<=7||date('m')>=2){ echo date('Y')."-02-10";} else{echo date('Y')."-08-10";}  ?>">
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
                          <input type="text" class="form-control pull-right" id="datepicker2" name="tanggal_akhir" value="<?php if(date('m')<=7||date('m')>=2){ echo date('Y')."-08-10";} else{echo (date('Y')+1)."-02-10";} ?>">
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
                          <input type="text" class="form-control pull-right" id="datepicker3" name="tanggal_laporan">
                        </div>
                      </div> 
                    </td>

                  </tr>
                  <tr>
                    <td>Semester selesai Kerja Praktek</td>
                    <td>
                      <select class="form-control" name="semester_akhir" style="width: 100%;">
                          <option value="">-</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios1" value="Dalam Bimbingan" type="radio" checked="">
                            Dalam Bimbingan
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios2" value="Perpanjang" type="radio" >
                            Perpanjang
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios3" value="Lulus" type="radio" >
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
                            <input name="status_selesai" id="optionsRadios1" value="" type="radio">
                            Dalam Bimbingan
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status_selesai" id="optionsRadios2" value="Pembimbing Ok" type="radio">
                            Pembimbing Ok
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status_selesai" id="optionsRadios3" value="Sidang" type="radio">
                            Sidang
                          </label>
                        </div>
                      </div>                            
                    </td>
                  </tr>
                  <tr>
                    <td>Nilai (Angka)</td>
                    <td><input class="form-control" name="nilai" type="number"></td>
                  </tr>
                  <tr>
                    <td>Tahun Akademik Lulus</td>
                    <td>
                      <?php $thn = 1999; $cthn = date('Y'); ?>
                      <select class="form-control select2" name="tahun_akademik_lulus" style="width: 100%;">
                        <option value="">-</option>
                        <?php while ($thn<=$cthn) { ?>
                        <option value="<?php echo ($thn-1).'/'.$thn;?>"><?php echo ($thn-1).'/'.$thn; ?></option>  
                        <?php $thn=$thn+1; } ?>
                        <?php for ($i=0; $i < 2 ; $i++) { ?>
                        <option value="<?php echo ($thn-1).'/'.$thn;?>"><?php echo ($thn-1).'/'.$thn; ?></option>
                        <?php $thn=$thn+1; } ?>

                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Topik Kerja Praktek Sebelumnya</td>
                    <td><textarea class="form-control" name="topik_kp_sebelum"></textarea></td>
                  </tr>
                  <tr>
                    <td>Perusahaan Sebelumnya</td>
                    <td><input class="form-control" name="perusahaan_sebelum" type="text"></td>
                  </tr>
                  <tr>
                    <td>Foto 3x4cm</td>
                    <td><input type="file" name="lampiran_foto"></td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <input class="btn btn-info pull-right" type="submit" value="Tambah">
                <a href="<?php echo base_url().'listkp' ?>" class="btn btn-info pull-left"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
                
                
              </div>
            </div>
          </div>
          <div class="col-md-1"></div>       
      </div>

    </section>
    <!-- /.content -->
  </div>


<?php echo form_close(); ?>
