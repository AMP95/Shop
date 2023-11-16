<ul class='nav nav-underline justify-content-center row'>
    <li class="nav-item col-12">
        <a class="nav-link" href='index.php?page=1'>Home</a>
    </li>
    
    <?php
        if(isset($_SESSION['user'])){
    ?>
        <li class="nav-item col-12">
            <a class="nav-link" href='index.php?page=3'>Product</a>
        </li>
        <li class="nav-item col-12">
            <a class="nav-link" href='index.php?page=6'>Cart</a>
        </li>
        <li class="nav-item col-12">
            <a class="nav-link" href='index.php?page=5'>Exit</a>
        </li>   
    <?php
        }
    ?>


    <?php
        if(!isset($_SESSION['user'])){
    ?>
    <li class="nav-item col-12">
        <a class="nav-link" href='index.php?page=2'>Registration</a>
    </li>

    <li class="nav-item col-12">
        <a class="nav-link" href='index.php?page=4'>Entry</a>
    </li>
    <?php
        }
    ?>
</ul>