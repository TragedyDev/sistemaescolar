
<!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <li class="nav-item">
            <a href="<?=APP_URL;?>/login/logout.php" onclick="confirmarCerrarSesion(event)" class="nav-link" style="background-color: red">
              <i class="nav-icon fas"><i class="bi bi-door-open"></i></i>
              <p>
                 Cerrar Sesión
              </p>
            </a>
          </li>
    </div>
</aside>
<!-- /.control-sidebar -->
 

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        V. 1.0.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?=$ano_actual;?> <a href=""></a>.</strong> Todos los derechos Reservados.
    <p xmlns:cc="http://creativecommons.org/ns#" >Este proyecto está realizado bajo fines Educativos y no está a la venta. <a href="https://creativecommons.org/licenses/by-nc/4.0/?ref=chooser-v1" target="_blank" rel="license noopener noreferrer" style="display:inline-block;"><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt=""><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1" alt=""><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/nc.svg?ref=chooser-v1" alt=""></a></p>
</footer>
</div>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=APP_URL;?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Datatables -->
<script src="<?=APP_URL;?>/public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/jszip/jszip.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=APP_URL;?>/public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- AdminLTE App -->
<script src="<?=APP_URL;?>/public/dist/js/adminlte.min.js"></script>
</body>
</html>