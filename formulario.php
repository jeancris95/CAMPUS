<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
   <script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
   <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
   <meta name="google-signin-client_id" content="58387390855-indvlcv89q89f215jtismcd1spmvmve3.apps.googleusercontent.com">
    <style>
        body{
            background:#641c34;
            background:linear-gradient(to right,#ffa751,#641c34);
        }
   
        .bg{
            background-image:url(./img/programacion.jpg);
            background-position:center center;    
            }
        .ocultoUsuario,.ocultoPass{
                color:red;
        }
   
    </style>
</head>
<body>
    <?php
    session_start();
        include_once("filtrado.php");
        include_once("./conexiones/conexionAdministrador.php");
        include_once("./conexiones/password_hasheado.php");
        $conexion=ConectaDB::singleton();
        if ($_SERVER['REQUEST_METHOD'] != "GET") {
            $usuario=filtrado($_POST['Usuario']);
            $pass=filtrado($_POST['Password']);
            $roll=$_POST['roll'];
            $errores=[];
            if(empty($usuario)){
                $errores["usuario"]="campo usuario vacio";
            }  
            if(empty($pass)){
                $errores["pas"]="campo Password vacio";
            }
            if(!empty($usuario) && !empty($pass)){
                switch($roll){
                    case "administrador":
                        if($conexion->existeUsuario($usuario,$roll)){
                            $resultado=$conexion->existeUsuario($usuario,$roll);
                           // var_dump($resultado[0]["password"]);
                           if(!Password::verify($pass,$resultado[0]["password"])){
                                    $errores["pass_erronea"]="contrase??a incorrecta";
                           }
                        }else{
                            $errores["usuario_erroneo"]="usuario erroneo";
                        }
                         break;
                    case "alumno":
                        //comprobamos si existe el ususario en la base de datos que coincida con el rol alumno y con las credenciales podra pasar al area de alumnos.
                        if($conexion->existeUsuario($usuario,$roll)){
                            $resultado=$conexion->existeUsuario($usuario,$roll);
                            if(!Password::verify($pass,$resultado[0]["password"])){
                                $errores["pass_erronea"]="contrase??a incorrecta";
                            }
                        }else{
                            $errores["usuario_erroneo"]="usuario erroneo";
                        }
                            break;
                    case "profesor":
                        if($conexion->existeUsuario($usuario,$roll)){
                            $resultado=$conexion->existeUsuario($usuario,$roll);
                            if(!Password::verify($pass,$resultado[0]["password"])){
                                $errores["pass_erronea"]="contrase??a incorrecta";
                            }
                        }else{
                            $errores["usuario_erroneo"]="usuario erroneo";
                        }
                            break;
                }
            }
        }
        if ($_SERVER['REQUEST_METHOD'] != "GET" and empty($errores)) { 
                $id=$conexion->id($usuario);
                switch($roll){
                    case "administrador":
                        $_SESSION['usuario']=$usuario;
                        $_SESSION['user_id']=$id[0]["user_id"];
                        $_SESSION['adm']=$roll;
                        header("location:./accesoAdmin/inicio.php");
                        break;
                    case "alumno":
                        $_SESSION['usuario']=$usuario;
                        $_SESSION['user_id']=$id[0]["user_id"];
                        $_SESSION['alumno']=$roll;
                        header("location:./accesoAlumno/inicio.php");
                    break;
                    case "profesor":
                        $_SESSION['usuario']=$usuario;
                        $_SESSION['user_id']=$id[0]["user_id"];
                        $_SESSION['profesor']=$roll;
                    header("location:./accesoProfesor/inicio.php"); 
                    break;
                }
        }else{
    ?>
    <div class="container w-75 bg-secondary mt-5 rounded shadow">
        <div class="row align-item-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

            </div>
            <div class="col bg-white p-5 rounded-end">
                <div class="text-end">
                <a href="./index.php"><img src="./accesoAlumno/img/CAMPUS.png" width="48" alt="logo"></a>
                </div>
                <h2 class="fw-bold text-center py-5">Bienvenido</h2>
                <!-- login -->
                <form method="post" action="formulario.php">
                    <div class="mb-4">
                        <label class="form-label" for="Usuario">Usuario</label>
                        <input type="text" id="Usuario" name="Usuario" class="form-control" value="<?php echo (!empty($_POST['Usuario'])) ? $_POST['Usuario'] : '' ?>">
                        <?php
                            if(!empty($errores["usuario"])){
                                ?>
                                <p  class="ocultoUsuario"><?php echo $errores["usuario"];?></p>
                         <?php
                            } 
                            if(!empty($errores["usuario_erroneo"])){
                                ?>
                                <p  class="ocultoUsuario"><?php echo $errores["usuario_erroneo"];?></p>
                         <?php
                        }
                        ?>
                    </div>
                    <div class="mb-4">
                    <label class="form-label" for="Password">Password</label>
                   
                    <input type="password" id="Password" name="Password" class="form-control">
                    <?php
                            if(!empty($errores["pas"])){
                                ?>
                                <p  class="ocultoPass"><?php echo $errores["pas"];?></p>
                         <?php
                            }
                            if(!empty($errores["pass_erronea"])){
                                ?>
                                <p  class="ocultoPass"><?php echo $errores["pass_erronea"];?></p>
                        <?php
                            }
                                ?>
                    </div>
                    <div class="mb-4">
                    <label class="form-label" for="roll">Roll</label>
                    <select name="roll" id="roll" class="form-control">
                        <option value="alumno">Alumno</option>
                        <option value="profesor" >Profesor</option>
                        <option value="administrador" selected>Administrador</option>
                    </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" id="boton">Iniciar Sesion</button>
                    </div>

                    <div class="my-3">
                        <span>No tienes cuenta ? <a href="registro.php">Registrate</a></span><br>
                        <span><a href="recuperarPass.php">Recuperar Password</a></span>
                    </div>
                </form>
                <!-- LOGIN CON REDES SOCIALES -->
                <div class="container w-100 my-5">
                    <div class="row text-center">
                        <div class="col12">
                            Iniciar Sesi??n
                        </div>
                   
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-outline-primary w-100  my-1">
                                        <div class="row align-items-center">
                                                    <div class="col-2 d-none d-md-block">
                                                        <img src="./img/facebook.png" width="32" alt="facebook">
                                                    </div>
                                                    <div class="col-12 col-md-10 text-center ">
                                                        Facebook
                                                    </div>
                                        </div>
                                </button>
                            </div>
                            <div class="col">
                            <button class="btn btn-outline-danger w-100 my-1" data-onsuccess="onSignIn">
                                        <div class="row align-items-center my-1 g-signin2" >
                                                    <div class="col-2 d-none d-md-block ">
                                                        <img src="./img/google.png" width="32" alt="google">
                                                    </div>
                                                    <div class="col-12 col-md-10 text-center ">
                                                        Google
                                                    </div>
                                        </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="./signin.js"></script>
</body>
</html>