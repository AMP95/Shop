<?php
    if(!isset($_POST['click'])){
?>

<form action="index.php?page=4" method="POST" style='margin-top:30px'>
    <input name='login' class="form-control" type='text' placeholder="login"/><br/>
    <input name='password'  type='password' class="form-control" placeholder="password"/><br/>
    <div class="d-grid gap-2">
        <input type="submit" name='click' class=" btn btn-primary" value="Enter"/>       
    </div>
</form>

<?php 
    }
    else{
        if(isset($_POST['click'])){

            $pdo = new PDO('mysql:host=localhost;dbname=shopDB', 'root', '1111');
    
            $query = "SELECT * FROM `client` WHERE login='".$_POST['login']."';";
            $result = $pdo->query($query);
            $row = $result->fetchAll()[0];
            
            if($row[1] == NULL )
            {
                echo "<h1>Пользователь не найден</h1>";
            }
            else
            {
                if($row[2] != $_POST['password'])
                {
                    echo "<h1>Неверный пароль</h1>";
                }
                else
                {
                    $_SESSION['user'] = $row[0];
                    header("Refresh:0; url=index.php");
                }
            }
            $pdo = null;
        }
    }
?>