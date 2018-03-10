<?php include 'header.php'; 
include 'connect.php';


$sql = 'select * from users where username="'. $_SESSION['username'] .'"';

 $result = mysqli_query($conn, $sql);

?>


<div class="midcontainer">
    <table>
        <caption>
            <?php echo $_SESSION['user_name']; ?>'s account</caption>
        <tr>
            <td>Username:</td>
            <td>
                <?php echo $_SESSION['username']; ?>
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>
                <?php while($row = mysqli_fetch_assoc($result))
                {
                echo $row['password'];
                
                } ?>
            </td>
        </tr>
        <tr>
            <!--<td colspan="2">your favourite book is...</td>-->
        </tr>

    </table>
</div>


</body>

</html>
