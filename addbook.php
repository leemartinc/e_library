<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="bar">
        <div class="fl-lt" style="padding:10px; top:0;">
            <a class=" submittt " type="button " value="Go Home " href="home.php ">Go Home</a>
        </div>
        <div class="fl-rt " style="padding:10px; top:0; ">
            <a class="submittt " type="button " value="Go Home " href="home.php ">Log Out</a>
        </div>
        <div class="text--center " style="bottom:0px; font-size:2em; padding-top:30px; ">
            hello, user
        </div>

    </div>

    <div class="align">


        <p>Add book picture</p>
        <input type="file" id="files" name="picture" />
        <output id="list"></output>
        <div id="preview"><img id="blah" src="http://placehold.it/180" alt="your image" /></div>

        <script>
            function handleFileSelect(evt) {
                var files = evt.target.files; // FileList object

                // Loop through the FileList and render image files as thumbnails.
                for (var i = 0, f; f = files[i]; i++) {

                    // Only process image files.
                    if (!f.type.match('image.*')) {
                        continue;
                    }

                    var reader = new FileReader();

                    // Closure to capture the file information.
                    reader.onload = (function(theFile) {
                        return function(e) {
                            // Render thumbnail.
                            var span = document.getElementById('preview');
                            span.innerHTML = ['<img class="thumb" src="', e.target.result,
                                '" title="', escape(theFile.name), '"/>'
                            ].join('');
                            document.getElementById('list').insertBefore(span, null);
                        };
                    })(f);

                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);
                }
            }

            document.getElementById('files').addEventListener('change', handleFileSelect, false);

        </script>

        <div class="grid">

            <form action="https://httpbin.org/post" method="POST" class="form login">

                <div class="form__field">
                    <input type="text" name="title" class="form__input" placeholder="Title" required>
                </div>


                <div class="form__field">
                    <input type="text" name="author" class="form__input" placeholder="Author" required>
                </div>

                <div class="form__field">
                    <textarea type="text-area" name="description" class="desc" placeholder="Description" required></textarea>
                </div>

                <div class="form__field">
                    <p>Upload the book</p><br>
                    <input type="file" name="downloads" class="form__input text--center" placeholder="Download" required>
                </div>




                <div class="form__field">
                    <input type="submit" name='submit' value="Add Book">
                </div>

            </form>


        </div>

        <svg xmlns="http://www.w3.org/2000/svg" class="icons"><symbol id="arrow-right" viewBox="0 0 1792 1792"><path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/></symbol><symbol id="lock" viewBox="0 0 1792 1792"><path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/></symbol><symbol id="user" viewBox="0 0 1792 1792"><path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/></symbol></svg>

    </div>

    <?php
        
    include 'connect.php';
    
    if(isset($_POST['submit'])){
        
        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        
        $insrt="INSERT INTO 'books'('bookid', 'title','author', 'description'') VALUES ('676','$title','$author','$description');";
        
        if(mysqli_query($conn, $insrt)){
             while($row = mysqli_fetch_assoc($result))
                    {
                        $_SESSION['title1']    = $row['title'];
                        $_SESSION['author1']  = $row['author'];
                        $_SESSION['desc1'] = $row['description'];
                    }
            
        }
        
        
    }
    
    ?>

</body>

</html>
