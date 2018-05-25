<?php
// require_once "autoload.php";

// $newDb = lib\WorWithDb::connectToDb("localhost", "testDB7", "root", "");

$host = "localhost";
$user = "root";
$password = "";
$dbName ="testDB7";
$tableName = "house";
$table2Name = "street";
$table3Name = "district";
$table4Name = "people";




try {
    $dbh = new PDO("mysql:host=$host", $user, $password);
    $dbh->exec("DROP DATABASE `$dbName`;");
    $dbh->exec("CREATE DATABASE `$dbName`;")
    or die(print_r($dbh->errorInfo(), true));
} catch (PDOException $e) {
    die("DB ERROR: ". $e->getMessage());
}


try {
    $connect = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);

    $sqlCreatTable = "CREATE TABLE `{$dbName}`.`{$tableName}` ( 
                     `id` SMALLINT(5) NOT NULL AUTO_INCREMENT ,
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

    $sqlCreatTable.= "CREATE TABLE `{$dbName}`.`{$table4Name}` ( 
                     `id` INT NOT NULL AUTO_INCREMENT , 
                     `name` VARCHAR(30) NOT NULL ,
                     `soname` VARCHAR(40) NOT NULL ,
                     `house_id` SMALLINT(5) NOT NULL ,
                     `apartment_number` SMALLINT(4) NOT NULL ,
                      PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

    $connect->query($sqlCreatTable);


     $sqlPrimaryKey = "ALTER TABLE `{$tableName}` ADD FOREIGN KEY (`street_id`) REFERENCES `{$table2Name}`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
     $sqlPrimaryKey.= "ALTER TABLE `{$table2Name}` ADD FOREIGN KEY (`district_id`) REFERENCES `{$table3Name}`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
     $sqlPrimaryKey.= "ALTER TABLE `{$table4Name}` ADD FOREIGN KEY (`house_id`) REFERENCES `{$tableName}`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
     $sqlPrimaryKey.= "ALTER TABLE `{$dbName}`.`{$table2Name}` ADD UNIQUE (`district_id`, `name`, `type`);";

    $connect->query($sqlPrimaryKey);



    $sqlDataRecording = "INSERT INTO {$table3Name} (name) 
                         VALUES('Дарницкий'),
                               ('Оболонь'),
                               ('Печерский');";

    $sqlDataRecording.= "INSERT INTO {$table2Name} (name, type, district_id) 
                         VALUES('Бажана', 'проспект', '1'),
                               ('Ревуцкого', 'улица', '1'),
                               ('Николаевский', 'проулок', '2'),
                               ('Ленинская', 'улица', '2'),
                               ('Киквидзе', 'проспект', '3');";

    $sqlDataRecording.= "INSERT INTO {$tableName} (numberHouse, street_id) 
                         VALUES('57', '1'),
                               ('12', '1'),
                               ('5',  '2'),
                               ('43', '3');";
    $sqlDataRecording.= "INSERT INTO {$table4Name} (name, soname, house_id, apartment_number ) 
                         VALUES('Богдан', 'динисенко', '1', '122'),
                               ('Антон', 'герц', '1', '143'),
                               ('Иван', 'бардиш', '2', '117'),
                               ('Максим', 'иванов', '2', '113'),
                               ('Влад', 'петров', '3', '187');";

     $connect->query($sqlDataRecording);
} catch (PDOException $e) {
    echo $sql.$e->getMessage();
}


// Запросы
//SELECT * FROM `district` d INNER JOIN `street` s ON d.id = s.district_id
