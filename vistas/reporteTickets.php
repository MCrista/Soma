<?php 
    include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1|| $_SESSION['usuario']['rol']==3){
        include "../clases/Conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
?>


<!-- Page Content -->
<div class="container-fluid">
        <div class="card border-0 shadow my-1">
            <div class="card-body p-3">
                <h5 class="fw-light">Reportes</h5>
                <p class="lead"> 
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearReporte">
                        Crear Reporte
                    </button>
                    <hr>
                    <div id="tablaReporteClienteLoad"></div>
                </p>
            </div>      
        </div>
    </div> 

<?php 
    include "reportesCliente/modalCrearReporte.php";
    include "footer.php" ;
?>
    <script src="../public/js/reportesCliente/reportesCliente.js"></script>
<?php

    } else {
        header("location:../index.html");
    }
?>