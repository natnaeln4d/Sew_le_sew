
<?php
include 'connect.php';
$sql = "SELECT * FROM admin_table";
$result = $conn->query($sql);

     echo $result->num_rows;
  
?>