<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-Library</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">


</head>

<body>
    <div class="bar">
        <div class="fl-lt" style="padding:10px; top:0;">
            <a class=" submittt " type="button " value="add-book" href="addbook.php" style="<?php if($_SESSION['user_level'] == 2){ ?> display:block; <?php }else{ ?>display: none;<?php } ?>">Add Book</a>
        </div>
        <div class="fl-rt " style="padding:10px; top:0; ">
            <a class="submittt " type="button " value="Go Home " href="">Log Out</a>
        </div>
        <div class="text--center center-x" style="top:0px; font-size:2em; padding-top:30px; position:absolute;">
            <?php if($_SESSION['signed_in'] == true){echo 'hello, '. $_SESSION['user_name'];}else{echo 'hello, Guest';} ?>
        </div>

    </div>
