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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Profesor</title>
    <link rel="stylesheet" href="../css/sb-admin-2.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet"> 
    <link rel="stylesheet" href="./estilosChatGeneral.css"> 
    <script src="https://kit.fontawesome.com/753c2dc8d2.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">
    <?php
           
            if($_SESSION['usuario']==null){
                header("location:../../index.php"); 
            }
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->    
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <!-- Aqui ira el Nombre del Administrador -->
                <div class="sidebar-brand-text mx-3">Profesor</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../matriculados.php">
                    <i class="fa-solid fa-person"></i>
                    <span>Matriculados</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../notas.php">
                    <i class="fa-solid fa-person"></i>
                    <span>Apuntes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../avisos.php">
                    <i class="fa-solid fa-person"></i>
                    <span>Avisos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="./chatGeneral.php">
                    <i class="fa-solid fa-person"></i>
                    <span>Chat General</span>
                </a>
            </li>
 
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                       
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php  echo $_SESSION['usuario'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                      
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../cierreSesion.php" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

<div class="m-0 row justify-content-center">
	<div class="container">

			<h2 class="titulo">Bienvenid@ <span style=" font-weight: 600;" class="msg"><?php echo $_SESSION['usuario']; ?> </span> a Nuestro Chat Global</h2>
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

		<form class="form-horizontal" method="post" id="enviar" >
			<div class="form-group">
				<div class="col-sm-9">
					<textarea name="msg" class="form-control" style="border: ridge 2px #56abf1;color: #000;" placeholder="Ingrese su Mensaje" id="mensaje"></textarea>
				</div>
				<br>
				<div class="col-sm-3">
					<button type="submit" class="btn btn-primary" style="font-size: 22px;">Enviar</button>
				</div>

			</div>
		</form>
	</div>
</div>
</div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <img src="./../img/CAMPUS.png" width=100 alt="">
                    </div>
                </div>
            </footer>
    

        </div>


    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="../vendor/datatables/datatables.min.js"></script>
    <script src="./envio.js"></script>
    <script>
		$(document).ready(function() {
                $('#display-chat').scrollTop( $('#display-chat').prop('scrollHeight') ); 
			});
	</script>
</body>

</html>
<?php
} else {
	header('location:../../index.php');
}
?>