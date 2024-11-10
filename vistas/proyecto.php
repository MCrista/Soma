
<?php 
    include "header.php"; 
    if (isset ($_SESSION['usuario']) && $_SESSION['usuario']['rol']==1 
         || $_SESSION['usuario']['rol']==3){
?>


<!-- Page Content -->
    <div class="container-fluid">
        <div class="card border-0 shadow my-1">
            <div class="card-body p-3">
                <h5 class="fw-light">Lista </h5>
                <h5 class="fw-light">Tickets </h5>
                <h5 class="fw-light">Impedimento </h5>
                <p class="lead">                     
            </div>      
        </div>
    </div> 

<?php 
    include "footer.php" ;
        }else{
            header("location:../index.html");
        }
?>
 