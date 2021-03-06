<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/CAMPUS.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estiloRegistro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <title>Area de Registro</title>
    <style>
        html{
            background:#641c34;
            background:linear-gradient(to right,#ffa751,#641c34);
        }
        .centrado{
            color: red;
        }
        h1{
            color: white;
            text-align: center;
        }
    </style>
</head>
<body> 
    <?php
        include_once("filtrado.php");
        include_once("./conexiones/conexionRegistro.php");
        include_once("./conexiones/password_hasheado.php");
        $conexion=ConectaDB::singleton();
          if ($_SERVER['REQUEST_METHOD'] != "GET") {
            $name=filtrado($_POST['nombre']);
            $surname=filtrado($_POST['apellido']);
            $dni=filtrado($_POST['dni']);
            $mail=filtrado($_POST['correo']);
            $telephone=filtrado($_POST['telefono']);
            $pass=filtrado($_POST['password']);
            $passConfirm=filtrado($_POST['password_confirm']);
            $errores=[];
            $formato='/^[0-9]{8}[A-Z]$/';
            $formato2="/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/";
            if(empty($name)){
                $errores['name']="- el nombre no puede estar vacio";
            }
            if(empty($surname)){
                $errores['apellido']="- no puede estar vacio el campo de apellido";
            }
            if(empty($dni)){
                $errores['dni']="- no puede estar vacio el campo del DNI";
            }else if(!preg_match($formato,$dni)){
                $errores['dni']="- esta mal el formato del DNI";
            }
            if(!preg_match($formato2,$mail)){
                $errores['mail']="- esta mal el correo electronico";
            }
            if(strlen($telephone)!=9){
                $errores['telefono']="- n??mero de telefono erroneo";
            }
            if(empty($pass)){
                $errores["pass"]="-no puede estar vacio el campo password";
            }
            if(empty($passConfirm)){
                $errores["passConfirm"]="-no puede estar vacio el campo password";
            }
            if(!empty($pass) && !empty($passConfirm)){
                    if(strcmp($pass,$passConfirm)!==0){
                        $errores["passDiff"]="-tienen que ser las mismas passwords";
                    }
            }
            if($conexion->consulta_dni($dni)){
                 $errores['existe']="- ya existe un usuario con ese DNI"; 
            } 
            if($conexion->consulta_mail($mail)){
                $errores['existe']="- ya existe un usuario con ese Mail"; 
            }
    }
    if($_SERVER['REQUEST_METHOD'] != "GET" and empty($errores)){
        $curso=$_POST['curso'];
        $usuario=$name.".".$surname;

        $hasheoPass=Password::hash($pass);
          if($conexion->aniadir_Registro($name,$surname,$usuario,$dni,$mail,$telephone,$curso,$hasheoPass)){
              ?>
              <h1> Introducido correctamente en la BD espere a que sea dado de alta </h1>
              <?php
             header("refresh:3;url=formulario.php");
        }   
    }else{
    ?>
    <div class="container" id="registro">
            <a href="formulario.php"><i class="bi bi-arrow-left-square-fill"></i></a>
           
            <div class="row">
                <div class="col"> <h2>Area de Registros</h2></div>
                <div class="col"><img src="./accesoAlumno/img/CAMPUS.png" width="48" alt=""></div>
            </div> 
            
            <form action="registro.php" method="POST" >
            <div class="form-group">  
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" value="<?php echo (!empty($_POST['nombre'])) ? $_POST['nombre'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="apellido">apellido</label>
                <input type="text" name="apellido" class="form-control"  id="apellido" placeholder="apellido" value="<?php echo (!empty($_POST['apellido'])) ? $_POST['apellido'] : '' ?>">
            </div>
            <div  class="form-group">
                <label for="dni">DNI</label>
                <input type="text" name="dni" class="form-control"  id="dni" value="<?php echo (!empty($_POST['dni'])) ? $_POST['dni'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control"  id="password" placeholder="password">
            </div>
            <div class="form-group">
                <label for="password_confirm">repita Password</label>
                <input type="password" name="password_confirm" class="form-control"  id="password_confirm" placeholder="password">
            </div>
           
            <div class="form-group">
                <label for="correo">correo</label>
                <input type="email" name="correo" class="form-control"  id="correo" value="<?php echo (!empty($_POST['correo'])) ? $_POST['correo'] : '' ?>">
            </div>
             <div class="form-group">
                <label for="telefono">telefono</label>
                <input type="tel" name="telefono" id="telefono" class="form-control"  pattern="[0-9]{9}" value="<?php echo (!empty($_POST['telefono'])) ? $_POST['telefono'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="curso">curso</label>
                <select name="curso" id="curso" class="form-control">
                    <option value="DAM" <?php
                    if(isset($_POST['curso']) and $_POST['curso']=="DAM"){
                    echo "Selected";
                         }
                ?>>DAM</option>
                    <option value="DAW" <?php
                    if(isset($_POST['curso']) and $_POST['curso']=="DAW"){
                    echo "Selected";
                         }
                ?>>DAW</option>
                    <option value="ASIR"  <?php
                    if(isset($_POST['curso']) and $_POST['curso']=="ASIR"){
                    echo "Selected";
                         }
                ?>
                    >ASIR</option>
                    <option value="SMR"  <?php
                    if(isset($_POST['curso']) and $_POST['curso']=="SMR"){
                    echo "Selected";
                         }
                ?>>SMR</option>
                </select>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <input type="submit" value="enviar" class="btn btn-primary btn-lg btn-responsive" id="enviar">
            </div>
        </form>
        <br>
        <hr>
        <div class="centrado">
        <?php
            }
            if(!empty($errores)){
                foreach ($errores as $key => $value) {
                    echo $value;
                    echo("<br>");
                }
            }

            ?>
        </div>
    </div>
</body>
</html>