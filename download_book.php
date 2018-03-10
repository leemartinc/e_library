<?php
session_start();
include 'connect.php';

//get all books
$book = htmlentities($_GET['id']);
            $sql='Select * from books where bookid='. $book .'';
        
            //run query
            $result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){      
$b_id = $row['bookid'];
   $loc = $row['book-location'];
   // echo $b_id;
}

   // echo 'yolo';

$insrt = 'insert into dloads (user, book, date) values ("'. $_SESSION['user_id'] .'", "'. $book .'", CURRENT_TIMESTAMP)';
$query = mysqli_query($conn, $insrt);
if(!$query){
    echo 'error'. mysqli_error($conn);
}else{
$file_url = $loc;
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
readfile($file_url); // do the double-download-dance (dirty but worky)
    //header( 'Location: previous.php' );
}


?>
