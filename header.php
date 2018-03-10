<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-Library</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">


</head>

<body style="background-color: #2c3338;">
    <div class="bar">
        <div class="fl-lt" style="padding:10px; top:0;">
            <span class=" submittt " type="button " value="add-book" style="clear:both;" onclick="openNav()">Menu</span>


            <div id="mySidenav" class="sidenav">
                <ul>
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <li><a href="home.php">Go Home</a></li>
                    <?php
                    if($_SESSION['signed_in'] == true){    
                    ?>
                        <li><a href="profile.php">Your Account</a></li>
                        <li><a href="previous.php">Previous<br>Dowloads</a></li>
                        <li><a href="all_books.php">All Books</a></li>
                        <li style="<?php if($_SESSION['user_level'] == 2){ ?> display:block; <?php }else{ ?>display: none;<?php } ?>"><a style="<?php if($_SESSION['user_level'] == 2){ ?> display:block; <?php }else{ ?>display: none;<?php } ?>" href="addbook.php">Add book</a></li>
                        <li style="<?php if($_SESSION['user_level'] == 2){ ?> display:block; <?php }else{ ?>display: none;<?php } ?>"><a style="<?php if($_SESSION['user_level'] == 2){ ?> display:block; <?php }else{ ?>display: none;<?php } ?>" href="remove.php">Delete book</a></li>
                        <?php
                    }else{
                    ?>
                            <div style="white-space: normal;">
                                <a>Hi there guest. This menu has more items but you must be logged in to access them.</a>
                            </div>
                            <?php
                    }
                    ?>
                </ul>
            </div>

            <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }

            </script>


        </div>
        <div class="fl-rt " style="padding:10px; top:0; ">
            <a class="submittt" type="button" href="logout.php">
                <?php if($_SESSION['signed_in'] == true){ echo 'LOG OUT'; }else{ echo 'SIGN IN'; } ?>
            </a>
        </div>
        <div class="text--center center-x" style="top:0px; font-size:2em; padding-top:30px; position:absolute;">
            <?php if($_SESSION['signed_in'] == true){echo 'hello, '. $_SESSION['user_name'];}else{echo 'hello, Guest';} ?>
        </div>

    </div>
