<?php
include ('../app/config.php');
include ('../admin/layout/parte1.php');
include ('../app/controllers/roles/listado_roles.php');
include ('../app/controllers/usuarios/listado_usuarios.php');
include ('../app/controllers/niveles/listado_niveles.php');
include ('../app/controllers/grados/listado_grados.php');
include ('../app/controllers/materias/listado_materias.php');
include ('../app/controllers/administrativos/listado_administrativos.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1><?=APP_NAME;?></h1>
          </div>
          <BR></BR>
          <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                $contador_roles = 0;
                foreach ($roles as $role) {
                  $contador_roles = $contador_roles + 1;
                }
                ?>
                <h3><?=$contador_roles;?></h3>
                <p>Roles Registrados</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-bookmarks"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/roles" class="small-box-footer">
                Más Información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $contador_usuarios = 0;
                foreach ($usuarios as $usuario) {
                  $contador_usuarios = $contador_usuarios + 1;
                }
                ?>
                <h3><?=$contador_usuarios;?></h3>
                <p>Usuarios Registrados</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-people-fill"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/usuarios" class="small-box-footer">
                Más Información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $contador_niveles = 0;
                foreach ($niveles as $nivele) {
                  $contador_niveles = $contador_niveles + 1;
                }
                ?>
                <h3><?=$contador_niveles;?></h3>
                <p>Niveles Registrados</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-card-list"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/niveles" class="small-box-footer">
                Más Información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_grados = 0;
                foreach ($grados as $grado) {
                  $contador_grados = $contador_grados + 1;
                }
                ?>
                <h3><?=$contador_grados;?></h3>
                <p>Grados Registrados</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-bar-chart-steps"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/grados" class="small-box-footer">
                Más Información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>  
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                $contador_materias = 0;
                foreach ($materias as $materia) {
                  $contador_materias = $contador_materias + 1;
                }
                ?>
                <h3><?=$contador_materias;?></h3>
                <p>Materias Registradas</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-journal-bookmark"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/materias" class="small-box-footer">
                Más Información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>  
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-default">
              <div class="inner">
                <?php
                $contador_administrativos = 0;
                foreach ($administrativos as $administrativo) {
                  $contador_administrativos = $contador_administrativos + 1;
                }
                ?>
                <h3><?=$contador_administrativos;?></h3>
                <p>Personal Administrativo</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-person-workspace"></i></i>
              </div>
              <a href="<?=APP_URL;?>/admin/administrativos" class="small-box-footer">
                Más Información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>  
          </div>

          </div>
        </div>
      </div>
    </div>
  </div>

<?php 
include ('../admin/layout/parte2.php');
include ('../layout/mensajes.php');

?>
 