<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/docentes/listado_docentes.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado de Docentes</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Docentes Registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i>Crear Nuevo Docente</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Docente</center></th>
                                    <th><center>Especialidad</center></th>
                                    <th><center>Cédula</center></th>
                                    <th><center>Correo</center></th>
                                    <th><center>Estado</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_docentes = 0;
                                foreach ($docentes as $docente){
                                    $id_docente = $docente['id_docente'];
                                    $contador_docentes = $contador_docentes +1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_docentes;?></td>
                                        <td style="text-align: center"><?=$docente['nombres']." ".$docente['apellidos'];?></td>
                                        <td style="text-align: center"><?=$docente['especialidad'];?></td>
                                        <td style="text-align: center"><?=$docente['ci'];?></td>
                                        <td style="text-align: center"><?=$docente['email'];?></td>
                                        <td style="text-align: center">
                                            <?php
                                            if($docente['estado'] == "1") echo "ACTIVO";
                                            else echo "INACTIVO"
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="show.php?id=<?=$id_docente;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                <a href="edit.php?id=<?=$id_docente;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                              <!--   <form action="<?=APP_URL;?>/app/controllers/usuarios/delete.php" onclick="preguntar<?=$id_docente;?>(event)" method="post" id="miFormulario<?=$id_docente;?>">
                                                    <input type="text" name="id_usuario" value="<?=$id_docente;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar<?=$id_docente;?>(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: 'Eliminar registro',
                                                            text: '¿Desea eliminar este registro?',
                                                            icon: 'question',
                                                            showDenyButton: true,
                                                            confirmButtonText: 'Eliminar',
                                                            confirmButtonColor: '#a5161d',
                                                            denyButtonColor: '#270a0a',
                                                            denyButtonText: 'Cancelar',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                var form = $('#miFormulario<?=$id_docente;?>');
                                                                form.submit();
                                                            }
                                                        });
                                                    }
                                                </script>
                                -->
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Docentes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Docentes",
                "infoFiltered": "(Filtrado de _MAX_ total Docentes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Docentes",
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