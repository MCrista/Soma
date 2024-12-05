
<?php 
    include "header.php"; 
    if (isset($_SESSION['usuario']) && 
        $_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2 || $_SESSION['usuario']['rol'] ==3) {

            $idUsuario = $_SESSION['usuario']['id'];
?>




<!-- Page Content -->

    

                
  <div class="container-fluid mb-5" style = "min-height:calc(100vh - 135px);">            
     <div class="card border-0 shadow my-1">
        <div class="card-body p-3">
            <h5 class="fw-light">Bienvenido <?php echo $_SESSION['usuario']['nombre'];?></h5>
            <h5 class="fw-light">Datos de Usuario</h5>
            <p class="lead"> 
                <div class="row">
                    <div class="col-sm-4">Nombre: <span id="nombre"></span></div>
                    <div class="col-sm-4"> Primer Apellido: <span id="paterno"></span></div>
                    <div class="col-sm-4">Segundo Apellido: <span id="materno"></span></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">Celular: <span id="telefono"></span></div>
                    <div class="col-sm-4">Correo: <span id="correo"></span></div>
                    <div class="col-sm-4">Fecha Nacimiento: <span id="edad"></span></div>
                </div>
                <div class="row">
                    <div class="col-sm-4"></div>
                </div>
            </p>
        </div>      
    </div>
</div> 

<?php 
    include "footer.php" ;
?> 
    <script src="../public/js/inicio/personales.js"></script>
    <script>
        let idUsuario = '<?php echo $idUsuario; ?>';
        datosPersonalesInicio(idUsuario);
    </script>
<?php
    } else {
        header("location:../index.html");
    } 
?>   

