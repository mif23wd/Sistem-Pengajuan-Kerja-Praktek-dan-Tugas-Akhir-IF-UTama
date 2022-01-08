
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Pengajuan Tugas Akhir
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
	                  <th>Konsentrasi</th>
	                  <th>Topik</th>
	                  <th>Status</th>
	                  <th>Action</th>
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
		                  <td>
		                  	<center>
		                  		<?php if ($ta->status == "Tunggu") { ?>
		                  			<a href="<?php echo base_url().'c_prodi/aformta/'.$ta->id; ?>"> <i class="glyphicon glyphicon-pencil"></i></a>
		                  		<?php } else{ ?>
		                  			<a href="<?php echo base_url().'c_prodi/viewpta/'.$ta->id; ?>"> <i class="glyphicon glyphicon-search"></i></a>
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

