<?php
$path = "pages/users.txt";

class Utilities
{
    public static function Create()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=shopDB', 'root', '1111');

        $table1 = "create table client (
            id int AUTO_INCREMENT NOT NULL primary key,
            login nvarchar(30) NOT NULL,
            password nvarchar(30) NOT NULL,
            image nvarchar(500),
            email nvarchar(30) NOT NULL
        )";

        $table2 = "create  table item (
            id int AUTO_INCREMENT NOT NULL primary key,
            name nvarchar(255) NOT NULL,
            price decimal NOT NULL,
            image nvarchar(500),
            description nvarchar(150)
        )";

        $table3 = "create  table cart (
            id int AUTO_INCREMENT NOT NULL primary key,
            itemid int,
            foreign key (itemid) references item (id) on delete cascade,
            clientid int,
            foreign key (clientid) references client (id) on delete cascade
        )";

        $pdo->exec($table1);
        $pdo->exec($table2);
        $pdo->exec($table3);
    }

}
?>