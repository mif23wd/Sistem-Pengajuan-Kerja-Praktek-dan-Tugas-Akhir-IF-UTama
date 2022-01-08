
  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; 2018 <a href="#">Run Away</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- page script -->
<script src="<?php echo base_url(); ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script>
  $(function () {
    $(".select2").select2();
    $("#example1").DataTable({
        "order": [[ 0, "desc" ]]
    });
    $("#example3").DataTable({
        "order": [[ 0, "desc" ]]
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker5').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker6').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker7').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: false,
      showMeridian:false,
      format: 'HH:mm',
    });
  });
</script>
</body>
</html>
