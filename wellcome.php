
<?php
function prevent(){
    $url != 'wellcomeSub.php';

if ($_SERVER['HTTP_REFERER'] == $url) {
//   header('Location: login.php'); //redirect to some other page
  header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");


  $url = '';
  exit();
}

}
?>

<?php 
include 'connect.php';
@prevent();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Admin</title>
    <link rel="stylesheet" href="password-change.css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="header">
        <h2>You Have successfully Added One Admin</h2>
      </div>
      <div class="btn-container">
      
      <?php
      $id = $_GET['id'];
      $sql = "SELECT * FROM admin_table WHERE id = '$id'";
      $result = $conn->query( $sql);
      $row = $result->fetch_assoc();

      $name = $row['first_name']." ". $row['middle_name'];
                    $email = $row['email'];
                    $image = $row['image'];
                    $id = $row['id'];
                    $isSuper = $row['isSuper'];
                    $name = $row['first_name']." ". $row['middle_name'];
                    //header("Location: adminPanel1.php?name=".$name."&email=".$email."&image=".$image."&id=".$id."&isSuper=".$isSuper);

     
      ?>
        <a href="adminPanel1.php?email=<?php echo $email;?>&image=<?php echo $image;?>&id=<?php echo $id;?>&isSuper=<?php echo $isSuper;?>&name=<?php echo $name;?>" class="btn">Go Back</a>
      </div>
    </div>
    <div></div>
 
  </body>
</html>
