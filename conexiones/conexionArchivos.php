<?php
    /* conexion Administrador va a tener todos los permisos tanto como para de alta como para dar de baja  */
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
    
                 public function insertarArchivos($id,$nombre,$titulo,$archivo){
                        $consulta=$this->conex->prepare("insert into archivos(user_id,name,titulo,archivo)
                                                        values (?,?,?,?)");
                                    $consulta->bindParam(1,$id);
                                    $consulta->bindParam(2,$nombre);
                                    $consulta->bindParam(3,$titulo);
                                    $consulta->bindParam(4,$archivo);
                                    $consulta ->execute();
                 }
      }
    ?>