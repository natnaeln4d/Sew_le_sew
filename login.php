<?php 

session_start();
error_reporting(E_ALL ^ E_WARNING);
include 'connect.php';


if($_SESSION["locked"]){
	$diff = time() - $_SESSION["locked"];
	if($diff > 21600){
		unset($_SESSION["locked"]);
		unset($_SESSION["login_attempts"]);
	}
}

$message = "";
$div = "";
$sign = "";
$account = "";
 
function validate(string $val){
    if($val != ''){
        return $val;
    }
}


if(isset($_POST['login'])){
    
    $username =   $conn->real_escape_string($_POST['user']);
    $password =   $conn->real_escape_string($_POST['password']);
    if(validate($username) && validate($password)){

    $sql = "SELECT id,password,username,first_name,middle_name,email,isSuper,image FROM admin_table WHERE username = '$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
	$num = $result->num_rows;

	// if($num == 0){
	// 	    $sign = "Sign up";
	// 		$account = "Don't have an account?";

	//}
    if( $result->num_rows > 0 ){
        if((password_verify($password,$row['password'])) ){
			$_SESSION['logged_in'] = true;
			$_SESSION['username'] = $_POST['user'];
			$_SESSION['password'] = $_POST['password'];
            if($row['isSuper'] == 1){

				$name = $row['first_name']." ". $row['middle_name'];
				$email = $row['email'];
				$image = $row['image'];
				$id = $row['id'];
				$isSuper = $row['isSuper'];
				
                header("Location: adminPanel1.php?name=".$name."&email=".$email."&image=".$image."&id=".$id."&isSuper=".$isSuper);
               
            }
            else{
				$name = $row['first_name']." ". $row['middle_name'];
				$email = $row['email'];
				$image = $row['image'];
				$id = $row['id'];
				$isSuper = $row['isSuper'];
				header("Location: adminPanel2.php?name=".$name."&email=".$email."&image=".$image."&id=".$id."&isSuper=".$isSuper);
            }
        }
        else{
			$_SESSION["login_attempts"] +=1;
            $message = "Invalid password and username";
           }
       
        }
        else{
            $message = "Coudn't find your account";
			
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
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
							<form method="POST"  class="needs-validation" action="login.php" novalidate="" autocomplete="off">
								<!--  -->
								<div class="mb-3">
									<label class="mb-2 text-muted" for="">UserName</label>
									<input id="email" type="text" name="user"class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>
                                <div class="mb-3">
									<label class="mb-2 text-muted" for="">password</label>
									<input id="email" type="password" name="password"class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>
								<div class="d-flex d-grid gap-2 col-4 mx-auto">
									
								<?php 
					   if($_SESSION["login_attempts"] > 5) {
				      	$_SESSION["locked"] = time();
					     echo "<p>wait 10 seconds</p>";

							}
						else{

									
							?>
						<button type="submit" name="login" class="btn btn-primary align-items-center">
							Login
						</button>
                              <?php }?>
								</div>
                                <div class="err" style = "color:red; text-align:center;">
                                          <?php echo $message;?>
                                          
        
                                      </div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
							 <a href="register.php" class="text-dark">Sign up</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>


    
    
        
        
    


