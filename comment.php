
<?php
function prevent(){
    $url != 'comment.php';

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
    <title>Comments</title>
    <link rel="stylesheet" href="newCOmm.css" />
  </head>
  <body>
    <div class="container">
      <?php
    $sql = "SELECT * FROM doner_table";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()):;?>
      <div class="main-box">
        <div class="img-container">
          <img class="img" src="<?php echo $row['image']; ?>" alt="Maria" />
          <p class="name"><?php echo $row['first_name']." ".  $row['middle_name'];?></p>
        </div>
        <div class="blockquote">
          <p class="quote">
          <?php echo $row['comment'];?>
          </p>
        </div>
      </div>
      <?php endwhile; } ?>
      
    </div>
  </body>
</html>
