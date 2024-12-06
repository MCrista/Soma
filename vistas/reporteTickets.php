<?php 
    include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1|| $_SESSION['usuario']['rol']==3){
        include "../clases/Conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
?>


<!-- Page Content -->
<div class="container-fluid mb-5" style = "min-height:calc(100vh - 135px);">
        <div class="card border-0 shadow my-1">
            <div class="card-body p-3">
                <div class="row">                     
                    <div class="col-1">
                        <p class="fw-bold"><strong>Reportes</strong></p>
                        <p class="lead"> 
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearReporte">
                                Crear Reporte
                            </button>
                        </p>
                    </div>      
                </div>
                <hr>
                <div id="tablaTicketsLoad"></div>
            </div>      
        </div>
    </div> 

<?php 
    include "footer.php" ;
?>
    <script src="../public/js/proyecto/tickets.js"></script>  
<?php

    } else {
        header("location:../index.html");
    }
?>