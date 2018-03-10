<?php
session_start();
include 'connect.php';

//get all books
$book = htmlentities($_GET['id']);
            $sql='Select * from books where bookid='. $book .'';
        
            //run query
            $result = mysqli_query($conn, $sql);

if(!$result){
    echo 'error'. mysqli_error($conn);
}else{
    $del='delete from books where bookid='. $book .'';
        
            //run query
        mysqli_query($conn, $del);
    header( 'Location: remove.php' );
}


?>
