<?php

$sql_estudiantes = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN estudiantes as est ON est.persona_id = per.id_persona
INNER JOIN niveles as niv ON niv.id_nivel = est.nivel_id
INNER JOIN grados as gra ON gra.id_grado = est.grado_id
INNER JOIN representantes as rep ON rep.id_estudiante = est.id_estudiante
 where nivel = 'Primaria' and est.id_estudiante = '$id_estudiante'";
$query_estudiantes = $pdo->prepare($sql_estudiantes);
$query_estudiantes->execute();
$estudiantes = $query_estudiantes->fetchAll(PDO::FETCH_ASSOC);

foreach($estudiantes as $estudiante) {
    $id_usuario = $estudiante['id_usuario'];
    $id_persona = $estudiante['id_persona'];
    $id_estudiante = $estudiante['id_estudiante'];
    $id_representante = $estudiante['id_representante'];
    $rol_id = $estudiante['rol_id'];
    $nombre_rol = $estudiante['nombre_rol'];
    $apellidos = $estudiante['apellidos'];
    $nombres = $estudiante['nombres'];
    $nivel_id  = $estudiante['nivel_id'];
    $nivel  = $estudiante['nivel'];
    $turno  = $estudiante['turno'];
    $curso  = $estudiante['curso'];
    $paralelo  = $estudiante['paralelo'];
    $grado_id  = $estudiante['grado_id'];
    $cedula_escolar = $estudiante['cedula_escolar'];
    $fecha_nacimiento = $estudiante['fecha_nacimiento'];
    $fecha_nacimiento_rep = $estudiante['fecha_nacimiento_rep'];
    $lugar_nacimiento = $estudiante['lugar_nacimiento'];
    $estado_nac = $estudiante['estado_nac'];
    $edad = $estudiante['edad'];
    $sexo = $estudiante['sexo'];
    $talla_camisa = $estudiante['talla_camisa'];
    $talla_pantalon = $estudiante['talla_pantalon'];
    $talla_zapatos = $estudiante['talla_zapatos'];
    $peso = $estudiante['peso'];
    $apellidos_nombres_madre = $estudiante['apellidos_nombres_madre'];
    $apellidos_nombres_padre = $estudiante['apellidos_nombres_padre'];
    $ci = $estudiante['ci'];
    $parentesco = $estudiante['parentesco'];
    $ocupacion = $estudiante['ocupacion'];
    $lugar_trabajo = $estudiante['lugar_trabajo'];
    $direccion_trabajo = $estudiante['direccion_trabajo'];
    $celular = $estudiante['celular'];
    $email = $estudiante['email'];
    $direccion = $estudiante['direccion'];
    $numero_hijos = $estudiante['numero_hijos'];
    $numero_hijos_estudiando = $estudiante['numero_hijos_estudiando'];
    $numero_hijos_estudiando_plantel = $estudiante['numero_hijos_estudiando_plantel'];
}
?>

