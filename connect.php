<?php
//connect.php
$server = 'localhost';
$username   = 'lclarke8';
$password   = 'lclarke8';
$database   = 'lclarke8';

$conn = new mysqli($server, $username, $password, $database);
 
if($conn->connect_error)
{
    exit('Error: could not establish database connection');
}
?>
