<?php
function prevent(){
    $url != 'adminPanel2.php';

if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: login.php'); 
  $url = '';
  //redirect to some other page
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
    <title>Profile</title>

    <link rel="stylesheet" href="styleprofile.css" />
    <link rel="stylesheet" href="responsive.css" />

    <link rel="stylesheet" href="fonts/remixicon.css" />
  </head>

  <body>
    <span class="main_bg"> </span>

    <!-- ===== ===== Main-Container ===== ===== -->
    <div class="container">
      <!-- ===== ===== Header===== ===== -->
      <?php

    if(isset($_GET['profileid'])){
           $id = $_GET['profileid'];


//   $conn = new mysqli("localhost", "root", "", "sewlesew_db");
              $sql= "SELECT * FROM doner_table WHERE id = '$id'";
              $result = $conn->query($sql);
              while( $row = $result->fetch_assoc()):;?>
  
      <!-- ===== ===== User Main-Profile ===== ===== -->
      <section class="userProfile card">
        <div class="profile">
          <figure>
            <img src="profile/profile.png" alt="profile" width="250px" height="250px" />
          </figure>
        </div>
      </section>

      <!-- ===== ===== Donation information section ===== ===== -->
      <section class="work_skills card">
        <!-- ===== ===== Donation Contaienr ===== ===== -->
        <div class="work">
          <h1 class="heading">Donation Information</h1>
          <div class="primary">
            <h1>CBE Bank Account Number</h1>

            <p><?php echo $row['account_no'];?></p>
          </div>

          <div class="secondary">
            <h1>Monthly Donation Amount</h1>

            <p><?php echo $row['monthly_payment'];?> ETB</p>
          </div>
          <div class="secondary">
            <h1>Comment</h1>

            <p>
            <?php echo $row['comment'];?>.
            </p>
          </div>
        </div>
      </section>

      <!-- ===== ===== User Details Sections ===== ===== -->
      <section class="userDetails card">
        <div class="userName">
          <h1 class="name"><?php echo $row['first_name'] . " ".$row['middle_name'];?></h1>
          <div class="map">
            <i class="ri-map-pin-fill ri"></i>
            <!-- <span>Jimma, Ethiopia</span> -->
          </div>
          <p> <?php echo $row['occupation'];?></p>
        </div>
      </section>

      <!-- ===== ===== Full information sections ===== ===== -->
      <section class="timeline_about card">
        <div class="tabs">
          <ul>
            <li class="about active">
              <i class="ri-user-3-fill ri"></i>
              <span>FULL INFORMATION</span>
            </li>
          </ul>
        </div>
        <div class="info-container">
          <div class="info-sub-container">
            <div class="basic_info">
              <h1 class="heading">Personal Information</h1>
              <ul>
                <li class="birthday">
                  <h1 class="label">Full name:</h1>
                  <span class="info"><?php echo $row['first_name'] . " ".$row['middle_name'];?></span>
                </li>

                <li class="sex">
                  <h1 class="label">Gender:</h1>
                  <span class="info"> <?php echo $row['gender'];?></span>
                </li>
                <li class="age">
                  <h1 class="label">Age:</h1>
                  <span class="info"><?php echo $row['age'];?></span>
                </li>
                <li class="job">
                  <h1 class="label">Occupation:</h1>
                  <span class="info"> <?php echo $row['occupation'];?></span>
                </li>
                <li class="job">
                  <h1 class="label">Collage:</h1>
                  <span class="info"><?php echo $row['collage'];?></span>
                </li>
                <li class="dep">
                  <h1 class="label">Department:</h1>
                  <span class="info"><?php echo $row['department'];?></span>
                </li>
              </ul>
            </div>

            <div class="contact_info">
              <h1 class="heading">Contact Information</h1>
              <ul>
                <li class="phone">
                  <h1 class="label">Phone:</h1>
                  <span class="info"><?php echo $row['phone_number'];?></span>
                </li>
                <li class="email">
                  <h1 class="label">E-mail:</h1>
                  <span class="info"> <?php echo $row['email'];?></span>
                </li>

                <li class="address">
                  <h1 class="label">City:</h1>
                  <span class="info"><?php echo $row['city'];?> <br /> </span>
                </li>
                <li class="loc">
                  <h1 class="label">Office Location:</h1>
                  <span class="info"> <?php echo $row['office_location'];?></span>
                </li>
              </ul>
            </div>
          </div>
          <div class="img-container">
            <img src="<?php echo $row['image'];?>" class="id-img" alt="" />
          </div>
        </div>
      </section>
      <?php endwhile; }?>
    </div>
  </body>
</html>
