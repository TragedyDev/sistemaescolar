<?php

include ('../../../app/config.php');

$rol_id = $_POST['rol_id'];
$apellidos = $_POST['apellidos'];
$nombres = $_POST['nombres'];
$nivel_id  = $_POST['nivel_id'];
$grado_id  = $_POST['grado_id'];
$cedula_escolar = $_POST['cedula_escolar'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$fecha_nacimiento_rep = $_POST['fecha_nacimiento_rep'];
$lugar_nacimiento = $_POST['lugar_nacimiento'];
$estado_nac = $_POST['estado_nac'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$talla_camisa = $_POST['talla_camisa'];
$talla_pantalon = $_POST['talla_pantalon'];
$talla_zapatos = $_POST['talla_zapatos'];
$peso = $_POST['peso'];
$apellidos_nombres_madre = $_POST['apellidos_nombres_madre'];
$apellidos_nombres_padre = $_POST['apellidos_nombres_padre'];
$ci = $_POST['ci'];
$parentesco = $_POST['parentesco'];
$ocupacion = $_POST['ocupacion'];
$lugar_trabajo = $_POST['lugar_trabajo'];
$direccion_trabajo = $_POST['direccion_trabajo'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$numero_hijos = $_POST['numero_hijos'];
$numero_hijos_estudiando = $_POST['numero_hijos_estudiando'];
$numero_hijos_estudiando_plantel = $_POST['numero_hijos_estudiando_plantel'];


$pdo->beginTransaction(); 
//////// INSERTAR USUARIO

$password = password_hash($ci, PASSWORD_DEFAULT);

$sentencia = $pdo->prepare('INSERT INTO usuarios
        (rol_id, email, password, fyh_creacion, estado)
VALUES (:rol_id,:email,:password,:fyh_creacion,:estado)');

$sentencia->bindParam(':rol_id',$rol_id);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':password',$password);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);
$sentencia->execute();

$id_usuario = $pdo->lastInsertId();


/////////////////// INSERTAR A TABLA PERSONAS


$sentencia = $pdo->prepare('INSERT INTO personas
(usuario_id,nombres,apellidos,ci,celular,direccion,fecha_nacimiento, fyh_creacion, estado)
VALUES ( :usuario_id,:nombres,:apellidos,:ci,:celular,:fecha_nacimiento,:direccion,:fyh_creacion,:estado)');

$sentencia->bindParam(':usuario_id',$id_usuario);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);
$sentencia->execute();

$id_persona = $pdo->lastInsertId();

///////////////////////// INSERTAR A LA TABLA ESTUDIANTES

$sentencia = $pdo->prepare('INSERT INTO estudiantes
       (persona_id,nivel_id,grado_id,nombres,apellidos, cedula_escolar,fecha_nacimiento,edad,sexo,talla_camisa,talla_pantalon,talla_zapatos,peso,lugar_nacimiento,estado_nac, fyh_creacion)
VALUES (:persona_id,:nivel_id,:grado_id,:nombres,:apellidos,:cedula_escolar,:fecha_nacimiento,:edad,:sexo,:talla_camisa,:talla_pantalon,:talla_zapatos,:peso,:lugar_nacimiento,:estado_nac,:fyh_creacion)');

$sentencia->bindParam(':persona_id',$id_persona);
$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':grado_id',$grado_id);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':cedula_escolar',$cedula_escolar);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':edad',$edad);
$sentencia->bindParam(':sexo',$sexo);
$sentencia->bindParam(':talla_camisa',$talla_camisa);
$sentencia->bindParam(':talla_pantalon',$talla_pantalon);
$sentencia->bindParam(':talla_zapatos',$talla_zapatos);
$sentencia->bindParam(':peso',$peso);
$sentencia->bindParam(':lugar_nacimiento',$lugar_nacimiento);
$sentencia->bindParam(':estado_nac',$estado_nac);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->execute();

$id_estudiante = $pdo->lastInsertId();

///////////////////////// INSERTAR A LA TABLA REPRESENTANTES

$sentencia = $pdo->prepare('INSERT INTO representantes
       (id_estudiante ,apellidos_nombres_madre,apellidos_nombres_padre,ci,parentesco,fecha_nacimiento_rep,ocupacion,lugar_trabajo,direccion_trabajo,celular,correo,direccion,numero_hijos,numero_hijos_estudiando,numero_hijos_estudiando_plantel, fyh_creacion, estado)
VALUES (:id_estudiante ,:apellidos_nombres_madre,:apellidos_nombres_padre,:ci,:parentesco,:fecha_nacimiento_rep,:ocupacion,:lugar_trabajo,:direccion_trabajo,:celular,:correo,:direccion,:numero_hijos,:numero_hijos_estudiando,:numero_hijos_estudiando_plantel,:fyh_creacion,:estado)');

$sentencia->bindParam(':id_estudiante',$id_estudiante);
$sentencia->bindParam(':apellidos_nombres_madre',$apellidos_nombres_madre);
$sentencia->bindParam(':apellidos_nombres_padre',$apellidos_nombres_padre);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':parentesco',$parentesco);
$sentencia->bindParam(':fecha_nacimiento_rep',$fecha_nacimiento_rep);
$sentencia->bindParam(':ocupacion',$ocupacion);
$sentencia->bindParam(':lugar_trabajo',$lugar_trabajo);
$sentencia->bindParam(':direccion_trabajo',$direccion_trabajo);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':correo',$correo);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':numero_hijos',$numero_hijos);
$sentencia->bindParam(':numero_hijos_estudiando',$numero_hijos_estudiando);
$sentencia->bindParam(':numero_hijos_estudiando_plantel',$numero_hijos_estudiando_plantel);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);


if($sentencia->execute()){
echo 'success';
$pdo->commit();
session_start();
       $_SESSION['mensaje'] = "Se registro el estudiante correctamente";
       $_SESSION['icono'] = "success";
       header('Location:'.APP_URL."/admin/inscripciones");
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
$pdo->rollBack();
session_start();
       $_SESSION['mensaje'] = "Error no se pudo registrar el estudiante en la base datos, comuniquese con el administrador";
       $_SESSION['icono'] = "error";
       ?><script>window.history.back();</script><?php
}

