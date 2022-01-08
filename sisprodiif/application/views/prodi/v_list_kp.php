
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Kerja Praktek
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	    <div class="row">
	    	<div class="col-xs-12">
	          <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Kerja Praktek</h3>

	              <div class="box-tools pull-right">
	              	<a href="<?php echo base_url(); ?>c_prodi/exportxlskp" class="btn btn-box-tool ">AMBIL DATA EXCEL</a>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="example3" class="table table-bordered table-striped">
	                <thead>
	                
	                <tr>
	                  <th>No</th>
	                  <th>NPM</th>
	                  <th>Nama</th>
	                  <th>Topik</th>
	                  <th>Dosen Pembimbing</th>
	                  <th>Status</th>
	                  <th>Action</th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php foreach ($datakp as $kp) { ?>
	                <tr>
	                  <td><?php echo $kp->id_kp; ?></td>
	                  <td><?php echo $kp->npm; ?></td>
	                  <td><?php echo $kp->nama_mahasiswa; ?></td>
	                  <td><?php echo $kp->topik_kp; ?></td>
	                  <td><?php echo $kp->pembimbing_kp; ?></td>
	                  <td><?php echo $kp->status; ?></td>
	                  <td><center><a href="<?php echo base_url().'c_prodi/viewkp/'.$kp->id_kp; ?>"> <i class="glyphicon glyphicon-search"></i></a></center></td>
	                </tr>
	                <?php } ?>
	                </tbody>
	              </table>
	            </div>
	            <!-- /.box-body -->
	          </div>    
			</div>
	    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

