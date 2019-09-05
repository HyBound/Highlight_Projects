<?php
$connection = mysqli_connect('localhost', 'root', ''); //type your host, DB log in name, and password
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'hybound');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}