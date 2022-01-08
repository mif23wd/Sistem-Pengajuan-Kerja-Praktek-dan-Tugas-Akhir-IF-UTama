<?php echo form_open_multipart('c_admin/tambah_dosen'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Dosen</h3>
              </div>
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td>Nama Dosen</td>
                    <td><input class="form-control" name="nama_dosen" type="text" required></td>
                  </tr>
                  <tr>
                    <td>NID</td>
                    <td><input class="form-control" name="nid" type="text" required></td>
                  </tr>
                  <tr>
                    <td>NIDN</td>
                    <td><input class="form-control" name="nidn" type="text" required></td>
                  </tr>
                  <tr>
                    <td>Jenis Bimbingan</td>
                    <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="jenis_bimbingan" id="optionsRadios1" value="Kerja Praktek" type="radio" checked>
                            Kerja Praktek
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="jenis_bimbingan" id="optionsRadios2" value="Tugas Akhir" type="radio" >
                            Tugas Akhir
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="jenis_bimbingan" id="optionsRadios3" value="Both" type="radio" >
                            Kerja Pratek/ Tugas Akhir
                          </label>
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
                            <input name="status" id="optionsRadios1" value="Aktif" type="radio" checked>
                            Aktif
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios2" value="Tidak Aktif" type="radio" >
                            Tidak Aktif
                          </label>
                        </div>
                      </div>                      
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <input class="btn btn-info pull-right" type="submit" value="Tambah">
              </div>
            </div>
          </div>
          <div class="col-md-3"></div>       
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php echo form_close(); ?>

