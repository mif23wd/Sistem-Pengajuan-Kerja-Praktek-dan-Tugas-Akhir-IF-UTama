<?php echo form_open_multipart('c_admin/edit_user'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <?php foreach ($datauser as $user): ?>
      <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Akun</h3>
              </div>
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td>Level</td>
                    <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="level" id="optionsRadios1" value="Prodi" type="radio" <?php if ($user->level=="Prodi"){echo "checked";} ?>>
                            Prodi
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="level" id="optionsRadios2" value="Dosen" type="radio" <?php if ($user->level=="Dosen"){echo "checked";} ?>>
                            Dosen
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="level" id="optionsRadios3" value="Admin" type="radio" <?php if ($user->level=="Admin"){echo "checked";} ?>>
                            Admin
                          </label>
                        </div>
                      </div>                      
                    </td>
                  </tr>                
                  <tr>
                    <td>Username</td>
                    <td><input class="form-control" name="username" type="text" value="<?php echo $user->username; ?>" required></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td><input class="form-control" name="password" type="text" required></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td><input class="form-control" name="nama_user" type="text" value="<?php if ($user->level!='Dosen'){echo $user->nama_user;} ?>" > <small>Isi jika user prodi atau admin</small></td>
                  </tr> 
                  <tr>
                    <?php 
                        $nids = $user->nid; 


                      ?>
                    <td>Nama Dosen</td>
                    <td>
                      <div class="form-group">
                          <select class="form-control select2" name="dosen" style="width: 100%;">
                            <option></option>
                            <?php foreach ($listdosen as $dosen) { ?>
                            <option value="<?php echo $dosen->nid.'|'.$dosen->nama_dosen.'|'.$dosen->jenis_bimbingan; ?>" <?php if ($nids == $dosen->nid){echo "selected";} ?>><?php echo $dosen->nama_dosen; ?></option>
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
                          <option value="Applied Database" <?php if ($user->konsentrasi=="Applied Database"){echo "selected";} ?>>Applied Database</option>
                          <option value="Applied Networking"  <?php if ($user->konsentrasi=="Applied Networking"){echo "selected";} ?>>Applied Networking</option>
                          <option value="Information Technology" <?php if ($user->konsentrasi=="Information Technology"){echo "selected";} ?>>Information Technology</option>
                          <option value="Game dan Multimedia" <?php if ($user->konsentrasi=="Game dan Multimedia"){echo "selected";} ?>>Game dan Multimedia</option>
                          <option value="Interfacing System" <?php if ($user->konsentrasi=="Interfacing System"){echo "selected";} ?>>Interfacing System</option>
                      </select>
                      <small>isi jika user dosen kepala lab konsentrasi</small>
                    </td>
                  </tr>
                  <tr>
                    <td>Foto Profil</td>
                    <td>
                      <input type="file" name="foto">
                      <img src="<?php echo base_url().'files/user/'.$user->foto; ?>" width="128px">
                      <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                      <input type="hidden" name="foto_lm" value="<?php echo $user->foto; ?>">
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <input class="btn btn-info pull-right" type="submit" value="Edit">
              </div>
            </div>
          </div>
          <div class="col-md-3"></div>       
      </div>
      <?php endforeach ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php echo form_close(); ?>

