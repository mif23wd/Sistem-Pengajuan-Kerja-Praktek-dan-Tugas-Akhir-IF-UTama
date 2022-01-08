
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $hitungtal; ?></h3>

              <p>Data TA Lulus</p>
            </div>
            <div class="icon">
              <i class="ion ion-document"></i>
            </div>
            <a href="<?php echo base_url() ?>prodi/listta" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $hitungkpl; ?></h3>

              <p>Data KP Lulus</p>
            </div>
            <div class="icon">
              <i class="ion ion-document"></i>
            </div>
            <a href="<?php echo base_url() ?>prodi/listkp" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $hitungtanl; ?></h3>

              <p>Data TA berlangsung</p>
            </div>
            <div class="icon">
              <i class="ion ion-document"></i>
            </div>
            <a href="<?php echo base_url() ?>prodi/listta" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $hitungkpnl; ?></h3>

              <p>Data TA berlangsung</p>
            </div>
            <div class="icon">
              <i class="ion ion-document"></i>
            </div>
            <a href="<?php echo base_url() ?>prodi/listkp" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pengajuan Kerja Praktek</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Topik</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datakp as $kp) {?>
                <tr>
                  <td><?php echo $kp->npm; ?></td>
                  <td><?php echo $kp->nama_mahasiswa; ?></td>
                  <td><?php echo $kp->topik_kp; ?></td>
                  <td><?php echo $kp->status; ?></td>
                  <td><center><a href="<?php echo base_url().'c_prodi/aformkp/'.$kp->id; ?>"> <i class="glyphicon glyphicon-pencil"></i></a></center></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pull-right">
                <a href="<?php echo base_url()?>prodi/listpengajuankp" type="button" class="btn btn-block btn-default btn-sm"><?php $sisa = $jpengkp-4; if ($jpengkp>=4){echo "Ada ".$sisa." Pengajuan lain yang baru masuk";}else{echo "Lihat Selengkapnya";} ?></a>
              </div>
            </div>
          </div>          
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pengajuan Tugas Akhir</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Konsentrasi</th>
                  <th>Topik</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datata as $ta) {?>
                <tr>
                  <td><?php echo $ta->npm; ?></td>
                  <td><?php echo $ta->nama_mahasiswa; ?></td>
                  <td><?php echo $ta->konsentrasi; ?></td>
                  <td><?php echo $ta->topik_ta; ?></td>
                  <td><?php echo $ta->status; ?></td>
                  <td><center><a href="<?php echo base_url().'c_prodi/aformta/'.$ta->id; ?>"> <i class="glyphicon glyphicon-pencil"></i></a></center></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pull-right">
                <a href="<?php echo base_url()?>prodi/listpengajuanta" type="button" class="btn btn-block btn-default btn-sm"><?php $sisa = $jpengta-4; if ($jpengta>=4){echo "Ada ".$sisa." Pengajuan lain yang baru masuk";}else{echo "Lihat Selengkapnya";} ?></a>
              </div>
            </div>
          </div>          
        </div>       
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

