<?php
    if($_POST['item'])
    {
        $pdo = new PDO('mysql:host=localhost;dbname=shopDB', 'root', '1111');

        $sql = "DELETE FROM cart WHERE id=?";
        $result = $pdo->prepare($sql)->execute([$_POST['item']]);
    }
?>