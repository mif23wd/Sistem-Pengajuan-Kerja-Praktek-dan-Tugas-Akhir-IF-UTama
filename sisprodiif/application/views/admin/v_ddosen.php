
  <div class="content-wrapper">

    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Dosen</h3>
              <div class="pull-right"><a href="<?php echo base_url().'admin/tambahdosen'; ?>" type="button" class="btn btn-block btn-default btn-sm"><i class="fa fa-plus"></i> Tambah Data Dosen</a></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Dosen</th>
                  <th>NID</th>
                  <th>NIDN</th>
                  <th>Jenis Bimbingan</th>
                  <th>Status</th>
                  <th>Jlh Bimbingan KP (Berlangsung) </th>
                  <th>Jlh Bimbingan TA (Berlangsung) </th>
                  <th>Jlh Bimbingan KP (Lulus)</th>
                  <th>Jlh Bimbingan TA (Lulus)</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datadosen as $dosen): ?>
                <tr>
                  <td><?php echo $dosen->id_dosen; ?></td>
                  <td><?php echo $dosen->nama_dosen; ?></td>
                  <td><?php echo $dosen->nid; ?></td>
                  <td><?php echo $dosen->nidn; ?></td>
                  <td><?php if ($dosen->jenis_bimbingan=="Both") {echo "Kerja Praktek/ Tugas Akhir";}else{echo $dosen->jenis_bimbingan;}?></td>
                  <td><?php echo $dosen->status; ?></td>

                  <?php
                    $data2 = $this->m_model->getstatkp2($dosen->nid,'Lulus'); 
                  ?>
                  <?php foreach ($data2->result() as $kp): ?>
                  <td><?php echo $kp->jmlh ?></td>
                  <?php endforeach ?>
                  <?php
                    $data4 = $this->m_model->getstatta2($dosen->nid,'Lulus'); 
                  ?>
                  <?php foreach ($data4->result() as $ta): ?>
                  <td><?php echo $ta->jmlh ?></td>
                  <?php endforeach ?>
                  <?php
                    $data1 = $this->m_model->getstatkp1($dosen->nid,'Lulus'); 
                  ?>
                  <?php foreach ($data1->result() as $kp): ?>
                  <td><?php echo $kp->jmlh ?></td>
                  <?php endforeach ?>
                  <?php
                    $data3 = $this->m_model->getstatta1($dosen->nid,'Lulus'); 
                  ?>
                  <?php foreach ($data3->result() as $ta): ?>
                  <td><?php echo $ta->jmlh ?></td>
                  <?php endforeach ?>                  
                  <td>
                      <center>
                        <a href="<?php echo base_url().'c_admin/editdosen/'.$dosen->id_dosen; ?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Apa anda ini menghapus dosen id=<?php echo $dosen->id_dosen; ?> ini ');" href="<?php echo base_url().'c_admin/hapusdosen/'.$dosen->id_dosen; ?>"><i class="fa fa-trash-o"></i></a>
                      </center>
                  </td>
                </tr>  
                <?php endforeach ?>
                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
