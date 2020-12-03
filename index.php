<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script>
        (function ($) {
            $(function () {
                // Plugin initialization
                $('select').not('.disabled').formSelect();
            });
        })(jQuery); // end of jQuery name space
    </script>
</head>

<body>

          
    <div class="row">

        <div class="col s10 m4 l10 blue center-align card-panel teal lighten-2">
            <h3>Venta Entradas  WiZink Center </h3>
        </div>
        <img src="imagenes/fachada.jpg" alt="Girl in a jacket" width="600" height="220"> 
        

        <form class="col s10" action="actualizar.php" method="POST">
            <div class="row">
                
                
                
                <div class="row "></div> <!-- linea en blanco -->
                <div class="input-field col s2">
                    <select  name="cmb_grada">
                    <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label> Asientos Grada</label>
                </div>
                <div class="input-field col s2">
                    <select  name="cmb_pista_golden">
                    <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label> Asientos General Pistal Golden</label>
                </div>
                <div class="input-field col s2">
                    <select  name="cmb_pista">
                    <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label> Asientos General Pista</label>
                </div>
                

                <div class="row "></div> <!-- linea en blanco -->
                <div class="col s4">

                    <button class="btn waves-effect waves-light" type="submit" name="action">Calcular

                    </button>

                </div>
                
            </div>
        </form>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
<?php
require_once 'clases/Conexion.php';
require_once 'clases/Concierto.php';
try{
    $obj_conexion=new Conexion();
    $con=$obj_conexion->conectar();//ya tengo en esa variable la conexion
    $obj_concierto=new Concierto();
    $entradas=$obj_concierto->listar_entradas_libres($con);
}catch (PDOException $e) {
    echo "Fallo en el acceso a la BD" . $e->getMessage();
    
}  
