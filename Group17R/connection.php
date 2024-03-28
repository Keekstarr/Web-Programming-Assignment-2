<?php

$DB_SERVER = "localhost";
$DB_USER = "group16";
$DB_PASS = "password";
$DB_NAME = "books";

if(!$con = mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS,$DB_NAME))
{

	die("failed to connect!");
}
