
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Akun
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Akun</h3>

              <div class="box-tools">
                <a href="<?php echo base_url().'admin/tambahakun'; ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-plus"></i> TAMBAH AKUN</a>
              </div>
            </div>

            <div class="box-body">
                <table id="example4" class="table table-bordered table-striped">
                  <thead>
                  
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Ka. Lab</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($datauser as $user): ?>
                  <tr>
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo $user->nama_user; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->level; ?></td>
                    <td>
                      <?php 
                        if ($user->konsentrasi == "") {
                          echo "-";
                        }else{ 
                          echo $user->konsentrasi;
                          } 
                      ?>
                    </td>
                    <td>
                      <center>
                        <a href="<?php echo base_url().'c_admin/editakun/'.$user->id; ?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Apa anda ini menghapus user id=<?php echo $user->id; ?> ini ');" href="<?php echo base_url().'c_admin/hapusakun/'.$user->id.'/'.$user->foto; ?>"><i class="fa fa-trash-o"></i></a>
                      </center>
                    </td>
                  </tr>  
                  <?php endforeach ?>
                  
                  </tbody>
                </table>
            </div>

          </div>          
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

