<?php include 'header.php'; ?>


<form action="#" method="POST">
    <div class="form__field center-x" style="white-space: nowrap;">
        <input class="search" id="search" type="text" style="color:white;margin-right:8px;" name="search" class="form__input" placeholder="What book are you looking for?" required>
        <input class="submittt" name="submit" type="submit" value="Search">
    </div>
</form>

<div class="center-x">
    <div style="width:100%; margin-top: 80px;">
        <?php
include 'connect.php';  
        
        $keyword = $_POST['search']; 
        
        //find match
            $sql='Select * from books where (title LIKE "%'. $keyword .'%") or (author LIKE "%'. $keyword .'%");';
        
            //run query
            $result = mysqli_query($conn, $sql);
        
if(isset($_POST['submit'])) {
 
            
        
            
            
    
            if(mysqli_num_rows($result) == 0)
                {
                    echo 'No such book exists';
                }
                else
                {    //prepare the table   ?>

            <table class="center-x" style="width:800px; color:white; border-color:#2c3338;">
                <tr>
                    <th></th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($result))
                        {      
                        $b_id = $row['bookid']; ?>
                <tr>

                    <td style="width:150px;height:170px;" rowspan="4"><img src="<?php echo $row['picture-location']; ?>" style="width:150px;height:170px;" /></td>
                    <td> Title:
                        <?php echo $row['title']; ?>
                    </td>
                </tr>
                <tr>
                    <td> Author:
                        <?php echo $row['author']; ?>
                    </td>
                </tr>
                <tr>
                    <td> Description:
                        <?php echo $row['description']; ?>
                    </td>
                </tr>
                <tr>

                    <td style="text-align:center;" height="70px">
                        <form action="#" method="POST"><input class="submittt" style="<?php if($_SESSION['signed_in'] == true){ ?> display:inline-block; <?php }else{ ?>display: none;<?php } ?>" type="submit" name="books<?php echo $b_id; ?>" value="DOWNLOAD" /></form>
                        <p style="<?php if($_SESSION['signed_in'] == true){ ?> display:none; <?php }else{ ?>display: block;<?php } ?>">Must be signed in to download</p>
                    </td>

                </tr>
                <?php } ?>
            </table>
            <?php }
    
        
}       
        
while($row = mysqli_fetch_assoc($result))
                        {      
                        $b_id = $row['bookid'];
if(isset($_POST['books'. $b_id])) {

$insrt = 'insert into dloads (user, book, date) values ("'. $_SESSION['user_id'] .'", "'. $b_id .'", CURRENT_TIMESTAMP)';
$query = mysqli_query($conn, $insrt);
if(!$query){
    echo 'error'. mysqli_error($conn);
}else{
$file_url = $row['book-location'];
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
readfile($file_url); // do the double-download-dance (dirty but worky)
}

}
}
?>


    </div>
</div>

</body>

</html>
