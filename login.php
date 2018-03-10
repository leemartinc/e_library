<?php
session_start();
ob_start();

include 'connect.php';

//if($_SESSION['signed_in'] == true){ header( 'Location: home.php' ); }

if(isset($_POST['submit'])){

    /*
    if(empty($_POST['username']))
    {
        $this->HandleError("Enter a valid username!");
        return false;
    }
    
    if(empty($_POST['password']))
    {
        $this-> HandleError("Enter a valid password!");
        return false;
    }
    */
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    //echo $password;

     //find match
            $sql = 'SELECT * FROM users WHERE username = "'. $username .'"';
        
            //run query
            $result = mysqli_query($conn, $sql);
   if(!$result){
       
       echo mysqli_error($conn);
   }else{
    
    if(mysqli_num_rows($result) == 0)
    {
        echo 'user does not exist';
    }else{
        
        while($row = mysqli_fetch_assoc($result))
        {
            
        
            
            if($row['password'] != $password){
                //echo $row['password'];
                echo 'wrong password';
            }else{
                $sql = 'SELECT * FROM users WHERE username = "'. $username .'"';
        
            //run query
            $result = mysqli_query($conn, $sql);
                if(!$result){
       
       echo mysqli_error($conn);
   }else{
    
                //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;
                     
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while($red = mysqli_fetch_assoc($result))
                    {
                        $_SESSION['user_id']=$red['userid'];
                        $_SESSION['user_name']=$red['name'];
                        $_SESSION['user_level']=$red['user_lvl'];
                        $_SESSION['username']=$red['username'];
                        
                    }
                    //echo 'hi';
                    header( 'Location: home.php' );
                    
                }
            }
        }
    }

   }

}
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">


        <link rel="stylesheet" href="css/login.css">


    </head>


    <body class="align" style="background-color: #2c3338;">

        <img class="center-x" style="top:20px;" src="img/logo.png" />

        <div class="grid">

            <form action="#" method="POST" class="form login">

                <div class="form__field">
                    <label for="login__username"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Username</span></label>
                    <input id="login__username" type="text" name="username" class="form__input" placeholder="Username" required>
                </div>

                <div class="form__field">
                    <label for="login__password"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg><span class="hidden">Password</span></label>
                    <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
                </div>

                <div class="form__field">
                    <input type="submit" name="submit" value="Sign In">
                </div>

            </form>

            <p class="text--center">Not a member? <a href="signup.php">Sign up now</a><br>or <a href="home.php">Continue as Guest</a><svg class="icon">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icons.svg#arrow-right"></use></svg></p>

        </div>

        <svg xmlns="http://www.w3.org/2000/svg" class="icons"><symbol id="arrow-right" viewBox="0 0 1792 1792"><path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/></symbol><symbol id="lock" viewBox="0 0 1792 1792"><path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/></symbol><symbol id="user" viewBox="0 0 1792 1792"><path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/></symbol></svg>


        <img class="chat-icon" src="img/scroll.gif" width="80px" height="120px" style="margin-right:200px;bottom:38px;border:none;box-shadow:none;border-radius:0px;transform: rotate(270deg);">
        <img class="chat-icon" src="img/scroll.gif" width="80px" height="120px" style="margin-right:150px;bottom:38px;border:none;box-shadow:none;border-radius:0px;transform: rotate(270deg);">
        <img class="chat-icon" src="img/scroll.gif" width="80px" height="120px" style="margin-right:100px;bottom:38px;border:none;box-shadow:none;border-radius:0px;transform: rotate(270deg);">
        <img class="chat-icon" src="img/help.png" width="80px" height="80px" onclick="toggleHelpWindow();">
        <script type="text/javascript">
            function toggleHelpWindow() {
                var x = document.getElementById("helpWin");
                if (x.style.display === "none") {
                    x.style.display = "block";
                    x.classList.add = "fadeInRight";
                } else {
                    x.style.display = "none";
                }
            }

        </script>

        <div class="chat-icon" id="helpWin" style="background-color: #111;
    overflow-x: hidden;
    transition: 0.5s; margin-bottom:100px; width:240px;height:330px; padding-top:25px; padding:15px;display:none;">
            <strong class="center-x">Example Login</strong><br><br>
            <strong>Admin:</strong><br> Username: admin<br> Password: root<br><br>
            <strong>User:</strong><br> Username: username<br> Password: password<br>
            <br><br><br> Ofcourse, youre free to create your own account.
        </div>


    </body>


    </html>
