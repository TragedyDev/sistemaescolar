<?php
session_start();

if(isset($_SESSION['sesion_email'])){
  // Verificar timeout de inactividad  
if (isset($_SESSION['last_activity'])) {  
    $inactive_time = time() - $_SESSION['last_activity'];  
    if ($inactive_time > $_SESSION['timeout_duration']) {  
        session_destroy();  
        header('Location:'.APP_URL."/login?timeout=1");  
        exit;  
    }  
}  
// Actualizar tiempo de última actividad  
$_SESSION['last_activity'] = time();
  // echo "el usuarios paso por el login";
   $email_sesion = $_SESSION['sesion_email'];
   $query_sesion = $pdo->prepare("SELECT * FROM usuarios as usu
                        INNER JOIN roles as rol ON rol.id_rol = usu.rol_id
                        INNER JOIN personas as per ON per.usuario_id = usu.id_usuario
                        WHERE usu.email = '$email_sesion' AND usu.estado = '1' ");
   $query_sesion->execute();

   $datos_sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
   foreach ($datos_sesion_usuarios as $datos_sesion_usuario){
      $nombre_sesion_usuario = $datos_sesion_usuario['email'];
      $id_rol_sesion_usuario = $datos_sesion_usuario['id_rol'];
      $rol_sesion_usuario = $datos_sesion_usuario['nombre_rol'];
      $nombres_sesion_usuario = $datos_sesion_usuario['nombres'];
      $apellidos_sesion_usuario = $datos_sesion_usuario['apellidos'];
      $ci_sesion_usuario = $datos_sesion_usuario['ci'];
   }

   $url = $_SERVER["PHP_SELF"];
   $conta = strlen($url);
   $rest = substr($url, 15, $conta);

    $sql_roles_permisos = "SELECT * FROM roles_permisos as rolper
                        INNER JOIN permisos as per ON per.id_permiso = rolper.permiso_id
                        INNER JOIN roles as rol ON rol.id_rol = rolper.rol_id
                         where rolper.estado = '1'";
    $query_roles_permisos = $pdo->prepare($sql_roles_permisos);
    $query_roles_permisos->execute();
    $roles_permisos = $query_roles_permisos->fetchAll(PDO::FETCH_ASSOC);
    $contadorpermiso = 0;
    foreach ($roles_permisos as $roles_permiso){
      if($id_rol_sesion_usuario == $roles_permiso['rol_id']) {
        // echo $roles_permiso['url'];
        if ($rest == $roles_permiso['url']){
         // echo "Permiso Concedido - ";
          $contadorpermiso = $contadorpermiso + 1;
        }else {
         // echo "No está autorizado";
        }
      } 
    }
    if($contadorpermiso>0){
     // echo "Autorizado";
    }else{
     // echo "No autorizado";
      header('Location:'.APP_URL."/admin/no-autorizado.php");
    }
   
  }else{
    echo "el usuario no paso por el login";
    header('Location:'.APP_URL."/login");
  }
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=APP_NAME;?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="<?=APP_URL;?>public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=APP_URL;?>public/dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>  
let inactivityTimer;  
let warningTimer;  
const TIMEOUT_DURATION = 30 * 60 * 1000; // 2 minutos  
const WARNING_TIME = 5 * 60 * 1000; // 5 minutos antes del timeout  
  
function resetInactivityTimer() {  
    clearTimeout(inactivityTimer);  
    clearTimeout(warningTimer);  
      
    // Timer para mostrar advertencia  
    warningTimer = setTimeout(showInactivityWarning, TIMEOUT_DURATION - WARNING_TIME);  
      
    // Timer para cerrar sesión  
    inactivityTimer = setTimeout(logoutDueToInactivity, TIMEOUT_DURATION);  
}  
  
function showInactivityWarning() {  
    Swal.fire({  
        title: 'Sesión por expirar',  
        text: 'Tu sesión expirará en 5 minutos por inactividad. ¿Deseas mantener la sesión activa?',  
        icon: 'warning',  
        showCancelButton: true,  
        confirmButtonText: 'Mantener activa',  
        cancelButtonText: 'Cerrar sesión',  
        timer: 300000, // 5 minutos  
        timerProgressBar: true  
    }).then((result) => {  
        if (result.isConfirmed) {  
            renewSession();  
        } else {  
            logoutDueToInactivity();  
        }  
    });  
}  
  
function logoutDueToInactivity() {  
    Swal.fire({  
        title: 'Sesión expirada',  
        text: 'Tu sesión ha expirado por inactividad',  
        icon: 'info',  
        timer: 5000,  
        showConfirmButton: false  
    }).then(() => {  
        window.location.href = '<?=APP_URL;?>/login/logout.php';  
    });  
}  
  
function renewSession() {  
    fetch('<?=APP_URL;?>/admin/renew_session.php', {  
        method: 'POST',  
        headers: {  
            'Content-Type': 'application/json',  
        }  
    }).then(() => {  
        resetInactivityTimer();  
    });  
}  
  
// Eventos para detectar actividad del usuario  
['mousedown', 'mousemove', 'keypress', 'scroll', 'touchstart', 'click'].forEach(event => {  
    document.addEventListener(event, resetInactivityTimer, true);  
});  
  
// Inicializar el timer  
resetInactivityTimer();  
</script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link rel="stylesheet" href="<?=APP_URL;?>public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=APP_URL;?>public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=APP_URL;?>public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini"> 
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=APP_URL;?>/admin" class="nav-link"><?=APP_NAME;?></a> <?=$rol_sesion_usuario;?>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  </div>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; height: 100vh;">>
    <!-- Brand Logo -->
    <a href="<?=APP_URL;?>/admin" class="brand-link">
      <img src="https://png.pngtree.com/png-clipart/20220628/original/pngtree-school-lineal-icon-back-to-vecto-illustration-png-image_8240081.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SISTEMA ESCOLAR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://cdn-icons-png.flaticon.com/512/6073/6073873.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$nombre_sesion_usuario?></a>
        </div>
      </div>
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <?php
               if( ($rol_sesion_usuario == "ADMINISTRADOR") || ($rol_sesion_usuario == "DIRECTORA") || ($rol_sesion_usuario == "SECRETARIA/O") || ($rol_sesion_usuario == "COORDINADORA PEDAGÓGICA")){ ?>

               <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas"><i class="bi bi-card-list"></i></i>
              <p>
                Configuraciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/configuraciones" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Opciones</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas"><i class="bi bi-card-list"></i></i>
              <p>
                Niveles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/niveles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Niveles</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
               }
               ?>

          <?php
               if( ($rol_sesion_usuario == "ADMINISTRADOR") || ($rol_sesion_usuario == "DIRECTORA") || ($rol_sesion_usuario == "SECRETARIA/O")  || ($rol_sesion_usuario == "COORDINADORA PEDAGÓGICA") || ($rol_sesion_usuario == "DOCENTE")){ ?>

          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas"><i class="bi bi-bar-chart-steps"></i></i>
              <p>
                Grados
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/grados" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Grados</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas"><i class="bi bi-journal-bookmark"></i></i>
              <p>
                Materias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/materias" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Materias</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
               }
               ?>


          <?php
               if( ($rol_sesion_usuario == "ADMINISTRADOR") || ($rol_sesion_usuario == "DIRECTORA")  || ($rol_sesion_usuario == "COORDINADORA PEDAGÓGICA")){ ?>
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas"><i class="bi bi-bookmarks"></i></i>
              <p>
                Funciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/roles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Funciones</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/roles/permisos.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permisos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas"><i class="bi bi-people-fill"></i></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/usuarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Usuarios</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas"><i class="bi bi-person-workspace"></i></i>
              <p>
                 Administrativos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/administrativos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Administrativos</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
               }
               ?>

               <?php
               if( ($rol_sesion_usuario == "ADMINISTRADOR") || ($rol_sesion_usuario == "DIRECTORA")  || ($rol_sesion_usuario == "COORDINADORA PEDAGÓGICA") || ($rol_sesion_usuario == "SECRETARIA/O") || ($rol_sesion_usuario == "DOCENTE")){ ?>
               <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas"><i class="bi bi-person-lines-fill"></i></i>
              <p>
                 Docentes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/docentes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Docentes</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
               }
               ?>

          <?php
               if( ($rol_sesion_usuario == "ADMINISTRADOR") || ($rol_sesion_usuario == "DIRECTORA") || ($rol_sesion_usuario == "SECRETARIA/O") || ($rol_sesion_usuario == "COORDINADORA PEDAGÓGICA")){ ?>     

          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas"><i class="bi bi-person-badge"></i></i>
              <p>
                 Estudiantes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/inscripciones" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inscripción</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=APP_URL;?>/admin/estudiantes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Estudiantes</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
               }
               ?>

        </ul>
                <div class="nav-footer" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 10px; background-color: #343a40;">
        <a href="<?=APP_URL;?>/login/logout.php" onclick="confirmarCerrarSesion(event)" class="nav-link btn btn-danger btn-block">
            <i class="nav-icon fas"><i class="bi bi-door-open"></i></i>
            <p style="display: inline;">Cerrar Sesión</p>
                     <script>
    function confirmarCerrarSesion(event) {
        event.preventDefault(); // Previene la acción por defecto del enlace/botón
        Swal.fire({
            title: 'Cerrar sesión',
            text: '¿Estás seguro que deseas cerrar tu sesión?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#a5161d',
            cancelButtonColor: '#270a0a',
            confirmButtonText: 'Sí, cerrar sesión',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirigir al logout o enviar formulario
                window.location.href = "<?=APP_URL;?>/login/logout.php"// Si es un enlace
                // O si es un formulario: document.getElementById('logout-form').submit();
            }
        });
    }
</script>
            </a>
          </div>
          </nav>
      
      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
     
  </aside>