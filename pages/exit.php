<?php
    if(isset($_SESSION['user']))
    {
        session_unset();
        header("Refresh:0; url=index.php");
    } 
?>