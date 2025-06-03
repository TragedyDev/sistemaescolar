<?php
$id_estudiante = $_GET['id'];

include ('../../app/config.php');
include ('../../admin/layout/parte1.php');


include ('../../app/controllers/estudiantes/datos_estudiante.php');
include ('../../app/controllers/roles/listado_roles.php');
include ('../../app/controllers/niveles/listado_niveles.php');
include ('../../app/controllers/grados/listado_grados.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Modificar Datos del Estudiante: <?=$apellidos." ".$nombres;?></h1>
            </div>
            <br>

            <form action="<?=APP_URL;?>/app/controllers/estudiantes/update.php" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Estudiante</h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" value = "<?=$id_usuario;?>" name = "id_usuario" hidden>
                                            <input type="text" value = "<?=$id_persona;?>" name = "id_persona" hidden>
                                            <input type="text" value = "<?=$id_estudiante;?>" name = "id_estudiante" hidden>
                                            <input type="text" value = "<?=$id_representante;?>" name = "id_representante" hidden>

                                            <label for="">Nombre del Rol</label>
                                            <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                            <div class="form-inline">
                                                <select name="rol_id" id="" class="form-control">
                                                    <?php
                                                    foreach ($roles as $role){ ?>
                                                        <option value="<?=$role['id_rol'];?>" <?=$role['nombre_rol']=="ESTUDIANTE" ? 'selected' : ''?>><?=$role['nombre_rol'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input type="text" name="apellidos" value="<?=$apellidos;?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Cédula Escolar</label>
                                            <input type="number" name="cedula_escolar" value="<?=$cedula_escolar;?>" class="form-control" placeholder="V" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Fecha de Nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" value="<?=$fecha_nacimiento;?>" class="form-control" required>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Lugar de Nacimiento</label>
                                            <input type="text" name="lugar_nacimiento" value="<?=$lugar_nacimiento;?>" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <input type="text" name="estado" value="<?=$estado_nac;?>" class="form-control" required>
                                        </div>
                                   </div>  
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Edad</label>
                                            <input type="number" name="edad" value="<?=$edad;?>" class="form-control" required>
                                        </div>
                                   </div> 
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Sexo</label>
                                            <input type="text" name="sexo" value="<?=$sexo;?>" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Talla Camisa</label>
                                            <input type="number" name="talla_camisa" value="<?=$talla_camisa;?>" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Talla Pantalón</label>
                                            <input type="number" name="talla_pantalon" value="<?=$talla_pantalon;?>" class="form-control" required>
                                        </div>
                                   </div> 
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Talla Zapatos</label>
                                            <input type="number" name="talla_zapatos" value="<?=$talla_zapatos;?>" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Peso</label>
                                            <input type="number" name="peso" value="<?=$peso;?>" class="form-control" placeholder="Kg" required>
                                        </div>
                                   </div>    
                                   <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <input type="address" name="direccion" value="<?=$direccion;?>" class="form-control" required>
                                        </div>
                                    </div>                                 
                                </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Representante</h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos y Nombres de la Madre</label>
                                            <input type="text" name="apellidos_nombres_madre" value="<?=$apellidos_nombres_madre;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos y Nombres del Padre</label>
                                            <input type="text" name="apellidos_nombres_padre" value="<?=$apellidos_nombres_padre;?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Lugar de Trabajo</label>
                                            <input type="text" name="lugar_trabajo" value="<?=$lugar_trabajo;?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupación</label>
                                            <input type="text" name="ocupacion" value="<?=$ocupacion;?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Cédula de Identidad</label>
                                            <input type="number" name="ci" value="<?=$ci;?>" class="form-control" placeholder="V" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Nacimiento</label>
                                            <input type="date" name="fecha_nacimiento_rep" value="<?=$fecha_nacimiento_rep;?>" class="form-control" required>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular" value="<?=$celular;?>" class="form-control" required>
                                        </div>
                                   </div> 
                                   <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" name="email" value="<?=$email;?>" class="form-control" required>
                                        </div>
                                   </div> 
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Parentesco</label>
                                            <input type="text" name="parentesco" value="<?=$parentesco;?>" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Dirección del Trabajo</label>
                                            <input type="address" name="direccion_trabajo" value="<?=$direccion_trabajo;?>" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nro de Hijos</label>
                                            <input type="number" name="numero_hijos" value="<?=$numero_hijos;?>" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nro de Hijos Estudiando</label>
                                            <input type="number" name="numero_hijos_estudiando" value="<?=$numero_hijos_estudiando;?>" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nro de Hijos Estudiando en el Plantel</label>
                                            <input type="number" name="numero_hijos_estudiando_plantel" value="<?=$numero_hijos_estudiando_plantel;?>" class="form-control" required>
                                        </div>
                                   </div>     
                                   <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Dirección de Hogar</label>
                                            <input type="address" name="direccion" value="<?=$direccion;?>" class="form-control" required>
                                        </div>
                                    </div>                                 
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos Academicos</h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nivel y Turnos</label>
                                                <select name="nivel_id" id="" class="form-control">
                                                    <?php
                                                    foreach ($niveles as $nivele){ ?>
                                                        <option value="<?=$nivele['id_nivel'];?>" <?=$nivele['id_nivel']==$nivel_id ? 'selected' : ''?>><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Grado</label>
                                            <select name="grado_id" id="" class="form-control">
                                                    <?php
                                                    foreach ($grados as $grado){ ?>
                                                        <option value="<?=$grado['id_grado'];?>" <?=$grado['id_grado']==$grado_id ? 'selected' : ''?>><?=$grado['curso']." - SECCIÓN ".$grado['paralelo'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>                                       
                                             </div>
                                    </div>                                                       
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/estudiantes" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
            
            </form>




            
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>
