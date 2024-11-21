
<?php 
    include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2){
?>

<!-- Page Content -->
<div class="container-fluid mb-5" style = "min-height:calc(100vh - 135px);">
        <div class="card border-0 shadow my-1">
            <div class="card-body p-3">
                <h5 class="fw-light">Gestionar reportes de usuarios</h5>
                <p class="lead">
                    <hr>
                    <div id="tablaReporteAdminLoad"></div>
                </p>      
            </div>    
        </div>
    </div> 

<?php 
    include "reportesAdmin/modalAgregarSolucion.php";
    include "footer.php";
?>
    <script src="../public/js/reportesAdmin/reportesAdmin.js"></script>
<?php    
    } else {
        header("location:../index.html");
    }
?>
