<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">


</head>

<body>
    <div class="bar">
        <div class="text--center" style="bottom:0px; font-size:2em; padding-top:30px;">
            hello, user
        </div>
    </div>

    <div class="align text--center">


        <form action="results.php" method="POST" class="form login">

            <div class="form__field">
                <input class="search" id="search" type="text" name="search" class="form__input" placeholder="What book are you looking for?" required>
            </div>

            <div class="form__field">
                <input class="submittt" type="submit" name="submit" value="Search">
            </div>

        </form>

    </div>




</body>

</html>
