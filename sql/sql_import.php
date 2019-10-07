<?php

//connection variables
$host = 'localhost';
$user = 'root';
$password = '';

//create mysql connection
$mysqli = new mysqli($host,$user,$password);
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
}

//create the database
if ( !$mysqli->query('CREATE DATABASE herp') ) {
    printf("Errormessage: %s\n", $mysqli->error);
}

//create reception table with all the fields
$mysqli->query('
CREATE TABLE `herp`.`reception` 
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `ucode` VARCHAR(100) NOT NULL
    `password` VARCHAR(100) NOT NULL,
    `hash` VARCHAR(32) NOT NULL,
    `active` BOOL NOT NULL DEFAULT 0,
PRIMARY KEY (`id`) 
);') or die($mysqli->error);

?>