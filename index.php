<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName ="testDB7";
$tableName = "house";
$table2Name = "people";
$table3Name = "socialNetwork";

$conn = new mysqli($serverName, $userName, $password);
if ($conn->connect_error) {
    die("Connection error".$conn->connect_error);
}
$sql ="DROP DATABASE {$dbName}";
$conn->query($sql);

$sql = "CREATE DATABASE $dbName";
if ($conn->query($sql)===true) {
    echo "Database created<br>";
} else {
    echo "error".$conn->error;
}
$conn->close();



$conn1 = new mysqli($serverName, $userName, $password, $dbName);

$sql1 = "CREATE TABLE `{$dbName}`.`{$tableName}` ( 
        `id` INT NOT NULL AUTO_INCREMENT ,
        `numberHouse` VARCHAR(20) NOT NULL ,
        `street` VARCHAR(20) NOT NULL ,
        `town` VARCHAR(20) NOT NULL ,
         PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

$sql1.= "CREATE TABLE `{$dbName}`.`{$table2Name}` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `name` VARCHAR(30) NOT NULL , 
        `soname` VARCHAR(30) NOT NULL , 
        `apartmentNumber` INT(4) NOT NULL , 
        `idHouse` INT NOT NULL , 
         PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";

$sql1.= "CREATE TABLE `{$dbName}`.`{$table2Name}` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `name` VARCHAR(30) NOT NULL , 
        `soname` VARCHAR(30) NOT NULL , 
        `apartmentNumber` INT(4) NOT NULL , 
        `idHouse` INT NOT NULL , 
         PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";


if ($conn1->multi_query($sql1)===true) {
    echo "table created<br>";
} else {
    echo $conn1->error;
}
$conn1->close();


$conn2 = new mysqli($serverName, $userName, $password, $dbName);

 $sql2.="ALTER TABLE `people` ADD FOREIGN KEY (`idHouse`) REFERENCES `house`(`id`);";
if ($conn2->multi_query($sql2)===true) {
    echo "user created1<br>";
} else {
    echo "errr".$conn2->error;
}
$conn2->close();


$conn2 = new mysqli($serverName, $userName, $password, $dbName);
$sql2 = "INSERT INTO {$tableName} (numberHouse, street, town) VALUES('57', 'Бажана', 'Киев');";
$sql2.= "INSERT INTO {$tableName} (numberHouse, street, town) VALUES('1', 'Бажана', 'Киев');";
$sql2.= "INSERT INTO {$tableName} (numberHouse, street, town) VALUES('7', 'Бажана', 'Киев');";
$sql2.= "INSERT INTO {$tableName} (numberHouse, street, town) VALUES('5', 'Бажана', 'Киев');";
$sql2.= "INSERT INTO {$tableName} (numberHouse, street, town) VALUES('8', 'Бажана', 'Киев');";
if ($conn2->multi_query($sql2)===true) {
    echo "house created<br>";
} else {
    echo $conn2->error;
}
$conn2->close();

$conn2 = new mysqli($serverName, $userName, $password, $dbName);
$sql2 = "INSERT INTO {$table2Name} (name, soname, apartmentNumber, idHouse) VALUES('Vasa', 'big', '24' , '1');";
$sql2.= "INSERT INTO {$table2Name} (name, soname, apartmentNumber, idHouse) VALUES('Vasa', 'big', '1' , '2');";
$sql2.= "INSERT INTO {$table2Name} (name, soname, apartmentNumber, idHouse) VALUES('Vasa', 'big', '2' , '3');";
$sql2.= "INSERT INTO {$table2Name} (name, soname, apartmentNumber, idHouse) VALUES('Vasa', 'big', '23' , '1');";
$sql2.= "INSERT INTO {$table2Name} (name, soname, apartmentNumber, idHouse) VALUES('Vasa', 'big', '24' , '1');";
if ($conn2->multi_query($sql2)===true) {
    echo "people created<br>";
} else {
    echo $conn2->error;
}
$conn2->close();
