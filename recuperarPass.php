<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estiloRegistro.css">
    <title>Area de Registro</title>
    <style>
        html{
            background:#641c34;
            background:linear-gradient(to right,#ffa751,#641c34);
        }
    
    </style>
</head>
<body> 
<div class="container padding-bottom-3x mb-2 mt-5">
	    <div class="row justify-content-center">
	        <div class="col-lg-8 col-md-10">
	            <div class="forgot">
	                <h1>Olvidaste tu contraseña?</h1>
	                <p>Cambia la contraseña con 3 sencillos pasos</p>
	                <ol class="list-unstyled">
	                    <li><span class="text-primary text-medium">1. </span>Introduce tu direccion de correo</li>
	                    <li><span class="text-primary text-medium">2. </span>nuestro sistema te enviara un link  </li>
	                    <li><span class="text-primary text-medium">3. </span>Usa el link para restuarar la contraseña</li>
	                </ol>
	            </div>
	            <form class="card mt-4">
	                <div class="card-body">
	                    <div class="form-group"> <label for="email-for-pass">Introduzca su correo electronico</label> <input class="form-control" type="text" id="email-for-pass"></div>
	                </div>
	                <div class="card-footer"> <button class="btn btn-success" type="submit">obtener nueva contraseña</button> 
                    <a href="./formulario.php"><button class="btn btn-danger" type="submit">volver al Login</button></a> </div>
	            </form>
	        </div>
	    </div>
	</div>
</body>
</html>