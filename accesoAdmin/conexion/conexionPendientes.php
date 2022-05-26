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
                public function tablaProfesores(){ 
                    $consulta=$this->conex->prepare("select * from registro");
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
            }
                public function darAlta($alta,$dni){
                    $consulta=$this->conex->prepare("update alumnos set alta=?  where dni=? ");
                    $consulta->bindParam(1,$alta);
                    $consulta->bindParam(2,$dni);
                    $consulta ->execute();
                }
                public function datosCorreo($dni){
                    $consulta=$this->conex->prepare("select * from alumnos where dni=?");
                    $consulta->bindParam(1,$dni);
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                }
                public function darBaja($dni){
                    $consulta=$this->conex->prepare("delete from alumnos where dni=?");
                    $consulta->bindParam(1,$dni);
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                }
                public function aniadirUsuario($name,$user,$dni,$pass,$rol){
                    $consulta=$this->conex->prepare("insert into usuarios(name,username,dni,password,rol)values (?,?,?,?,?)");
                    $consulta->bindParam(1,$name);
                    $consulta->bindParam(2,$user);
                    $consulta->bindParam(3,$dni);
                    $consulta->bindParam(4,$pass);
                    $consulta->bindParam(5,$rol);
                    $consulta ->execute();
                }
                public function consultaCurso($curso){
                    $consulta=$this->conex->prepare("select nombre,apellido from profesores where upper(curso_imparte)=?");
                    $cursoM=strtoupper($curso);
                    $consulta->bindParam(1,$cursoM);
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
            }
            public function insertarAlumno($nombreCurso,$nombre,$alumno){
                $consulta=$this->conex->prepare("insert into cursos(nombre_curso,profesor_imparte,alumno)values (?,?,?)");
                $consulta->bindParam(1,$nombreCurso);
                $consulta->bindParam(2,$nombre);
                $consulta->bindParam(3,$alumno);
                $consulta ->execute();
            }
     }

?>