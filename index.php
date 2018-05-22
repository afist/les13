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



$conn = new mysqli($serverName, $userName, $password, $dbName);

$sqlCreatTable = "CREATE TABLE `{$dbName}`.`{$tableName}` ( 
        `id` INT NOT NULL AUTO_INCREMENT ,
        `numberHouse` VARCHAR(20) NOT NULL ,
        `street` VARCHAR(20) NOT NULL ,
        `town` VARCHAR(20) NOT NULL ,
         PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

$sqlCreatTable.= "CREATE TABLE `{$dbName}`.`{$table2Name}` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `name` VARCHAR(30) NOT NULL , 
        `soname` VARCHAR(30) NOT NULL , 
        `apartmentNumber` INT(4) NOT NULL , 
        `idHouse` INT NOT NULL ,
        `idSocialNetwork` INT NOT NULL ,
         PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

$sqlCreatTable.= "CREATE TABLE `{$dbName}`.`{$table3Name}` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `facebook` VARCHAR(30) NOT NULL , 
        `vk` VARCHAR(30) NOT NULL , 
        `instagram` VARCHAR(30) NOT NULL , 
        `idUsers` INT NOT NULL , 
         PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";


if ($conn->multi_query($sqlCreatTable)===true) {
    echo "table created<br>";
} else {
    echo $conn1->error;
}
$conn->close();




$conn = new mysqli($serverName, $userName, $password, $dbName);

 $sqlPrimaryKey="ALTER TABLE `{$table2Name}` ADD FOREIGN KEY (`idHouse`) REFERENCES `{$tableName}`(`id`);";
 $sqlPrimaryKey.="ALTER TABLE `{$table3Name}` ADD FOREIGN KEY (`idUsers`) REFERENCES `{$table2Name}`(`id`);";
 $sqlPrimaryKey.="ALTER TABLE `{$table2Name}` ADD FOREIGN KEY (`idSocialNetwork`) REFERENCES `{$table3Name}`(`id`);";

if ($conn->multi_query($sqlPrimaryKey)===true) {
    echo "user created1<br>";
} else {
    echo "errr".$conn->error;
}
$conn->close();




$conn = new mysqli($serverName, $userName, $password, $dbName);
$sqlDataRecording = "INSERT INTO {$tableName} (numberHouse, street, town) VALUES('57', 'Бажана', 'Киев');";
$sqlDataRecording.= "INSERT INTO {$tableName} (numberHouse, street, town) VALUES('1', 'Бажана', 'Киев');";
$sqlDataRecording.= "INSERT INTO {$tableName} (numberHouse, street, town) VALUES('7', 'Бажана', 'Киев');";
$sqlDataRecording.= "INSERT INTO {$tableName} (numberHouse, street, town) VALUES('5', 'Бажана', 'Киев');";
$sqlDataRecording.= "INSERT INTO {$tableName} (numberHouse, street, town) VALUES('8', 'Бажана', 'Киев');";
if ($conn->multi_query($sqlDataRecording)===true) {
    echo "house created<br>";
} else {
    echo $conn->error;
}
$conn->close();


$conn = new mysqli($serverName, $userName, $password, $dbName);
$sqlDataRecording = "INSERT INTO {$table2Name} (name, soname, apartmentNumber, idHouse, idSocialNetwork) VALUES('Vasa', 'big', '24' , '1', '1');";
$sqlDataRecording.= "INSERT INTO {$table2Name} (name, soname, apartmentNumber, idHouse, idSocialNetwork) VALUES('Vasa', 'big', '1' , '2', '2');";
$sqlDataRecording.= "INSERT INTO {$table2Name} (name, soname, apartmentNumber, idHouse, idSocialNetwork) VALUES('Vasa', 'big', '2' , '3', '3');";
$sqlDataRecording.= "INSERT INTO {$table2Name} (name, soname, apartmentNumber, idHouse, idSocialNetwork) VALUES('Vasa', 'big', '23' , '1', '4');";
$sqlDataRecording.= "INSERT INTO {$table2Name} (name, soname, apartmentNumber, idHouse, idSocialNetwork) VALUES('Vasa', 'big', '24' , '1', '5');";
if ($conn->multi_query($sqlDataRecording)===true) {
    echo "people created<br>";
} else {
    echo $conn->error;
}
$conn->close();


$conn = new mysqli($serverName, $userName, $password, $dbName);
$sqlDataRecording = "INSERT INTO {$table3Name} (facebook, vk, instagram, idUsers) VALUES('facebook.com/vita-ak0', 'vk.com/vita0', 'intaBlog1' , '1');";
$sqlDataRecording.= "INSERT INTO {$table3Name} (facebook, vk, instagram, idUsers) VALUES('facebook.com/vita-ak1', 'vk.com/vita1', 'intaBlog2' , '2');";
$sqlDataRecording.= "INSERT INTO {$table3Name} (facebook, vk, instagram, idUsers) VALUES('facebook.com/vita-ak2', 'vk.com/vita2', 'intaBlog3' , '3');";
$sqlDataRecording.= "INSERT INTO {$table3Name} (facebook, vk, instagram, idUsers) VALUES('facebook.com/vita-ak3', 'vk.com/vita3', 'intaBlog4' , '4');";
$sqlDataRecording.= "INSERT INTO {$table3Name} (facebook, vk, instagram, idUsers) VALUES('facebook.com/vita-ak4', 'vk.com/vita4', 'intaBlog5' , '5');";
if ($conn->multi_query($sqlDataRecording)===true) {
    echo "people created<br>";
} else {
    echo $conn->error;
}
$conn->close();
