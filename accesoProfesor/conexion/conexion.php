<?php
            class ConectaDB{
                private $conex ; private static $instancia;
                private function __construct(){
                    $this->conex=new PDO("mysql:host=localhost; dbname=alumnos",'root','');
                }
                public static function singleton(){ //método singleton que crea instancia sí no está creada
                    if (!isset(self::$instancia)) {
                        $miclase = __CLASS__;
                        self::$instancia = new $miclase;
                     }
                    return self::$instancia;
                }
                public function __clone(){  // Evita que el objeto se pueda clonar
                    trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
                }
                public function cursosImparte($nombre,$apellido){
                    $consulta=$this->conex->prepare("select distinct curso_imparte from profesores where nombre=? and apellido=?");
                    $consulta->bindParam(1,$nombre);
                    $consulta->bindParam(2,$apellido);
                    $consulta ->execute();
                    if($consulta){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                }
                public function listarAsignaturas($nombre,$apellido,$key){
                    $consulta=$this->conex->prepare("select asignatura from profesores where nombre=? and apellido=? and curso_imparte=?");
                    $consulta->bindParam(1,$nombre);
                    $consulta->bindParam(2,$apellido);
                    $consulta->bindParam(3,$key);
                    $consulta ->execute();
                    if($consulta){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                }
                public function archivosProf(){
                    $consulta=$this->conex->prepare("select * from archivos_profesores");
                    $consulta ->execute();
                    if($consulta){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                }
                public function todosLosAlumnos($curso){
                    $consulta=$this->conex->prepare("select * from alumnos where upper(curso)= ?");
                    $curs=strtoupper($curso);
                    $consulta->bindParam(1,$curs);
                    $consulta ->execute();
                    if($consulta){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                }
  }
?>

