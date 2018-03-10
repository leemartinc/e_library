<?php include 'header.php'; 


include 'connect.php';     


			$usr = $_SESSION['user_id'];
        
            //find match
      $sql='Select 
            	dloads.user, 
            	dloads.book, 
            	books.bookid, 
            	books.title, 
            	books.author, 
            	books.description, 
            	books.`book-location`
            FROM 
            	dloads 
            LEFT JOIN 
    			books 
			ON 
    			dloads.book = books.bookid
            WHERE 
            	user = "'. $usr .'"';
        
            //run query
            $result = mysqli_query($conn, $sql);
            
    		if(!$result)
        {
            echo 'The posts could not be displayed, please try again later.' . mysqli_error($conn);
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
                {
                    echo 'You have not downloaded books yet';
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
                    <td style="width:150px;height:170px;" rowspan="4"><img src="'. $row['picture-location'] .'" style="width:150px;height:170px;" /></td>
                    <td>  Title: '. $row['title'] .'</td>
                </tr>
                <tr>
                    <td>  Author: '. $row['author'] .'</td>
                </tr>
                <tr>
                    <td>  Description: '. $row['description'] .'</td>
                </tr>
                <tr>
                    <td style="text-align:center;" height="70px"><a class="submittt" href="'. $row['book-location'] .'" download>DOWNLOAD AGAIN</a></td>
                </tr>';
                        }
                        echo '</table>';
                }
            }
    
        

?>


</body>

</html>
