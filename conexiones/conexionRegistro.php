<?php
            class ConectaDB{
                private $conex ; private static $instancia;
                private function __construct(){
                    $this->conex=new PDO("mysql:host=localhost; dbname=campus",'root','');
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
                public function aniadir_registro($nombre,$apellido,$usuario,$dni,$correo,$telefono,$curso,$anio,$pass){
                  
                    $consulta=$this->conex->prepare("insert into alumnos(nombre,apellido,usuario,dni,correo,telefono,curso,anio,alta,password,fecha_registro)
                                                     values (?,?,?,?,?,?,?,?,'no',?,CURDATE())");
                    $consulta->bindParam(1,$nombre);
                    $consulta->bindParam(2,$apellido);
                    $consulta->bindParam(3,$usuario);
                    $consulta->bindParam(4,$dni);
                    $consulta->bindParam(5,$correo);
                    $consulta->bindParam(6,$telefono);
                    $consulta->bindParam(7,$curso);
                    $consulta->bindParam(8,$anio);
                    $consulta->bindParam(9,$pass);
                    if($consulta ->execute()){
                        return true;
                    }else{
                        return false;
                    }
                }
                public function consulta_dni($dni){
                    $consulta=$this->conex->prepare("select * from alumnos where dni=?");
                    $consulta->bindParam(1,$dni);
                    $consulta ->execute();
                    if($consulta->rowCount()>0){
                        return true;
                    }else{
                        return false;
                    }

                }
                public function consulta_mail($mail){
                    $consulta=$this->conex->prepare("select * from alumnos where correo=?");
                    $consulta->bindParam(1,$mail);
                    $consulta ->execute();
                    if($consulta->rowCount()>0){
                        return true;
                    }else{
                        return false;
                    }

                }
        }

/*         public function mostrarAvatares(){
            $consulta = $this->conex->prepare("select nombre,f_minima as 'Fuerza minima',
                                                f_acumulada as 'Fuerza acumulada',
                                                fecha_alta as 'fecha alta',
                                                fecha_baja as 'fecha baja' from avatar");
            $consulta->execute();
            if($consulta){
                $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                return $datos;
            }else{
                return false;
            }
         }
          public function reactivar($eleccion){
                        $consulta = $this->conex->prepare("update avatar set fecha_baja=null WHERE identificador = ?");
                        $consulta->bindParam(1,$eleccion);
                        if( $consulta->execute()){
                            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                            return $datos;
                        }else{
                            return false;
                        }
                    }
                public function insertarAutorias($login,$operacion,$datos){
                    $consulta = $this->conex->prepare("insert into auditoria (login,fecha,hora,operacion,datos) values (?,curDate(),curTime(),?,?)");
                    $consulta->bindParam(1,$login);
                    $consulta->bindParam(2,$operacion);
                    $consulta->bindParam(3,$datos);
                    if($consulta->execute()){
                        return true;
                    }else{
                        return false;
                    }
                 } */
?>