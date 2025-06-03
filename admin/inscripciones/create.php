<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
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
                <h1>Registro de Estudiante</h1>
            </div>
            <br>

            <form action="<?=APP_URL;?>/app/controllers/inscripciones/create.php" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Estudiante</h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
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
                                            <input type="text" name="apellidos" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Cédula Escolar</label>
                                            <input type="number" name="cedula_escolar" class="form-control" placeholder="V" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Fecha de Nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form-control" required>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Lugar de Nacimiento</label>
                                            <input type="text" name="lugar_nacimiento" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <input type="text" name="estado" class="form-control" required>
                                        </div>
                                   </div>  
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Edad</label>
                                            <input type="number" name="edad" class="form-control" required>
                                        </div>
                                   </div> 
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Sexo</label>
                                            <input type="text" name="sexo" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Talla Camisa</label>
                                            <input type="number" name="talla_camisa" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Talla Pantalón</label>
                                            <input type="number" name="talla_pantalon" class="form-control" required>
                                        </div>
                                   </div> 
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Talla Zapatos</label>
                                            <input type="number" name="talla_zapatos" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Peso</label>
                                            <input type="number" name="peso" class="form-control" placeholder="Kg" required>
                                        </div>
                                   </div>    
                                   <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <input type="address" name="direccion" class="form-control" required>
                                        </div>
                                    </div>                                 
                                </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Representante</h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos y Nombres de la Madre</label>
                                            <input type="text" name="apellidos_nombres_madre" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos y Nombres del Padre</label>
                                            <input type="text" name="apellidos_nombres_padre" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Lugar de Trabajo</label>
                                            <input type="text" name="lugar_trabajo" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupación</label>
                                            <input type="text" name="ocupacion" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Cédula de Identidad</label>
                                            <input type="number" name="ci" class="form-control" placeholder="V" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Nacimiento</label>
                                            <input type="date" name="fecha_nacimiento_rep" class="form-control" required>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular" class="form-control" required>
                                        </div>
                                   </div> 
                                   <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                   </div> 
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Parentesco</label>
                                            <input type="text" name="parentesco" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Dirección del Trabajo</label>
                                            <input type="address" name="direccion_trabajo" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nro de Hijos</label>
                                            <input type="number" name="numero_hijos" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nro de Hijos Estudiando</label>
                                            <input type="number" name="numero_hijos_estudiando" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nro de Hijos Estudiando en el Plantel</label>
                                            <input type="number" name="numero_hijos_estudiando_plantel" class="form-control" required>
                                        </div>
                                   </div>     
                                   <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Dirección de Hogar</label>
                                            <input type="address" name="direccion" class="form-control" required>
                                        </div>
                                    </div>                                 
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-danger">
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
                                                        <option value="<?=$nivele['id_nivel'];?>"><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <BR></BR>
                                                <h5><B>COMPROMISO</B></h5>
                                                <BR></BR>
                                                <div style="white-space: nowrap;">Yo <b> Representante </b>Me comprometo enviarle puntual y diariamente al plantel, retirarlo en el horario 
                                                        correspondiente <b>(7:00AM-11:30)</b> <b>(1:00PM-5:30PM)</b>.<br> Asistir a los cierres de proyecto, a las reuniones de la comunidad
                                                        educativa y entrevisa con el docente, asi mismo como dotarlo con el uniforme, útiles y otros<br> que le sean necesarios para el
                                                        rendiemiento efectivo de su aprendizaje, así mismo, en caso de ser necesario retirar a mi representado de esta institución <br>
                                                        durante el presente año escolar, los documentos serán unicamente retirados por el representante legal, los Representantes deberán presentar informe médico <br>
                                                        (actualizado) a la docente del grado en caso de que su representado presente condición <b>obligatorio.</b>

                                                </div>
                                        </div>
                                        <input type="checkbox" name="registro" id="">  Acepto
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Grado</label>
                                            <select name="grado_id" id="" class="form-control">
                                                    <?php
                                                    foreach ($grados as $grado){ ?>
                                                        <option value="<?=$grado['id_grado'];?>"><?=$grado['curso']." - SECCIÓN ".$grado['paralelo'];?></option>
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
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                            <a href="<?=APP_URL;?>/admin/estudiantes" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
            </form>

            <p></p>




            
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
