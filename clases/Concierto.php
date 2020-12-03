<?php
class Concierto  
{  
 
  public function __construct() { 
      //echo 'He creado un objeto de tipo concierto';
                   
    } 
    public function listar_entradas_libres($con)
  {
    //echo 'voy a mirar si hay entradas libres';
    $sql = "select * from plazas";
    $listado = $con->prepare($sql);
    $listado->execute();
    //$filas es un array asociativo con los registros de la consulta
    $filas = $listado->fetchAll();
    echo '<pre>';
       var_dump($filas);
    echo '</pre>';
  }   
  public function entradas_libres($con,$grada,$pista_golden,$pista)
  {
    //echo 'voy a mirar si hay entradas libres';
    $sql = "select * from plazas";
    $listado = $con->prepare($sql);
    $listado->execute();
    //$filas es un array asociativo con los registros de la consulta
    $filas = $listado->fetchAll();
    //echo '<pre>';
   //var_dump($filas);
    //echo '</pre>';

   if (($filas[0][0]>=$grada) and ($filas[0][1]>=$pista_golden) and ($filas[0][2]>=$pista))
   {
     return 1;
   }
   else
   {
      return 0;
       //echo "<script> alert('No existen tantas entradas como has solicitado')</script>";
   }

  }

  public function modificar_plazas_libres($con,$grada,$pista_golden,$pista)
  {
    $sql="update plazas set 
    Num_Plazas_Grada=Num_Plazas_Grada-?, 
    Num_Plazas_Pista_Golden=Num_Plazas_Pista_Golden-?,
    Num_Plazas_Pista=Num_Plazas_Pista-? 
    ";
    $modificacion = $con->prepare($sql);
    $modificacion->execute(array($grada,$pista_golden,$pista));
    $filas_afectadas= $modificacion->rowCount();
   if( $filas_afectadas > 0 )
      //echo "<script> alert('Se han modificado las plazas libres correctamente')</script>";
      header('Location: index.php');
}

  
}//clase