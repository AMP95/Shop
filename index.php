<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class='row m-auto' style="height: 100vh;">
            <div class='col-2 bg-opacity-25 bg-primary '>
                <div class='col-12'>
                    <?php 
                        include_once('helpers/menu.php');
                        include_once('helpers/databaseCreator.php');
                        Utilities::Create();
                    ?>
                </div>
            </div>
            <div class='col-10 bg-opacity-25 bg-success'>
                    <?php 
                        if(isset($_GET['page']))
                        {
                            $page=$_GET['page'];
                            switch($page){
                                case 1: include_once('pages/home.php');break;
                                case 2: include_once('pages/registration.php');break;
                                case 3: include_once('pages/product.php');break;
                                case 4: include_once('pages/entry.php');break;
                                case 5: include_once('pages/exit.php');break;
                                case 6: include_once('pages/cart.php');break;
                            }
                        }
                    ?>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
    crossorigin="anonymous"></script>
    </body>
</html>