
<?php 
    include "header.php"; 
    if (isset ($_SESSION['usuario']) && $_SESSION['usuario']['rol']==1 
         || $_SESSION['usuario']['rol']==3){
?>


<!-- Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="card border-0 shadow my-1">
                    <div class="card-body p-2">
                        <a class="nav-link" href="tablaTickets.php" >Lista</a>
                        <a class="nav-link" href="proyecto.php">Tickets</a>
                        <a class="nav-link" href="proyecto.php">Impedimentos</a>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card border-0 shadow my-1">
                    <div class="card-body p-2">
                        <h5 class="fw-light">Numero de Tickets</h5>
                        <p class="lead">
                            <hr>
                            <div id=""></div>   
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card border-0 shadow my-1">
                    <div class="card-body p-2">
                        <p class="lead">
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
 