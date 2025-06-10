<?php

include ('../../../app/config.php');

$id_permiso = $_POST['id_permiso'];

$sentencia = $pdo->prepare("DELETE FROM permisos where id_permiso=:id_permiso ");

$sentencia->bindParam('id_permiso',$id_permiso);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se elimino el permiso de manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/roles/permisos.php");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/roles/permisos.php");
}