

<div style="min-height: 318px;" class="content-wrapper">
	    <div class="container">
	      <section class="content">
	      	<div class="col-md-1"></div>
	      	<div class="col-md-10">
	      		<?php echo form_open('c_front/getformkp'); ?>
				<div class="box">
		            <div class="box-header">
		              <center><h3 class="box-title">Masukan NPM</h3></center>
		            </div>
		            <div class="box-body">
		            	<div class="col-md-3"></div>
		            	<div class="col-md-6">
		            		<div class="input-group margin">
				                <input class="form-control" type="text" name="ceknpm" value="<?php if(isset($npm)) { echo $npm; } ?>" required <?php if(isset($cek)) {if($cek==false){if($npm!=null){echo "disabled";}}} ?>>
				                    <span class="input-group-btn">
				                      <input type="submit" class="btn btn-info btn-flat" value="Lanjut">
				                    </span>
				            </div>
		            	</div>
				                        		
				        <div class="col-md-3"></div>
		            </div>
		        </div>	
		        <?php echo form_close(); ?>

		        <?php if (isset($cek)){ if($cek==false){ if($npm!=null){?>
		              			
		              		
	      		<?php echo form_open_multipart('c_front/proses_inputkp'); ?>
	      		<div class="box box-default">
		          <div class="box-header with-border">
		            <h3 class="box-title">Formulir Pengajuan Kerja Praktek</h3>
		            <small>   <?php if (isset($lempar)) {echo $lempar;}?></small>
		          </div>
		          <div class="box-body">

		            <table class="table">
		            	<tr>
		            		<td>Nama</td>
		            		<td><input class="form-control" name="nama_mahasiswa" type="text" required></td>
		            	</tr>
		            	<tr>
		            		<td>NPM/NIM</td>
		            		<td><?php echo $npm; ?><input name="npm" type="hidden" value="<?php echo $npm; ?>"></td>
		            	</tr>
		            	<tr>
		            		<td>Semester</td>
		            		<td>
		            			<select class="form-control" name="semester" style="width: 100%;">
		            				<option value="7">5</option>
					                <option value="8">6</option>
					                <option value="7">7</option>
					                <option value="8">8</option>
					                <option value="9">9</option>
					                <option value="10">10</option>
					                <option value="11">11</option>
					                <option value="12">12</option>
					                <option value="13">13</option>
					                <option value="14">14</option>
					            </select>
		            		</td>
		            	</tr>
		            	<tr>
		            		<td>Alamat</td>
		            		<td><textarea class="form-control" name="alamat" required></textarea></td>
		            	</tr>
		            	<tr>
		            		<td>Telepon</td>
		            		<td><input class="form-control" name="telepon" type="text" required></td>
		            	</tr>
		            	<tr>
		            		<td>Email</td>
		            		<td><input class="form-control" name="email" type="email" required></td>
		            	</tr>
		            	<tr>
		            		<td>Topik Kerja Praktek</td>
		            		<td><textarea class="form-control" name="topik_kp" required></textarea></td>
		            	</tr>
		            	<tr>
		            		<td>Usulan Pembimbing</td>
		            		<td>
				                <div class="form-group">
					                <select class="form-control select2" name="pembimbing1" data-placeholder="Usulan Pembimbing 1" style="width: 100%;">
					                	<?php foreach ($listdosen as $dosen) { ?>
					                  	<option value="<?php echo $dosen->nid.'|'.$dosen->nama_dosen.'|'.$dosen->nidn; ?>"><?php echo $dosen->nama_dosen; ?></option>
					                    <?php } ?>
					                </select>
				            	</div>
				                <div class="form-group">
					                <select class="form-control select2_1" name="pembimbing2" data-placeholder="Usulan Pembimbing 2" style="width: 100%;">
					                	<option>-</option>
					                	<?php foreach ($listdosen as $dosen) { ?>
					                  	<option value="<?php echo $dosen->nid.'|'.$dosen->nama_dosen.'|'.$dosen->nidn; ?>"><?php echo $dosen->nama_dosen; ?></option>
					                  	<?php } ?>
					                </select>
				            	</div>
		            		</td>
		            	</tr>
		            	<tr>
		            		<td>Nama Perusahaan/Inst</td>
		            		<td><input class="form-control" name="nama_perusahaan" type="text" required></td>
		            	</tr>
		            	<tr>
		            		<td>Alamat Perusahaan/Inst</td>
		            		<td><textarea class="form-control" name="alamat_perusahaan" required></textarea></td>
		            	</tr>
		            	<tr>
		            		<td>Pembimbing Lapangan</td>
		            		<td><input class="form-control" name="pembimbinglap" type="text" required></td>
		            	</tr>
		            	<tr>
		            		<td>Jumlah SKS yang sudah lulus</td>
		            		<td>
		            			<?php $jumlah_sks = 70; ?>
		            			<select class="form-control select2" name="jumlah_sks" placeholder="Untuk mengajukan kerja praktek dibutuhkan 120 SKS lulus" style="width: 100%;">
		            				<?php while ($jumlah_sks<=137) { ?>
		            					<option value="<?php echo $jumlah_sks ?>"><?php echo $jumlah_sks ?></option>	
		            				<?php $jumlah_sks++; } ?>
					            </select>
					            <br>
					            <small>Untuk mengajukan kerja praktek dibutuhkan 120 SKS lulus</small>
		            		</td>
		            	</tr>
		            </table>
		            <br>
		            <h4>Lampiran persyaratan kerja praktek</h4>
		            <table class="table">
		            	<tr>
		            		<td>Foto copy Bukti Pembayaran Kuliah dan FRS (yang mencantumkan Kerja Praktek)</td>
		            		<td><input type="file" name="lampiran1" required></td>
		            	</tr>
		            	<tr>
		            		<td>Daftar Nilai (transkrip akademik) terbaru</td>
		            		<td><input type="file" name="lampiran2" required></td>
		            	</tr>
		            	<tr>
		            		<td>Foto diri ukuran 3x4cm</td>
		            		<td><input type="file" name="lampiran3" required></td>
		            	</tr>
		            </table>
		          </div>
		          <div class="box-footer">
		          	<input type="submit" class="btn btn-info pull-right" value="Kirim">
		          </div>
		        </div>
		        <?php echo form_close(); ?>

		        <?php }else{ echo "<br><br><br><br><center><h2>Mau ngecheat yah! :D Jangan dong ! Masukin aja NPM nya, OK :)</h2></center>"; } }else{ echo "<br><br><br><br><center><h1>Data anda sudah terdaftar dalam sistem kami</h1></center>"; }} ?>
	      	</div>
	        <div class="col-md-1"></div>
	      </section>
		</div>
</div>
