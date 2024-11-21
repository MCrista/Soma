
<?php 
    include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2){
        include "../clases/Conexion.php";
        $con =  new Conexion();
        $conexion = $con->conectar();

?>

<!-- Page Content -->
    <div class="container-fluid mb-5" style = "min-height:calc(100vh - 170px);">
        <div class="card border-0 shadow my-1">
            <div class="card-body p-3">
                <h5 class="fw-light">Asignacion</h5>
                <p class="lead"> 
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarEquipo">
                        Asignar Equipo 
                    </button>
                    <hr>
                    <div id="tablaAsignacionesLoad"></div>
                </p>      
            </div>
        </div>
    </div>  

<?php 
    include "asignacion/modalasignar.php";
    include "footer.php" ;
?> 
<script src="../public/js/usuarios/asignacion/asignacion.js"></script>

<?php   
    } else {
        header("location:../index.html");
    }
?>