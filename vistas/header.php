<?php

    session_start();
       
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../public/css/plantilla.css">
        <link rel="stylesheet" href="../public/datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../public/fontawesome/css/all.css">
        <link rel="stylesheet" href="../public/datatable/buttons.dataTables.min.css">
        <title>Soma</title>
    </head>
    <body>


        <nav class="navbar navbar-expand-md navbar-light bg-dark static-top mb-1 shadow">
        <?php include "alerta.php" ?>
            <div class="container-fluid">
                <a class="navbar-brand" href="inicio.php">
                    <img src="../public/img/somaLogoBarra.png" width="80%" alt="Logo Gobo">
                </a>   
                <button class="navbar-toggler" type="button" data-toggle="collapse" 
                        data-target="#navbarResponsive" aria-controls="navbarResponsive" 
                        aria-expanded="false" aria-label="Toggle navigation">  
                <span class="navbar-toggler-icon"></span>
                </button> 
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="inicio.php">
                            <span class="fas fa-home"></span> Inicio
                        </a>
                    </li>
                <?php if($_SESSION['usuario']['rol'] == 1) { ?>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="proyecto.php">
                            <span class="fas fa-laptop"></span> Proyecto
                        </a>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link" href="reporteTickets.php">
                            <span class="fas fa-file-alt"></span> Reporte Tickets
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">
                        <span class="fas fa-users"></span> Usuarios
                        </a>
                    </li>
                    <ul>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearTickets">
                            Crear
                    </button>
                    </ul>
                <?php } else if($_SESSION['usuario']['rol']==3) { ?>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="proyecto.php">
                            <span class="fas fa-laptop"></span> Proyecto
                        </a>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link" href="reporteTickets.php">
                            <span class="fas fa-file-alt"></span> Reporte Tickets
                    </a>
                    </li>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearImpedimento">
                            Crear
                    </button>
                <?php } else if($_SESSION['usuario']['rol'] == 2) { ?>
                    <!--Administrador-->
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">
                        <span class="fas fa-users"></span> Usuarios
                        </a>
                    </li>
                <?php } ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="notificaciones.php">
                        <span class="fas fa-bell"></span> Notificaciones   
                        <span class="top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        2
                        <span class="visually-hidden"></span>                 
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color:black; 
                            display: flex; align-items: center; justify-content: center;" 
                            class="nav-link dropdown-toggle" href="#" 
                            role="button" data-toggle="dropdown" aria-expanded="false">
                            <span class="fas fa-user"></span>
                            <?php echo $_SESSION['usuario']['nombre']; ?>
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" 
                            data-toggle="modal" 
                            data-target="#modalActualizarDatosPersonales"
                            onclick="obtenerDatosPersonalesInicio('<?php echo $_SESSION['usuario']['id']; ?>')">
                            <span class="fas fa-user-edit"></span> Editar
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../procesos/login/salir.php">
                        <span class="fas fa-sign-out-alt"></span> Salir
                    </a>
                        </div>
                        
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <script>
            document.querySelectorAll('.nav-item a').forEach(link => {
                if (link.href === window.location.href) {
                    link.parentElement.classList.add('active');
                }
            });
        </script>
        <?php 
            include "inicio/modalActualizarDatosPersonales.php";
            include "proyecto/modalCrearTickets.php";
            include "proyecto/modalCrearImpedimento.php";
        ?>
    </body>

</html>
<script src="../public/js/proyecto/tickets.js"></script>   