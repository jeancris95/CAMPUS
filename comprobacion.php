<?php
function comprobarSesion(){
     
            if(!isset($_SESSION['adm'])){
                header("Location:../inicioSesion/inicio.php");
            }
        }
?>