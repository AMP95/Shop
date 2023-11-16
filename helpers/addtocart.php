<?php
    session_start();
    if($_POST['item'])
    {
        $pdo = new PDO('mysql:host=localhost;dbname=shopDB', 'root', '1111');

        $sql = "INSERT INTO cart (id, itemid, clientid) VALUES (NULL,?,?)";
        $result = $pdo->prepare($sql)->execute([$_POST['item'], $_SESSION['user']]);
        $pdo = null;
    }
?>