<?php
$Rows = $_POST['rows']; 
$Cols = $_POST['columns'];
echo "The Table is ";
echo '<table border="1">';
for($i=1;$i<=$Rows;$i++){ echo '<tr>';
for($j=1;$j<=$Cols;$j++){ echo '<td>' . mt_rand($i, $i*100) . mt_rand($j, $j*100) . '</td>'; }
echo '</tr>';
}
echo '</table>';
?>
