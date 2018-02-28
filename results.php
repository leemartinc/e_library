<?php include 'header.php'; ?>


<div class="form__field center-x">
    <input class="search" id="search" type="text" name="search" class="form__input" placeholder="What book are you looking for?" required>
    <input class="submittt" type="submit" value="Search">
</div>
<div class="center-x">
    <div style="width:100%; margin-top: 80px;">
        <?php
 //prepare the table
        echo '<table class="table-fill">
              <tr>
                <th></th>
              </tr>'; 
             
        while($row = mysqli_fetch_assoc($result))
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
                    echo '<h3><a href="/forum/topics.php?id= '. $row['cat_id'] .' ">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
                echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
?>

            <table class="center-x" border="2" style="width:800px">
                <tr>
                    <td style="width:150px;height:170px;" rowspan="4">picture</td>
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
                <!----------------------------->

            </table>

    </div>
</div>

</body>

</html>
