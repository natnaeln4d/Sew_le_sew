
<?php
function prevent(){
    $url != 'changepassword.php';

if ($_SERVER['HTTP_REFERER'] == $url) {

  header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");


  $url = '';
  exit();
}

}
?>

<?php
include 'connect.php';

@prevent();
$message = '';

function validate(string $val){
    if($val != ''){
        return $val;
    }
}
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $new_password1 = $_POST['newpassword'];
    $new_password2 = $_POST['newpassword2'];
     if(validate($username) && validate($password) && validate($new_password1) && validate($new_password2)){
     if($new_password1 == $new_password2){

       

        $isSuper = $_GET['isSuper'];
        $id = $_GET['id'];
        if($isSuper == 1){
            $sql = "SELECT id,password,username FROM admin_table WHERE id = '$id'";
            $result = $conn->query($sql);
            $row  = $result->fetch_array();
            if($result->num_rows > 0){
                if(password_verify($password,$row['password'])){
               
                    $new_hash_pass = password_hash($new_password1,PASSWORD_BCRYPT);
               $sql2 = "UPDATE admin_table SET password = '$new_hash_pass' WHERE id = '$id'";
               $result = $conn->query( $sql2);
     
                    header("location: changedForSuperPW.php");
                 }
                 else{
                     $message = "Invalid password and username";
                    }
                    

             }
           }
           else{
            $sql = "SELECT id,password,username FROM admin_table WHERE id = '$id'";
            $result = $conn->query($sql);
            $row  = $result->fetch_array();
            if($result->num_rows > 0){
                if(password_verify($password,$row['password'])){
               
                    $new_hash_pass = password_hash($new_password1,PASSWORD_BCRYPT);
                    $sql2 = "UPDATE admin_table SET password = '$new_hash_pass' WHERE id = '$id'";
                    $result = $conn->query( $sql2);
          
     
                    header("location: changedForSubPW.php");
                 }
                 else{
                     $message = "Invalid password and username";
                    }
                    

             }

           }
          
        
     }
     else{
        $message = "Passwords do not match";
       }
    }
    else{
        $message = "Empty field impossible";
       }
    
}
?>


<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="utf-8">
      
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta name="description" content="This is a login page template based on Bootstrap 5">
      <title>Admin</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  </head>
  
  <body>
      <section class="h-100 mt">
          <div class="container h-100">
              <div class="row justify-content-sm-center h-100">
                  <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                      <div class="text-center my-5">
                          <!-- <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100"> -->
                      </div>
                      <div class="card shadow-lg">
                          <div class="card-body p-5">
                              <h1 class="fs-4 card-title fw-bold mb-4">Change password</h1>
                              <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for=""></label>
                                      <input id="username" type="text" name="username"class="form-control" value="" required autofocus placeholder="Enter Your UserName">
                                
                                         
                                      </div>
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for=""></label>
                                  <input id="username" type="password" name="password"class="form-control" value="" required autofocus placeholder="Enter Your Password">
                            
                                     
                                  </div>
                                  <div class="mb-3">
                                      <label class="mb-2 text-muted" for=""></label>
                                      <input id="password" type="password" name="newpassword"class="form-control" value="" required autofocus placeholder="Enter your new Password">
                                     
                                  </div>
                                  <div class="mb-3">
                                    <label class="mb-2 text-muted" for=""></label>
                                    <input id="password" type="password" name="newpassword2"class="form-control" value="" required autofocus placeholder="Confirm Your new password" aria-required="required">
                                </div>
                                  <div class="d-flex d-grid gap-2 col-4 mx-auto">
                                      
                                      <button type="submit" name="login" class="btn btn-primary align-items-center">
                                         Confirm
                                      </button>
                                  </div>
                                  <div class="err" style = "color:red; text-align:center;">
                                          <?php echo $message;?>
        
                                      </div>
                              </form>
                          </div>
                          <div class="card-footer py-3 border-0">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  
      <script src="js/login.js"></script>
  </body>
  </html>
    