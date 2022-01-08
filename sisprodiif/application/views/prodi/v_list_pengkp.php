
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Pengajuan Kerja Praktek
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

		<div class="row">
	        <div class="col-xs-12">

	          <div class="box">
	            <div class="box-body">
	              <table id="example3" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>No</th>
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
		                  <td><?php echo $kp->id; ?></td>
		                  <td><?php echo $kp->npm; ?></td>
		                  <td><?php echo $kp->nama_mahasiswa; ?></td>
		                  <td><?php echo $kp->topik_kp; ?></td>
		                  <td><?php echo $kp->status; ?></td>
		                  <td>
		                  	<center>
		                  		<?php if ($kp->status == "Tunggu") { ?>
		                  			<a href="<?php echo base_url().'c_prodi/aformkp/'.$kp->id; ?>"> <i class="glyphicon glyphicon-pencil"></i></a>
		                  		<?php } else{ ?>
		                  			<a href="<?php echo base_url().'c_prodi/viewpkp/'.$kp->id; ?>"> <i class="glyphicon glyphicon-search"></i></a>
		                  		<?php } ?>
		                  	</center>
		                  </td>
		                </tr>
		                <?php } ?>
	                </tbody>
	              </table>
	            </div>
	            <!-- /.box-body -->
	          </div>
            <!-- nav-tabs-custom -->
	        </div>
	        <!-- /.col -->
	    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

