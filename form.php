
<?php

include 'connect.php';
// function sendMail( $e){
//    ini_set('display_error',1);
//    error_reporting(E_ALL);
//    $from = "sagnialemayehu@gmail.com";
//    $to = $e;
   
//    $subject = "PHP Mail Sending Checking";
//    $message = "Thank you for standin with us";
//    $header = "From:" .$from;
//    mail($to,$subject,$message,$header);
//    echo "The email is sent";
// }

if(isset($_POST['submit'])){
   
    
    $email = $_POST['email'];
    // sendMail($email);
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $occupation = $_POST['occupation'];
    $collage = $_POST['collage'];
    $dep = $_POST['department'];
    $location = $_POST['location'];
    $pay = $_POST['pay'];
    $account = $_POST['account'];
    $comment = $_POST['comment'];
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/".$filename;
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
}
  

    // if(($occupation =='officer') || ($occupation == 'other')){
    //     $location = "";
    //     $collage = "";
    //     $dep = "";

    // }
    // else if($occupation =='student'){
    //     $collage = "";
    // }
    // else{
    //     $collage = $_POST['collage'];
    //     $dep = $_POST['department'];
    //     $location = $_POST['location'];
    // }

//    $conn = new mysqli("localhost","root","","sewlesew_db");
    $sql = "INSERT INTO doner_table VALUES('NULL','$fname','$mname','$lname','$gender','$email','$age','$city','$phone','$occupation','$collage','$dep','$location','$pay','$account','$comment','$folder')";
             $conn->query($sql);
     ////////////////////display//////////////
        $sql2 = "SELECT * FROM doner_table";
        $result = $conn->query($sql2);
        // 
            header("Location: index.html");
       
        
        // while($data = $result->fetch_array())
{
  
      ?>
     
   

  
<?php
}
}
?>

        
        
