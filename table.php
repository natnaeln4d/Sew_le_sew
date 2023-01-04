
<?php
function prevent(){
    $url != 'table.php';

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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="table.css" />
    <title>Print</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="header">
        <p>ENTER THE ID OF THE PERSON YOU WANT TO PRINT</p>
      </div>

      <div class="container">
        <div class="search_wrap search_wrap_6">
          <div class="search_box">
            <form method="POST" action="PDFMaker2.php">
            <input type="text" class="input" name="id" placeholder="search..." />
            <div class="btn">
              <!-- <button type="submit" name="search">Search</button> -->
              <input type="submit" type="text" name="submit" value = "Enter" class=" find btn">
            </div>
            </form>
          </div>
        </div>
      </div>
      </div>
    

      </body>
</html>
