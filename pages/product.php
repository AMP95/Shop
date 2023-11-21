<?php
    $pdo = new PDO('mysql:host=localhost;dbname=shopDB', 'root', '1111');
    
    $query = "SELECT * FROM item;";
    $result = $pdo->query($query);
    
    echo "<div class='row justify-content-between'>";
    $count = 0;
    foreach($pdo->query($query)as $row) 
    {
        $count++;
        if($count == 0)
        {
            echo "</div><div class='row justify-content-between'>";
        }
        echo "<div class='col-4  column-gap-3 pt-2 pl-2 
         position-relative'
        style='height:250px'>";

        echo "<div class='container m-2'>";

            echo "<div class='row'>";

                echo "<div class='col-7'>";
                    echo "<img class='img-fluid rounded' style='max-height: 150px' src='".$row['image']."'>";
                echo "</div>";

                echo "<div class='col-4'>";
                    echo "<div class='row'>";
                        echo "<p>Name: ".$row['name']."</p>";
                    echo "</div>";

                    echo "<div class='row'>";
                        echo "<p class='text-wrap'>Price: ".$row['price']."$</p>";
                    echo "</div>";
                echo "</div>";

            echo "</div>";

            echo "<div class='row mt-2 text-center'>";
            echo "<p>".$row['description']."</p>";
            echo "</div>";

            echo "<div class='row justify-content-center'>";
            echo "<button onclick=addToCart(".$row['id'].") class='col-11 mb-2 btn btn-primary position-absolute bottom-0'>Add to cart</button>";
            echo "</div>";

        echo "</div>";

        echo "</div>";
        if($count == 4)
        {
            $count = -1;
        }
    }
    echo "</div>";
    $pdo = null;
?>
<script>
    function addToCart(id) {
    $.ajax({
        type: "POST", 
        url: 'helpers/addtocart.php', 
        data: {
            item: id
        }, 
        success: function(response) {
            console.log(response);
    }});
    alert('Добавлено в корзину');
}

</script>

