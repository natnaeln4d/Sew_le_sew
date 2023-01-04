
<?php

include 'connect.php';
if(isset($_POST['submit'])){

    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "profile/".$filename;
    if (move_uploaded_file($tempname, $folder)) {
           $id = $_GET['id'];
           $isSuper = $_GET['isSuper'];
        $sql2 = "UPDATE admin_table SET image = '$folder' WHERE id = '$id'";
        
            $result = $conn->query( $sql2);

            $sql = "SELECT * FROM admin_table WHERE id = '$id'";
              $res = $conn->query( $sql);
              $row = $res->fetch_assoc();
            if($result){
               
                if($isSuper == 1){
                    $name = $row['first_name']." ". $row['middle_name'];
                    $email = $row['email'];
                    $image = $row['image'];
                    $id = $row['id'];
                    
                    header("Location: adminPanel1.php?name=".$name."&email=".$email."&image=".$image."&id=".$id."&isSuper=".$isSuper);

                }
                else{
                    $name = $row['first_name']." ". $row['middle_name'];
                    $email = $row['email'];
                    $image = $row['image'];
                    $id = $row['id'];
                    header("Location: adminPanel2.php?name=".$name."&email=".$email."&image=".$image."&id=".$id."&isSuper=".$isSuper);
                }
                

            }

    }
}


    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="creatingsteps.css" />
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="id-inner">
            <input type="file" name="uploadfile" class="input" required />
        </div>
        <input type="submit" class="btn-form next-p" id="submit" value="Change" name="submit"  />
     
    </form>
    
</body>
</html>

