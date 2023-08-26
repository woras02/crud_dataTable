<?php

include("bd.php");

$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$dni = (isset($_POST['dni'])) ? $_POST['dni'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$edad = (isset($_POST['edad'])) ? $_POST['edad'] : '';
$fecha_nac = (isset($_POST['fecha_nac'])) ? $_POST['fecha_nac'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch ($opcion) {
    case 1: //alta
        $consulta = "INSERT INTO formulario (dni,nombre,apellido,edad,fecha_nac) VALUES('$dni','$nombre', '$apellido', '$edad','$fecha_nac') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT id, dni,nombre,apellido,edad,fecha_nac FROM formulario ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE formulario SET dni='$dni' ,nombre='$nombre', apellido='$apellido', edad='$edad' ,fecha_nac='$fecha_nac' WHERE id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT id,dni,nombre,apellido,edad,fecha_nac FROM formulario WHERE id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3: //baja
        $consulta = "DELETE FROM formulario WHERE id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
