  <footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
    <strong>Copyright &copy; 2015 <a href="#">YOGYA GROUP</a>.</strong> All rights
    reserved.
  </footer>
      </div>
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 2.1.4 -->
<script src="../../asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../../asset/plugins/jQueryUI/jquery-ui.min.js"></script>
<script src="../../sweetalert/sweetalert.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../asset/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../asset/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../asset/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../asset/dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>