<?php
$id_estudiante = $_GET['id'];

include ('../../app/config.php');
include ('../../admin/layout/parte1.php');


include ('../../app/controllers/estudiantes/datos_estudiante.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Datos del Estudiante: <?=$nombres." ".$apellidos?></h1>
            </div>
            <br>


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Estudiante</h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Función</label>
                                            <p><?=$nombre_rol;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <p><?=$apellidos;?></p>                                        
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <p><?=$nombres;?></p>                                       
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Cédula Escolar</label>
                                            <p>V<?=$cedula_escolar;?></p>                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Nacimiento</label>
                                            <p><?=$fecha_nacimiento;?></p>                                        
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Lugar de Nacimiento</label>
                                            <p><?=$lugar_nacimiento;?></p>                                        
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <p><?=$estado_nac;?></p>                                        
                                        </div>
                                   </div>  
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Edad</label>
                                            <p><?=$edad;?></p>                                        
                                        </div>
                                   </div> 
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Sexo</label>
                                            <p><?=$sexo;?></p>                                        
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Talla Camisa</label>
                                            <p><?=$talla_camisa;?></p>                                        
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Talla Pantalón</label>
                                            <p><?=$talla_pantalon;?></p>                                        
                                        </div>
                                   </div> 
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Talla Zapatos</label>
                                            <p><?=$talla_zapatos;?></p>                                        
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Peso</label>
                                            <p><?=$peso;?> Kg</p>                                        
                                        </div>
                                   </div>    
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <p><?=$direccion;?></p>                                        
                                        </div>
                                    </div>                                 
                                </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-14">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Representante</h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos y Nombres de la Madre</label>
                                            <p><?=$apellidos_nombres_madre;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos y Nombres del Padre</label>
                                            <p><?=$apellidos_nombres_padre;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Lugar de Trabajo</label>
                                            <p><?=$lugar_nacimiento;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Ocupación</label>
                                            <p><?=$ocupacion;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Cédula de Identidad</label>
                                            <p>V<?=$ci;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Nacimiento</label>
                                            <p><?=$fecha_nacimiento_rep;?></p>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <p><?=$celular;?></p>
                                        </div>
                                   </div> 
                                   <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <p><?=$email;?></p>
                                        </div>
                                   </div> 
                                   <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Parentesco</label>
                                            <p><?=$parentesco;?></p>
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Dirección del Trabajo</label>
                                            <p><?=$direccion_trabajo;?></p>
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Nro de Hijos</label>
                                            <p><?=$numero_hijos;?></p>
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Nro de Hijos Estudiando</label>
                                            <p><?=$numero_hijos_estudiando;?></p>
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Nro de Hijos Estudiando en el Plantel</label>
                                            <p><?=$numero_hijos_estudiando_plantel;?></p>
                                        </div>
                                   </div>     
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Dirección de Hogar</label>
                                            <p><?=$direccion;?></p>
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
                                            <p><?=$nivel." - ".$turno;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Grado</label>
                                            <p><?=$curso." - ".$paralelo;?></p>                                
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
                                            <a href="<?=APP_URL;?>/admin/estudiantes" class="btn btn-secondary">Volver</a>
                                        </div>
                                    </div>
                                </div>
                                


            
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

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Estudiantes",
                "infoFiltered": "(Filtrado de _MAX_ total Estudiantes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Estudiantes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>


