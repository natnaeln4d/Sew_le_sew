
<?php
function prevent(){
    $url != 'searchLive.php';

if ($_SERVER['HTTP_REFERER'] == $url) {
//   header('Location: login.php'); //redirect to some other page
  header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");


  $url = '';
  exit();
}

}
?>

<?php 
@prevent();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>

<body>
    <div class="table-responsive">
        <table class="table table bordered table table-striped " style = "margin-top:27px;">
        <tr>
            <thead class="table-success" ">
            
            
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>City</th>
            <th>Collage</th>
            <th>Department</th>
            <th>Office Number</th>
            <th>Monthly Payment</th>
            <th>Account number</th>
            
        </tr>
        </thead>
        <tr>
            <?php
require ('config.php');
$return = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT * FROM doner_table
	WHERE  first_name LIKE '%".$search."%'  
    OR collage LIKE '%".$search."%'
    
	";}
else
{
	$query = "SELECT * FROM doner_table";
}
$result = mysqli_query($conn, $query);


if(mysqli_num_rows($result) > 0)
{
    while($row1 = mysqli_fetch_array($result)):;?>
            <td><?php echo $row1['first_name']." ".$row1["middle_name"];?></td>
            <td><?php echo $row1["email"];?></td>
            <td><?php echo $row1["age"];?></td>
            <td><?php echo $row1["city"];?></td>
            <td><?php echo $row1["collage"];?></td>
            <td><?php echo $row1["department"];?></td>
            <td><?php echo $row1["office_location"];?></td>
            <td><?php echo $row1["monthly_payment"];?></td>
            <td><?php echo $row1["account_no"];?></td>
            
            </tr>
            <?php endwhile;
        } 
     ?>
</body>
</html>