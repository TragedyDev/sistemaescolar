<?php

$sql_usuarios = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON rol.id_rol = usu.rol_id where usu.estado = '1' and usu.id_usuario = '$id_usuario'";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario){
    $nombre_rol = $usuario['nombre_rol'];
    $email = $usuario['email'];
    $password = $usuario['password'];
    $fyh_creacion = $usuario['fyh_creacion'];
    $estado = $usuario['estado'];
}