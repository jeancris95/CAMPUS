<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estiloRegistro.css">
    <title>Area de Registro</title>
    <style>
        html{
            background:#641c34;
            background:linear-gradient(to right,#ffa751,#641c34);
        }
		a{
			text-decoration: none;
			color:white;
		}
		.nada{
			display:none;
			color:red;
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
	            <div class="card mt-5">
	                <div class="card-body">
	                    <div class="form-group"> <label for="email-for-pass">Introduzca su correo electronico</label> <input class="form-control" type="text" id="email-for-pass"></div>
						<p id="comprobacion" class="nada">El campo Correo Electronico no puede estar vacio</p>
					</div>
	                <div class="card-footer"> <button class="btn btn-success"  id="enviar">obtener nueva contraseña</button> 
                    <button class="btn btn-danger" id="btnRegresar">ir al formulario</button> </div>
	</div>
	        </div>
	    </div>
	</div>
<script src="./accesoAdmin/vendor/jquery/jquery.min.js"></script>
<script src="comprobacion.js"></script>
</body>
</html>