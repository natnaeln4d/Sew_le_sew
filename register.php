
<?php
function prevent(){
    $url != 'register.php';

if ($_SERVER['HTTP_REFERER'] == $url) {
//   header('Location: login.php'); //redirect to some other page
  header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");


  $url = '';
  exit();
}

}
?>

<?php 
// @prevent();
?>

<?php
include 'connect.php';

$message = '';

function validate(string $val){
  if($val != ''){
      return $val;
  }
}

if(isset($_POST['register'])){
    // $conn = new mysqli("localhost","root","","debo");
      $fname =   $conn->real_escape_string($_POST['fname']);
      $mname =   $conn->real_escape_string($_POST['mname']);
      $email =    $conn->real_escape_string($_POST['email']);
      $username =   $conn->real_escape_string($_POST['username']);
      $password1 =   $conn->real_escape_string($_POST['password1']);
      $password2 =   $conn->real_escape_string($_POST['password2']);
      if(validate($fname) && validate($mname) && validate($email) && validate($username) &&validate($password1) && validate($password2) ){
      if($password1 == $password2){

        $hash_pass = password_hash($password1,PASSWORD_BCRYPT);
        
         $sql2 = "SELECT id FROM admin_table";
         $result = $conn->query($sql2);
        
         if($result->num_rows > 0){
          // header("Location: login.php");
          $message = "You are not authenticated to be registered as an admin";
           
         }
         else{
          $sql = "INSERT INTO admin_table(id, first_name, middle_name, email, username, password, isSuper,image) VALUES ('NULL','$fname','$mname','$email','$username','$hash_pass',1,'profile/profile.png')";
          $conn->query($sql);
          header("Location: wellcomeSuper.php");
          
             }
         }
         else{
          $message = "Password mismatched";
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
    <title>Sign up</title>
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
                            <h1 class="fs-4 card-title fw-bold mb-4">Sign Up</h1>
                            <form method="POST" action="" class="needs-validation" novalidate="" autocomplete="off">
                              <div class="mb-3">
                                  <label class="mb-2 text-muted" for=""></label>
                                    <input id="username" type="text" name="fname"class="form-control" value="" required autofocus placeholder="Enter Your First Name">
                              
                                       
                                    </div>
                          <div class="mb-3">
                              <label class="mb-2 text-muted" for=""></label>
                                <input id="username" type="text" name="mname"class="form-control" value="" required autofocus placeholder="Enter Your Middle Name">
                          
                                   
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for=""></label>
                                    <input id="email" type="email" name="email"class="form-control" value="" required autofocus placeholder="Enter your Email">
                                   
                                </div>
                                <div class="mb-3">
                                  <label class="mb-2 text-muted" for=""></label>
                                  <input id="password" type="text" name="username"class="form-control" value="" required autofocus placeholder="Enter Your user name" aria-required="required">
                              </div>
                              <div class="mb-3">
                                  <label class="mb-2 text-muted" for=""></label>
                                  <input id="password" type="password" name="password1"class="form-control" value="" required autofocus placeholder="Enter Your password" aria-required="required">
                              </div>
                              <div class="mb-3">
                                  <label class="mb-2 text-muted" for=""></label>
                                  <input id="password" type="password" name="password2"class="form-control" value="" required autofocus placeholder="Confirm password" aria-required="required">
                              </div>
                              
                                <div class="d-flex d-grid gap-2 col-4 mx-auto">
                                    
                                    <button type="submit" name="register" class="btn btn-primary align-items-center">
                                       Register
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
  