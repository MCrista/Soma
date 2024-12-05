<?php 
    include "header.php"; 
    if (isset ($_SESSION['usuario']) && $_SESSION['usuario']['rol']==1 
         || $_SESSION['usuario']['rol']==3){
?>
<!-- Page Content -->

    <div class="container-fluid mb-5" style = "min-height:calc(100vh - 135px);">
        <div class="row">
            <div class="col-3">
                <div class="card border-0 shadow my-1">
                    <div class="card-body p-2">
                        <p class="lead">
                            <div id="tablaTicketsCollapseLoad"></div>   
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card border-0 shadow my-1">
                    <div class="card-body p-2">
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
 