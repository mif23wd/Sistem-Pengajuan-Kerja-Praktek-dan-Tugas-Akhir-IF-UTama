<?php echo form_open_multipart('c_admin/addta'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Tugas Akhir
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Tugas Akhir</h3>
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
                    <td>Tempat Tanggal Lahir</td>
                    <td>
                      <div class="col-xs-3">
                          <input class="form-control" name="tempat_lahir" type="text" placeholder="Tempat Lahir" required>
                        </div>
                        <div class="col-xs-9">
                            <div class="form-group">
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker2" placeholder="Tanggal Lahir" name="tanggal_lahir" >
                              </div>
                            </div> 
                        </div>
                    </td>
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
                    <td>Konsentrasi</td>
                    <td>
                      <select class="form-control" name="konsentrasi" style="width: 100%;">
                          <option value="Applied Database">Applied Database</option>
                          <option value="Applied Networking">Applied Networking</option>
                          <option value="Information Technology">Information Technology</option>
                          <option value="Game dan Multimedia">Game dan Multimedia</option>
                          <option value="Interfacing System">Interfacing System</option>
                      </select>
                    </td>
                  </tr>                  
                  <tr>
                    <td>Semester</td>
                    <td>
                      <select class="form-control" name="semester" style="width: 100%;">
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
                    <td>Topik Tugas Akhir</td>
                    <td><textarea class="form-control" name="topik_ta" ></textarea></td>
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
                    <td>Tanggal Awal Bimbingan</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker1" name="tanggal_awal" value="<?php if(date('m')<=7){ echo date('Y')."-02-10";} else{echo date('Y')."-08-10";}  ?>" >
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
                          <input type="text" class="form-control pull-right" id="datepicker3" name="tanggal_akhir" value="<?php if(date('m')<=7){ echo date('Y')."-08-10";} else{echo (date('Y')+1)."-02-10";} ?>">
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
                            <input name="status" id="optionsRadios1" value="Dalam Bimbingan" type="radio" checked>
                            Dalam Bimbingan
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
                    <td>Tanggal Perpanjang Bimbingan</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker4" name="tanggal_panjang" >
                        </div>
                      </div> 
                    </td>
                  </tr>
                  <tr>
                    <td>Batas Waktu</td>
                    <td><input class="form-control" name="batas_waktu" type="text" ></td>
                  </tr>
                  <tr>
                    <td>IPK</td>
                    <td><input class="form-control" name="ipk" type="text" ></td>
                  </tr>
                  <tr>
                    <td>Topik Tugas Akhir Sebelumnya</td>
                    <td><textarea class="form-control" name="topik_ta_sebelum" ></textarea></td>
                  </tr>
                  <tr>
                    <td>Penguji 1</td>
                    <td><input class="form-control" name="penguji1" type="text"></td>
                  </tr>
                  <tr>
                    <td>Penguji 2</td>
                    <td><input class="form-control" name="penguji2" type="text" ></td>
                  </tr>
                  <tr>
                    <td>Tanggal Sidang</td>
                    <td>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker5" name="tanggal_sidang">
                        </div>
                      </div> 
                    </td>
                  </tr>
                  <tr>
                    <td>Tempat Sidang</td>
                    <td><input class="form-control" name="tempat_sidang" type="text" ></td>
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
                            <input type="text" class="form-control timepicker" name="waktu_sidang" >
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
                          <input type="text" class="form-control pull-right" id="datepicker6" name="tanggal_yudisium" >
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
                          <input type="text" class="form-control pull-right" id="datepicker7" name="tanggal_pra_sid" >
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
                            <input name="status_pra_sid" id="optionsRadios1" value="Ya" type="radio" checked>
                            Ya
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status_pra_sid" id="optionsRadios2" value="Tidak" type="radio" >
                            Tidak
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Penguji Pra Sidang</td>
                    <td><input class="form-control" name="penguji_pra_sid" type="text"></td>
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
                            <input type="text" class="form-control timepicker" name="waktu_pra_sid" >
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                      </div>                      
                    </td>
                  </tr>
                  <tr>
                    <td>Tempat Pra Sidang</td>
                    <td><input class="form-control" name="tempat_pra_sid" type="text"></td>
                  </tr>
                  <tr>
                    <td>Semester Akademik Lulus</td>
                    <td>
                      <select class="form-control" name="semesterh_lulus" style="width: 100%;">
                          <option value="">-</option>
                          <option value="Ganjil">Ganjil</option>
                          <option value="Genap">Genap</option>
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
                        <option value="<?php echo ($thn-1).'/'.$thn;?>"><?php echo ($thn-1).'/'.$thn; ?></option>  
                        <?php $thn=$thn+1; } ?>
                        <?php for ($i=0; $i < 2 ; $i++) { ?>
                        <option value="<?php echo ($thn-1).'/'.$thn;?>"><?php echo ($thn-1).'/'.$thn; ?></option>
                        <?php $thn=$thn+1; } ?>

                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Proposal Tugas Akhir</td>
                    <td>
                      <input type="file" name="lampiran_proposal">
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td><textarea class="form-control" name="keterangan" ></textarea></td>
                  </tr>
                  <tr>
                    <td>Foto 3x4cm</td>
                    <td><input type="file" name="lampiran_foto"></td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <input class="btn btn-info pull-right" type="submit" value="Tambah">
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


<?php echo form_close(); ?>

