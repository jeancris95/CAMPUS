
<?php
session_start();
if (isset($_SESSION['usuario'])) {
	include "./database/conexion.php";
	$conexion=ConectaDB::singleton();
	$chats=$conexion->chat();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">	
<!-- 	<meta http-equiv="refresh" content="20"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<title>Document</title>
	<style>
		.titulo {
			color: black;
		}

		.msg {
			color: black;
			font-weight: bold;
		}

		.container {
			margin-top: 3%;
			width: 60%;
			background-color: #FFC600;
			padding-right: 10%;
			padding-left: 10%;
			border: #120633 5px solid;
			border-radius: 5%;
		}



		.display-chat {
			height: 300px;
			background-color: #00c2cb;
			margin-bottom: 4%;
			overflow: auto;
			padding: 15px;
		}

		.message {
			background-color: #56abf1;
			color: white;
			border-radius: 5px;
			padding: 5px;
			margin-bottom: 3%;
			border: 2px ridge #000;
		}
	</style>
</head>
<body>
<script>
		$(document).ready(function() {
			// Set trigger and container variables
			var trigger = $('.container .display-chat '),
				container = $('#content');

			// Fire on click
			trigger.on('click', function() {
				// Set $this for re-use. Set target from data attribute
				var $this = $(this),
					target = $this.data('target');

				// Load target page into container
				container.load(target + '.php');

				// Stop normal link behavior
				return false;
			});
			$('#display-chat').scrollTop( $('#display-chat').prop('scrollHeight') ); 
		});
	</script>

	<div class="container1">
		
			<h2 class="titulo">Bienvenid@ <span style=" font-weight: 600;" class="msg"><?php echo $_SESSION['adm']; ?> </span> a Nuestro Chat Global</h2>
		</br>
		<div class="display-chat" id="display-chat">
			<?php
			if ($conexion->chatsPrevios()) {
				foreach ($chats as $key => $value) {
			
				?>
						<div class="message">
							<p>
								<span class="msg"><?php echo $value['name']; ?> :</span>
								<?php echo $value['message']; ?>
							</p>
						</div>
					<?php
					}
			} else {
				?>
				<div class="message">
					<p>
						No hay ninguna conversación previa.
					</p>
				</div>
			<?php
			}
			?>

		</div>

		<form class="form-horizontal" method="post" action="sendMessage.php">
			<div class="form-group">
				<div class="col-sm-10">
					<textarea name="msg" class="form-control" style="border: ridge 2px #56abf1;color: #000;" placeholder="Ingrese su Mensaje"></textarea>
				</div>
				<br>
				<div class="col-sm-2">
					<button type="submit" class="btn btn-primary" style="font-size: 22px;">Enviar</button>
				</div>

			</div>
		</form>
	</div>
</body>
</html>
<?php
} else {
	header('location:index.php');
}
?>