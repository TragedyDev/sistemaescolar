<?php

include ('../app/config.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND estado = '1' ";
$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

$contador = 0;

foreach ($usuarios as $usuario){
    $password_tabla = $usuario['password'];
    $contador = $contador +1;
}

if( ($contador>0) && (password_verify($password,$password_tabla)) ){
    echo "los datos son correctos";
    session_start();
    $_SESSION['mensaje'] = "Bienvenido al sistema";
    $_SESSION['icono'] = "success";
    $_SESSION['sesion_email'] = $email;
    setcookie('user', $email, time() + (86400 * 30));
    header('Location:'.APP_URL."/admin");

    $_SESSION['last_activity'] = time();  
    $_SESSION['timeout_duration'] = 1800; // 30 minutos en segundos
}
else{
    echo "los datos son incorrectos";
    session_start();
    $_SESSION['mensaje'] = "Los datos introducidos son incorrectos, vuelva a intentarlo";
    header('Location:'.APP_URL."/login");
}
