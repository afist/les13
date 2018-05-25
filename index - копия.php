<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName ="testDB7";
$tableName = "house";
$table2Name = "street";
$table3Name = "district";

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


$conn = new mysqli($serverName, $userName, $password, $dbName);

$sqlCreatTable = "CREATE TABLE `{$dbName}`.`{$tableName}` ( 
        `id` INT NOT NULL AUTO_INCREMENT ,
        `numberHouse` VARCHAR(20) NOT NULL ,
        `street_id` SMALLINT(5) NOT NULL ,
         PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

$sqlCreatTable.= "CREATE TABLE `{$dbName}`.`{$table2Name}` ( 
        `id` SMALLINT(5) NOT NULL AUTO_INCREMENT , 
        `name` VARCHAR(40) NOT NULL , 
        `type` ENUM('улица','проулок','проспект') NOT NULL , 
        `district_id` TINYINT(2) NOT NULL ,
         PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

$sqlCreatTable.= "CREATE TABLE `{$dbName}`.`{$table3Name}` ( 
        `id` TINYINT(2) NOT NULL AUTO_INCREMENT , 
        `name` VARCHAR(30) NOT NULL , 
         PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";


if ($conn->multi_query($sqlCreatTable)===true) {
    echo "table created<br>";
} else {
    echo $conn1->error;
}
$conn->close();




$conn = new mysqli($serverName, $userName, $password, $dbName);

 $sqlPrimaryKey = "ALTER TABLE `{$tableName}` ADD FOREIGN KEY (`street_id`) REFERENCES `{$table2Name}`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
 $sqlPrimaryKey.= "ALTER TABLE `{$table2Name}` ADD FOREIGN KEY (`district_id`) REFERENCES `{$table3Name}`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
 $sqlPrimaryKey.= "ALTER TABLE `{$dbName}`.`{$table2Name}` ADD UNIQUE (`district_id`, `name`, `type`);";

if ($conn->multi_query($sqlPrimaryKey)===true) {
    echo "user created1<br>";
} else {
    echo "errr".$conn->error;
}
$conn->close();





$conn = new mysqli($serverName, $userName, $password, $dbName);
$sqlDataRecording = "INSERT INTO {$table3Name} (name) 
                     VALUES('Дарницкий'),
                           ('Оболонь'),
                           ('Печерский')";
if ($conn->multi_query($sqlDataRecording)===true) {
    echo "people created<br>";
} else {
    echo $conn->error;
}
$conn->close();


$conn = new mysqli($serverName, $userName, $password, $dbName);
$sqlDataRecording = "INSERT INTO {$table2Name} (name, type, district_id) 
                     VALUES('Бажана', 'проспект', '1'),
                           ('Ревуцкого', 'улица', '1'),
                           ('Николаевский', 'проулок', '2'),
                           ('Ленинская', 'улица', '2'),
                           ('Киквидзе', 'проспект', '3');";

if ($conn->multi_query($sqlDataRecording)===true) {
    echo "people created<br>";
} else {
    echo $conn->error;
}
$conn->close();


$conn = new mysqli($serverName, $userName, $password, $dbName);
$sqlDataRecording = "INSERT INTO {$tableName} (numberHouse, street_id) 
                     VALUES('57', '1'),
                           ('12', '1'),
                           ('5',  '2'),
                           ('43', '3');";
if ($conn->multi_query($sqlDataRecording)===true) {
    echo "house created<br>";
} else {
    echo $conn->error;
}
$conn->close();



// Запросы
//SELECT * FROM `district` d INNER JOIN `street` s ON d.id = s.district_id
