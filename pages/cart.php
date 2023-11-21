<?php
    $pdo = new PDO('mysql:host=localhost;dbname=shopDB', 'root', '1111');
    
    $query = "SELECT cart.id,name,price,image,description FROM cart 
    INNER JOIN item 
    ON cart.itemid = item.id WHERE clientid=".$_SESSION['user'].";";
    $result = $pdo->query($query);

    $sum = 0;
    $count = 0;
    echo "<div class='row'>";
    foreach($pdo->query($query)as $row) {
        $sum+=$row['price'];

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
        echo "<button onclick=remove(".$row['id'].") 
        class='col-11 mb-2 btn btn-primary position-absolute bottom-0'>Remove</button>";
        echo "</div>";

        echo "</div>";

        echo "</div>";

        if($count == 3)
        {
            $count = -1;
        }
    }
    echo "</div>";
    echo "<div style='margin-top: 10px'>Total: ".$sum."$</div>" ;
    
?>

<script>
    function remove(id) {
        $.ajax({
            type: "POST", 
            url: 'helpers/remove.php', 
            data: {
                item: id
            }, 
            success: function(response) {
                console.log(response);
            }
        });
        window.location.reload();
    }
</script>
