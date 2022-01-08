<?php echo form_open_multipart('c_dosen/setting_akun'); ?>
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
                <h3 class="box-title">Setting Akun</h3>
                <small><?php if (isset($notif)){ echo $notif; } ?></small>
              </div>
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td>Password Lama</td>
                    <td><input class="form-control" name="passwordlama" type="password"></td>
                  </tr>
                  <tr>
                    <td>Password Baru</td>
                    <td><input class="form-control" name="passwordbaru" type="password"</td>
                  </tr>
                  <tr>
                    <td>Password Konfirmasi</td>
                    <td><input class="form-control" name="confirmpasswordbaru" type="password"></td>
                  </tr>
                  <tr>
                    <td>Foto Profil</td>
                    <td>
                      <input type="file" name="foto">
                      <img src="<?php echo base_url().'files/user/'.$this->session->userdata('foto'); ?>" width="128px">
                    </td>
                  </tr>
                </table>
                <input type="hidden" name="id" value="<?php echo $this->session->userdata('id'); ?>">
                <input type="hidden" name="foto_lm" value="<?php echo $this->session->userdata('foto'); ?>">
                <input type="hidden" name="password_lm" value="<?php echo $this->session->userdata('password'); ?>">
              </div>
              <div class="box-footer">
                <input class="btn btn-info pull-right" type="submit" value="Edit">
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

