<?php echo form_open_multipart('c_admin/tambah_user'); ?>
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
                <h3 class="box-title">Tambah Akun</h3>
              </div>
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td>Level</td>
                    <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="level" id="optionsRadios1" value="Prodi" type="radio" checked>
                            Prodi
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="level" id="optionsRadios2" value="Dosen" type="radio" >
                            Dosen
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="level" id="optionsRadios3" value="Admin" type="radio" >
                            Admin
                          </label>
                        </div>
                      </div>                      
                    </td>
                  </tr>                  
                  <tr>
                    <td>Username</td>
                    <td><input class="form-control" name="username" type="text" required></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td><input class="form-control" name="password" type="text" required></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td><input class="form-control" name="nama_user" type="text"> <small>Isi jika user prodi atau admin</small></td>
                  </tr> 
                  <tr>
                    <td>Nama Dosen</td>
                    <td>
                      <div class="form-group">
                          <select class="form-control select2" name="dosen" style="width: 100%;">
                           
                            <?php foreach ($listdosen as $dosen) { ?>
                            <option value="<?php echo $dosen->nid.'|'.$dosen->nama_dosen.'|'.$dosen->jenis_bimbingan; ?>"><?php echo $dosen->nama_dosen; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <small>Isi jika user dosen</small>
                    </td>
                  </tr>                 
                  <tr>
                    <td>Konsentrasi</td>
                    <td>
                      <select class="form-control" name="konsentrasi" style="width: 100%;">
                          <option></option>
                          <option value="Applied Database">Applied Database</option>
                          <option value="Applied Networking">Applied Networking</option>
                          <option value="Information Technology">Information Technology</option>
                          <option value="Game dan Multimedia">Game dan Multimedia</option>
                          <option value="Interfacing System">Interfacing System</option>
                      </select>
                      <small>isi jika user dosen kepala lab konsentrasi</small>
                    </td>
                  </tr>
                  <tr>
                    <td>Foto Profil</td>
                    <td><input type="file" name="foto"></td>
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

