<?php
require_once 'clases/Conexion.php';
require_once 'clases/Concierto.php';
$grada=$_REQUEST['cmb_grada'];
$pista_golden=$_REQUEST['cmb_pista_golden'];
$pista=$_REQUEST['cmb_pista'];
try{
    $obj_conexion=new Conexion();
    $con=$obj_conexion->conectar();//ya tengo en esa variable la conexion
    $obj_concierto=new Concierto();
    $entradas=$obj_concierto->entradas_libres($con,$grada,$pista_golden,$pista);
    if($entradas==0)
    { // no hay entradas
        echo "<script> alert('No existen tantas entradas como has solicitado')</script>";
    }else{
        $obj_concierto->modificar_plazas_libres($con,$grada,$pista_golden,$pista);
    }
  

}catch (PDOException $e) {
        echo "Fallo en el acceso a la BD" . $e->getMessage();
        
    }  