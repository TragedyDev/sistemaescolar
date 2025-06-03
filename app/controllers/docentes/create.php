<?php

include ('../../../app/config.php');

$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ci = $_POST['ci'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$especialidad = $_POST['especialidad'];
$antiguedad = $_POST['antiguedad'];


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
(usuario_id,nombres,apellidos,ci,celular,direccion, fyh_creacion, estado)
VALUES ( :usuario_id,:nombres,:apellidos,:ci,:celular,:direccion,:fyh_creacion,:estado)');

$sentencia->bindParam(':usuario_id',$id_usuario);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);
$sentencia->execute();

$id_persona = $pdo->lastInsertId();

///////////////////////// INSERTAR A LA TABLA DOCENTES

$sentencia = $pdo->prepare('INSERT INTO docentes
       (persona_id, especialidad,antiguedad, fyh_creacion, estado)
VALUES (:persona_id,:especialidad,:antiguedad,:fyh_creacion,:estado)');

$sentencia->bindParam(':persona_id',$id_persona);
$sentencia->bindParam(':especialidad',$especialidad);
$sentencia->bindParam(':antiguedad',$antiguedad);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);


if($sentencia->execute()){
echo 'success';
$pdo->commit();
session_start();
       $_SESSION['mensaje'] = "Se registro el Docente correctamente";
       $_SESSION['icono'] = "success";
       header('Location:'.APP_URL."/admin/docentes");
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
$pdo->rollBack();
session_start();
       $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
       $_SESSION['icono'] = "error";
       ?><script>window.history.back();</script><?php
}

