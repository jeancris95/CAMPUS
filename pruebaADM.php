<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once("./conexiones/conexionAdministrador.php");
            include_once("./conexiones/password_hasheado.php");
            $conexion=ConectaDB::singleton();
      if ($_SERVER['REQUEST_METHOD'] != "GET") {
          
      }
      if($_SERVER['REQUEST_METHOD'] != "GET"){
        $usu=$_POST['usuario'];
        $pass=$_POST['password'];
        $hasheado=Password::hash($pass);
        $rol="administrador";
/*         $date=date("Y-m-d H:i:s"); */
        $conexion->creacionAdmin($usu,$usu,$hasheado,$rol);
      }?>
    <form action="pruebaADM.php" method="POST">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="enviar">
    </form>
</body>
</html>