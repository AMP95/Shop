<?php
if($_POST['password']!=$_POST['password2'])
{
    echo "<h3 style='color:red;'>Error:Пароли не совпадают</h3>";
    return false;
}

$login = trim(htmlspecialchars($l));
$password = trim(htmlspecialchars($p));
$mail = trim(htmlspecialchars($m));

if($_POST['login']=='' || $_POST['password']=='' || $_POST['email'] == '')
{
    echo "<h3 style='color:red;'>Error:Неверные данные</h3>";
    return false;
}

if(strlen($_POST['login'])<3 ||strlen($_POST['login'])>30 )
{
    echo "<h3 style='color:red;'>Ошибка login больше 30 и меньше 3 </h3>";
    return false;
}
if(strlen($_POST['password'])<3 ||strlen($_POST['password'])>30 )
{
    echo "<h3 style='color:red;'>Ошибка password больше 3 и меньше 15 </h3>";
    return false;
}

if(is_uploaded_file($_FILES['image']['tmp_name']))
{
    $path = "images/".$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$path);
}

$save = 'insert into client(login,password,email,image) values
("'.$_POST['login'].'","'.$_POST['password'].'","'.$_POST['email'].'","'.$path.'");';

$pdo = new PDO('mysql:host=localhost;dbname=shopDB', 'root', '1111');

$sql = "insert into client(login,password,email,image) values (?,?,?,?);";
$result = $pdo->prepare($sql)->execute([$_POST['login'], $_POST['password'],$_POST['email'],$path]);

if($result == false)
{
    echo "<h1>Error:Такой логин уже существует</h1>";
}
echo "Success";

$pdo = null;
?>