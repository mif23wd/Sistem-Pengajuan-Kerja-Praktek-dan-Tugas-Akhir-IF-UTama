
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Tugas Akhir
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	    <div class="row">
	    	<div class="col-xs-12">
	    	  <div class="box">
	            <!-- /.box-header -->
	            <div class="box-body">
	            	<div class="col-md-12">
	            		<table class="table">
	            			<?php echo form_open('c_admin/exportxlstasort'); ?>
		            		<tr>
		            			<td class="pull-right"><input type="submit" class="btn btn-info pull-right" value="Ambil Data"></td>
		            			
		            			<td class="pull-right">
									<div class="form-group">
					                  <select name="tahun_akademik" class="form-control">
					                  	
					                  	<?php foreach ($tahun as $t): ?>
					                  	<option><?php echo $t->thn; ?></option>	
					                  	<?php endforeach ?>
					                    
					                  </select>
					                </div>
		            			</td>
		            			<td class="pull-right">
		            				<div class="form-group">
					                  <select name="semesterh" class="form-control">
					                    <option>Ganjil</option>
					                    <option>Genap</option>
					                  </select>
					                </div>
		            			</td>
		            			<td class="pull-left"><h4 class="box-title">Ambil Data Lulus Excel Berdasarkan Tahun Akademik</h4></td>
		            		</tr>
		            		<?php echo form_close(); ?>
		            	</table>
	            	</div>
	            </div>
	            <!-- /.box-body -->
	          </div>    
	          <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Tugas Akhir</h3>

	              <div class="box-tools pull-right">
	              	<a href="<?php echo base_url(); ?>c_admin/exportxlsta" class="btn btn-box-tool ">AMBIL DATA EXCEL</a>
	                <a href="<?php echo base_url(); ?>admin/tambahta" class="btn btn-box-tool "><i class="fa fa-plus"></i> TAMBAH DATA TUGAS AKHIR</a>
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
	                  <th>Konsentrasi</th>
	                  <th>Topik</th>
	                  <th>Dosen Pembimbing</th>
	                  <th>Status</th>
	                  <th>Action</th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php foreach ($datata as $ta) { ?>
	                <tr>
	                  <td><?php echo $ta->id_ta; ?></td>
	                  <td><?php echo $ta->npm; ?></td>
	                  <td><?php echo $ta->nama_mahasiswa; ?></td>
	                  <td><?php echo $ta->konsentrasi; ?></td>
	                  <td><?php echo $ta->topik_ta; ?></td>
	                  <td><?php echo $ta->pembimbing_ta; ?></td>
	                  <td><?php echo $ta->status; ?></td>
	                  <td><center><a href="<?php echo base_url().'c_admin/viewta/'.$ta->id_ta; ?>"> <i class="glyphicon glyphicon-search"></i></a><a onclick="return confirm('Apa anda ini menghapus data tugas akhir id=<?php echo $ta->id_ta; ?> ini ');" href="<?php echo base_url().'c_admin/hapusdta/'.$ta->id_ta.'/'.$ta->lampiran_foto.'/'.$ta->lampiran_proposal; ?>"> <i class="glyphicon glyphicon-trash"></i></a></center></td>
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

