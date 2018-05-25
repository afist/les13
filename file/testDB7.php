<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 4.7.7
 */

/**
 * Database `testDB7`
 */

/* `testDB7`.`district` */
$district = array(
  array('id' => '1','name' => 'Дарницкий'),
  array('id' => '2','name' => 'Оболонь'),
  array('id' => '3','name' => 'Печерский')
);

/* `testDB7`.`house` */
$house = array(
  array('id' => '1','numberHouse' => '57','street_id' => '1'),
  array('id' => '2','numberHouse' => '12','street_id' => '1'),
  array('id' => '3','numberHouse' => '5','street_id' => '2'),
  array('id' => '4','numberHouse' => '43','street_id' => '3')
);

/* `testDB7`.`people` */
$people = array(
  array('id' => '1','name' => 'Богдан','soname' => 'динисенко','house_id' => '1','apartment_number' => '122'),
  array('id' => '2','name' => 'Антон','soname' => 'герц','house_id' => '1','apartment_number' => '143'),
  array('id' => '3','name' => 'Иван','soname' => 'бардиш','house_id' => '2','apartment_number' => '117'),
  array('id' => '4','name' => 'Максим','soname' => 'иванов','house_id' => '2','apartment_number' => '113'),
  array('id' => '5','name' => 'Влад','soname' => 'петров','house_id' => '3','apartment_number' => '187')
);

/* `testDB7`.`street` */
$street = array(
  array('id' => '1','name' => 'Бажана','type' => 'проспект','district_id' => '1'),
  array('id' => '2','name' => 'Ревуцкого','type' => 'улица','district_id' => '1'),
  array('id' => '4','name' => 'Ленинская','type' => 'улица','district_id' => '2'),
  array('id' => '3','name' => 'Николаевский','type' => 'проулок','district_id' => '2'),
  array('id' => '5','name' => 'Киквидзе','type' => 'проспект','district_id' => '3')
);
