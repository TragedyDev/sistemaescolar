<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/estudiantes/listado_estudiantes.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Información de la Insitución</h1>
            </div>
            <br>
            <div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <center><h2>Reseña Histórica</h2></center>
                <p>La Escuela Primaria Bolivariana "Josefin Leidenz" se inicia en una casa de aspecto colonial, ubicada en la calle Urdaneta el 30 de marzo de 1954. El nombre de la institución rinde homenaje al profesor "Josefin Leidenz", quien dedicó más de cinco décadas a la formación de niños y jóvenes.</p>
                
                <!-- Contenedor para texto + imagen + texto -->
                <div class="row align-items-center mt-4">  <!-- mt-4 = margen superior -->
                    <!-- Texto a la izquierda -->
                    <div class="col-md-5">
                        <center><h3>Mision</h3></center>
                        <p>Brindar un espacio a los estudiantes que le permita desarrollar integralmente sus capacidades proactivas, 
                            productivas y de investigación, articulando las dimensiones de aprendizaje satisfactoriamente hacia las intencionalidades de crear, valorar, reflexionar, participar 
                            y convivir en los diferentes escenarios que abarque el hecho de enseñanza-aprendizaje, bajo la práctica pedagógica, abierta, flexible y 
                            constructiva orientada al cambio positivo en el sistema educativo, 
                            logrando de este modo contribuir con la formación del ciudadano que requiere el país y la sociedad.</p>
                    </div>
                    
                    <!-- Imagen centrada -->
                    <div class="col-md-2 text-center">  <!-- col-md-2 para que no ocupe mucho espacio -->
                        <img src="../../public/img/josefin.jpg" alt="Profesor Josefin Leidenz" class="img-fluid rounded mx-auto d-block" style="max-width: 100%; height: auto;">
                    </div>
                    
                    <!-- Texto a la derecha -->
                    <div class="col-md-5">
                        <center><h3>Vision</h3></center>
                        <p>Ser una escuela piloto donde se lleve a cabo una formación ciudadana sin ningún tipo de discriminación, asumiendo la educación primaria como eje fundamental dentro de la misma, en función de rescatar la idiosincrasia del venezolano como individuo trabajador, humanista, solidario y respetuoso de las buenas costumbres apegados a las leyes y normas que lo rigen, siendo estas la ética y la moral que satisfaga plenamente las expectativas y necesidades de los estudiantes logrando así un desarrollo armónico e integral cimentadas en una sociedad justa y de paz.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <center><h2>Ubicación</h2></center>
                <p>La Escuela Primaria Bolivariana “Josefín Leidenz” se encuentra situada en el sector Pantano Abajo y geográficamente al Noreste de la ciudad Santa Ana de Coro, comprende los siguientes límites
                </p>
                <p> <b>Norte</b>: Casa solar que es de la Familia Ramírez. <br>
                    <b>Sur</b>: Casa solar que es del Sr. Pedro Farías. <br>
                    <b>Este</b>: Que es su frente Calle Federación (Plaza Ciro Trejo) <br>
                    <b>Oeste</b>: Fondos de casas que son de la Familia Pacheco. <br>
</p>
                <!-- Contenedor para texto + imagen + texto -->
                <div class="row align-items-center mt-4">  <!-- mt-4 = margen superior -->

                </div>
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

