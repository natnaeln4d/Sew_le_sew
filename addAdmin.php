
<?php
function prevent(){
    $url != 'addAdmin.php';

if ($_SERVER['HTTP_REFERER'] == $url) {

  header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");


  $url = '';
  exit();
}

}
?>

<?php
include 'connect.php';
$message = "";
@prevent();
function validate(string $val){
    if($val != ''){
        return $val;
    }
}

if(isset($_POST['register'])){
    
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
         $id = $_GET['id'];
 
             
         if(($result->num_rows > 0) && ($result->num_rows <= 3)){
            $sql = "INSERT INTO admin_table(id, first_name, middle_name, email, username, password, isSuper,image) VALUES ('NULL','$fname','$mname','$email','$username','$hash_pass',0,'profile/profile.png')";
            $conn->query($sql);
           
            header("Location: wellcome.php?id=".$id);
         }
         else{
            $message = "Limit of Number of Admins Reached";
           }
       
      }
      else{
        $message = "Password does not match";
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
      <title>Add Admin</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  </head>
  
  <body>
      <section class="h-100 mt">
          <div class="container h-100">
              <div class="row justify-content-sm-center h-100">
                  <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                      <div class="text-center my-5">
                         
                      </div>
                      <div class="card shadow-lg">
                          <div class="card-body p-5">
                              <h1 class="fs-4 card-title fw-bold mb-4">Add Admin</h1>
                              <form method="POST"  class="needs-validation" novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for=""></label>
                                      <input id="username" type="text" name="fname"class="form-control" value="" required autofocus placeholder="Enter First Name">
                                
                                         
                                      </div>
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for=""></label>
                                  <input id="username" type="text" name="mname"class="form-control" value="" required autofocus placeholder="Enter Middle Name">
                            
                                     
                                  </div>
                                  <div class="mb-3">
                                      <label class="mb-2 text-muted" for=""></label>
                                      <input id="email" type="email" name="email"class="form-control" value="" required autofocus placeholder="Enter Email">
                                     
                                  </div>
                                  <div class="mb-3">
                                    <label class="mb-2 text-muted" for=""></label>
                                    <input id="password" type="text" name="username"class="form-control" value="" required autofocus placeholder="Enter user name" aria-required="required">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for=""></label>
                                    <input id="password" type="password" name="password1"class="form-control" value="" required autofocus placeholder="Enter password" aria-required="required">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for=""></label>
                                    <input id="password" type="password" name="password2"class="form-control" value="" required autofocus placeholder="Confirm The password" aria-required="required">
                                </div>
                                
                                  <div class="d-flex d-grid gap-2 col-4 mx-auto">
                                      
                                      <button type="submit" name="register" class="btn btn-primary align-items-center">
                                         Add
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
  </body>
  </html>
    