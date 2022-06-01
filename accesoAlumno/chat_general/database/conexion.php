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
                public function chat(){
                    $consulta=$this->conex->prepare("select * from chat order by id asc");
                    if( $consulta->execute()){
                        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                        return $datos;
                    }else{
                        return false;
                    }
            }
            public function chatsPrevios(){
                $consulta=$this->conex->prepare("select * from chat");
                $consulta->execute();
                if($consulta->rowCount()>0){
                    return true;
                }else{
                    return false;
                }
            }
            public function insertarMensaje($name,$msg){
                $consulta=$this->conex->prepare("insert into chat(name,message)values(?,?)");
                $consulta->bindParam(1,$name);
                $consulta->bindParam(2,$msg);
                if($consulta->execute()){
                    return true;
                }else{
                    return false;
                }
            }

}
?>