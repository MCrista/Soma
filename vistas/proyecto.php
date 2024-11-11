
<?php 
    include "header.php"; 
    if (isset ($_SESSION['usuario']) && $_SESSION['usuario']['rol']==1 
         || $_SESSION['usuario']['rol']==3){
?>


<!-- Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="card border-3 shadow my-1">
                    <div class="card-body p-3">
                        <h5 class="fw-light">Lista </h5>
                        <h5 class="fw-light">Tickets</h5>
                        <h5 class="fw-light">Impedimentos</h5>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card border-0 shadow my-1">
                    <div class="card-body p-3">
                        <h5 class="fw-light">Numero de Tickets</h5>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card border-0 shadow my-1">
                    <div class="card-body p-3">
                        <p class="lead">
                            <hr>
                            <div id="tablaTicketsLoad"></div>   
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    include "footer.php" ;
?>
    <script src="../public/js/proyecto/tickets.js"></script>   
<?php
        }else{
            header("location:../index.html");
        }
?>
 