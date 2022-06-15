<?php
            class ConectaDB{
                private $conex ; private static $instancia;
                private function __construct(){
                    $this->conex=new PDO("mysql:host=localhost; dbname=campus",'administrador','1234');
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
                        $consulta=$this->conex->prepare("select * from profesores ORDER BY id DESC LIMIT 1");
                        if( $consulta->execute()){
                            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                            return $datos;
                        }else{
                            return false;
                        }
                }
                public function tablaProfesoresTotal(){ 
                    $consulta=$this->conex->prepare("select id,nombre,apellido,curso_imparte,correo,password from profesores");
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
            }
            //inserta los profesores en la tabla profesores
                public function insertarProfesor($nombre,$apellido,$dni,$curso,$correo,$password,$usuario){
                    $consulta=$this->conex->prepare("insert into profesores(nombre,apellido,dni,curso_imparte,correo,password,usuario)
                                                    values (?,?,?,?,?,?,?)");
                                $consulta->bindParam(1,$nombre);
                                $consulta->bindParam(2,$apellido);
                                $consulta->bindParam(3,$dni);
                                $consulta->bindParam(4,$curso);
                                $consulta->bindParam(5,$correo);
                                $consulta->bindParam(6,$password);
                                $consulta->bindParam(7,$usuario);
                                $consulta ->execute();
                 }
            //inserta los profesores en la tabla usuarios
            public function insertarUsuario($name,$usuario,$correo,$dni,$password){
                $consulta=$this->conex->prepare("insert into usuarios(name,username,correo,dni,password,rol)values (?,?,?,?,?,'profesor')");
                            $consulta->bindParam(1,$name);
                            $consulta->bindParam(2,$usuario);
                            $consulta->bindParam(3,$correo);
                            $consulta->bindParam(4,$dni);
                            $consulta->bindParam(5,$password);
                            $consulta ->execute();
             }

                 public function editar($nombre,$apellido,$curso,$dni,$correo,$password,$usuario,$id){
                    $consulta=$this->conex->prepare("update profesores set nombre= ?,apellido=?,curso_imparte=?,dni=?,correo=?,password=?,usuario=? where id=? ");
                    $consulta->bindParam(1,$nombre);
                    $consulta->bindParam(2,$apellido);
                    $consulta->bindParam(3,$curso);
                    $consulta->bindParam(4,$dni);
                    $consulta->bindParam(5,$correo);
                    $consulta->bindParam(6,$password);
                    $consulta->bindParam(7,$usuario);
                    $consulta->bindParam(8,$id);
                  
                    $consulta ->execute();
                }
                //editar usuario de la tabla usuario

                public function mostrarEditar($id){
                    $consulta=$this->conex->prepare("select * from profesores where id=?");
                    $consulta->bindParam(1,$id);
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
                }
                public function borrar($id){
                    $consulta=$this->conex->prepare("delete from profesores where id=?");
                    $consulta->bindParam(1,$id);
                    $consulta->execute();
                }
                //borrar de la tabla usuarios
                public function borrarUsuario($usuario){
                    $consulta=$this->conex->prepare("delete from usuarios where username=?");
                    $consulta->bindParam(1,$usuario);
                    $consulta->execute();
                }

                public function pendientesAlta(){
                    $consulta=$this->conex->prepare("select nombre,apellido,usuario,dni,correo,telefono from alumnos where alta='no' ");
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }

                }
                public function dadosDeAlta(){
                    $consulta=$this->conex->prepare("select nombre,apellido,usuario,dni,correo,telefono from alumnos where alta='si' ");
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }

                }
                public function dadosAlta(){
                    $consulta = $this->conex->prepare("select count(*) from alumnos where alta='si'");
                    $consulta->execute();
                    if($consulta){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }  
             }
             public function Pendientes(){
                $consulta = $this->conex->prepare("select count(*) from alumnos where alta='no'");
                $consulta->execute();
                if($consulta){
                    $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                    return $datos;
                }else{
                    return false;
                }  
         }

            public function totalProfes(){
                $consulta = $this->conex->prepare("select count(*) from profesores");
                $consulta->execute();
                if($consulta){
                    $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                    return $datos;
                }else{
                    return false;
                }  
         }
        
  }
?>