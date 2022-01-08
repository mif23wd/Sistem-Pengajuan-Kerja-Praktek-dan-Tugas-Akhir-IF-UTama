 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Pengajuan Tugas Akhir dan Kerja Praktek
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-body">
              <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Catatan</h4>
                <p>Anda bisa cek pengajuan anda dengan memasukan npm anda pada kolom search.</p>
                <p>Apabila pengajuan anda diterima. Temui bagian Staff Administrasi Prodi untuk meminta dicetakan kartu bimbingan</p>
              </div>
            </div>
            <!-- /.box-body -->
        </div>
      </div>
    </div>

    <div class="row">
          <div class="col-xs-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Tugas Akhir</a></li>
                <li><a href="#tab_2" data-toggle="tab">Kerja Praktek</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                <div class="box">
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Konsentrasi</th>
                        <th>Topik</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($datata as $ta) {?>
                      <tr>
                        <td><?php echo $ta->id; ?></td>
                        <td><?php echo $ta->npm; ?></td>
                        <td><?php echo $ta->nama_mahasiswa; ?></td>
                        <td><?php echo $ta->konsentrasi; ?></td>
                        <td><?php echo $ta->topik_ta; ?></td>
                        <td><?php echo $ta->status; ?></td>
                      </tr>
                      <?php } ?>       
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                <div class="box">
                  <div class="box-body">
                    <table id="example3" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Topik</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($datakp as $kp) {?>
                      <tr>
                        <td><?php echo $kp->id; ?></td>
                        <td><?php echo $kp->npm; ?></td>
                        <td><?php echo $kp->nama_mahasiswa; ?></td>
                        <td><?php echo $kp->topik_kp; ?></td>
                        <td><?php echo $kp->status; ?></td>
                      </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
          </div>
          <!-- /.col -->
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->