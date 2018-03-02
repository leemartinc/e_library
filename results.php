<?php include 'header.php'; ?>


<form action="#" method="POST">
    <div class="form__field center-x">
        <input class="search" id="search" type="text" style="color:white;" name="search" class="form__input" placeholder="What book are you looking for?" required>
        <input class="submittt" name="submit" type="submit" value="Search">
    </div>
</form>

<div class="center-x">
    <div style="width:100%; margin-top: 80px;">
        <?php
include 'connect.php';      
if(isset($_POST['submit'])) {
 
            $keyword = $_POST['search']; 
        
            //find match
            $sql='Select * from books where (title LIKE "%'. $keyword .'%") or (author LIKE "%'. $keyword .'%");';
        
            //run query
            $result = mysqli_query($conn, $sql);
            
    
            if(mysqli_num_rows($result) == 0)
                {
                    echo 'No such book exists';
                }
                else
                {
                    //prepare the table
                    echo '<table class="center-x" style="width:800px; color:white; border-color:#2c3338;">
                      <tr>
                        <th></th>
                      </tr>'; 

                        while($row = mysqli_fetch_assoc($result))
                        {               
                            echo '<tr>
                    <td style="width:150px;height:170px;" rowspan="4"><img src=http://placehold.it/180" style="width:150px;height:170px;" /></td>
                    <td>  Title: '. $row['title'] .'</td>
                </tr>
                <tr>
                    <td>  Author: '. $row['author'] .'</td>
                </tr>
                <tr>
                    <td>  Description: '. $row['description'] .'</td>
                </tr>
                <tr>
                    <td style="text-align:center;" height="70px"><a class="submittt" href="'. $row['book-location'] .'" download>DOWNLOAD</a></td>
                </tr>';
                        }
                        echo '</table>';
                }
    
        
}
?>


            <!--
            <table class="center-x" border="2" style="width:800px">
                <tr>
                    <td style="width:150px;height:170px;" rowspan="4"><img src="https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwi__aLdqczZAhWIvVMKHUibB7cQjRx6BAgAEAY&url=https%3A%2F%2Fimagejournal.org%2F&psig=AOvVaw2DyPzaBDlUovlHBQm4fY0r&ust=1520034987267092" style="width:150px;height:170px;" /></td>
                    <td>title</td>
                </tr>
                <tr>
                    <td>author</td>
                </tr>
                <tr>
                    <td>Description</td>
                </tr>
                <tr>
                    <td style="text-align:center;" height='70px'><a class="submittt" href="/files/Lee-Martin_Clarke's_Resume.pdf" download>DOWNLOAD</a></td>
                </tr>
                

            </table>
--------------------------->

    </div>
</div>

</body>

</html>
