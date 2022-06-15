<?php
 session_start();
include_once("./conexion/conexion.php");
$conexion=ConectaDB::singleton();
$allNotes=$conexion->consultar_notas($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./img/CAMPUS.png" rel="icon">
    <title>alumno</title>
    <link rel="stylesheet" href="./css/sb-admin-2.min.css">
    <link rel="stylesheet" href="../recursos/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../recursos/datatables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet"> 
    <link rel="stylesheet" href="./chat_general/estilosChatGeneral.css"> 
    <script src="https://kit.fontawesome.com/753c2dc8d2.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">
    <?php
           
            if($_SESSION['usuario']==null){
                header("location:../index.php"); 
            }
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="inicio.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <!-- Aqui ira el Nombre del Administrador -->
                <div class="sidebar-brand-text mx-3">Alumno</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
           

            <li class="nav-item">
                <a class="nav-link collapsed" href="notas.php">
                    <i class="fa-solid fa-person"></i>
                    <span>Notas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="chat_general/chatGeneral.php">
                    <i class="fa-solid fa-person"></i>
                    <span>Chat Global</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="./subidaArchivo.php">
                    <i class="fa-solid fa-person"></i>
                    <span>Subir apuntos de apoyo</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="./apuntesProfesor.php">
                    <i class="fa-solid fa-person"></i>
                    <span>Apuntes profesor</span>
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

                    
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php  echo $_SESSION['usuario'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="./img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                      
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../cierreSesion.php" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
    </nav>
<!-- codigo -->
<nav class="navbar navbar-expand-lg 
                navbar-light"style='background-color:#00c2cb'>
        <a class="navbar-brand" href="#">
            <p style="font-size: 30px;">
                    Notas Tomadas
            </p>
  
        </a>
    </nav>
  
    <div class="container my-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Agregar Nota
                </h5>
                <div class="form-group">
                    <textarea class="form-control" 
                        id="addTxt" rows="3">
                    </textarea>
                </div>
                <button class="btn btn-primary" 
                    id="addBtn" style=
                    "background-color:#00c2cb">
                    Agregar nota
                </button>
            </div>
        </div>
        <hr>
        <h1>Tus notas</h1>
        <hr>
          
        <div id="notes" class="row container-fluid"> 
        </div>
    </div>
<?php  $i=1;
    foreach ($allNotes as $value) {
            ?>
            <div class="noteCard my-2 mx-2 card col-12"style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title"> 
                       Nota <?php echo $i ?>
                    </h3>
                    <p class="card-text" name="parrafo<?php echo$value["id"];?>"> 
                        <?php echo $value["nota"] ?>
                    </p>
                    <input type="hidden" id="nota<?php echo$i?>" value="<?php echo $value["id"];?>">
                    <button id='boton<?php echo$i?>' name="nota" class="btn btn-danger">eliminar</button>
                    </div>
            </div>
        <?php
        $i++;
        }


?>

<!-- fin codigo -->

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
    <script src="../recursos/jquery/jquery.min.js"></script>
    <script src="../recursos/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../recursos/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="../recursos/datatables.min.js"></script>

    <script src="./notas.js"></script>
</body>

</html>
