
<?php
function prevent(){
    $url != 'PDFMaker2.php';

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

<?php 
include 'connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--html to pdf labirary-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="index.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="printable.css">
    <title>Slip</title>
  </head>
  <body>


  
  <?php

if(isset($_GET['printid'])){
$id = $_GET['printid'];
$merch = "";
$officer = "";
$student = "";
$other = "";



$sql= "SELECT * FROM doner_table WHERE id = '$id'";
$result = $conn->query($sql);
while( $row = $result->fetch_assoc()):;
  $job = $row['occupation'];
  if($job == "officer"){
      $officer =  '<img src="checkbox.png" style = "width: 25px; height:25px; transform:translate(-3px,-3px);">';

  }
  elseif($job == "merchant"){
    $merch =  '<img src="checkbox.png" style = "width: 25px; height:25px; transform:translate(-3px,-3px);">';
  }
  elseif($job == "student"){
    $student =  '<img src="checkbox.png" style = "width: 25px; height:25px; transform:translate(-3px,-3px);">';
  }
  else{
    $other =  '<img src="checkbox.png" style = "width: 25px; height:25px; transform:translate(-3px,-3px);">';
  }
  ?>
  <div class = "print-div" id="print" style = "height:100%; width:100%;">
    <div class="form">
        <header class="header"> 
    <div  class="leftHeader">
    <img src="img/Sewlesew.png" alt="sewlesew logo" />
    </div>  
    <div class="rightHeader">
         <h2>ሰው ለሰው<br />የአረጋዊያን እና ህጻናት መርጃ</h2>
         <h2>የአባላት መመዝግቢያ ቅጽ</h2>
        </div>
</header>
<main>
    <div class="row"><div class="name">1 ስም ከነአያት</div><div class="value" id="fName"><?php echo $row['first_name'] . " ".$row['middle_name']. " ".$row['last_name'];?></div>
</div>
<div class="image">image portion</div>
    <div class="row"><div class="name">እድሜ</div><div class="value"> <?php echo $row['age'];?></div>
    <div class="name">ጾታ</div><div class="value"><?php echo $row['gender'];?></div>
    </div>
    <div class="row">
      <div class="name">2 አድራሻ</div><div class="value"> <?php echo $row['city'];?></div>
     <div class="name">ዞን</div><div class="value"></div>
     </div>
          <div class="row">
          <div class="name">ቀበሌ</div><div class="value"></div>
         
          </div>
    <div class="row">
        <div class="name">የቤት ቁ.</div><div class="value"></div>
        <div class="name">የቤት ስልክ ቁ</div><div class="value"></div>
        
    </div>
     <div class="row">
     <div class="name">ሞባይል</div><div class="value"><?php echo $row['phone_number'];?></div>
     </div>
    <div class="row">
      
        <div class="name">
            <div id="work" >3 ስራ:<br /> </div>
           <span>ነጋዴ</span> <span class="box"><?php echo $merch;?></span>
           <span>የመንግስት ሰራተኛ</span>  <span class="box"><?php echo $officer;?></span>
           <span>ተማሪ</span>  <span class="box"><?php echo $student;?></span>
        <span>ሌላ</span> <span class="box"><?php echo $other;?></span>
        
    </div>
    </div>
    <div class="row">

      <div class="name">መ/ቤት </div><div class="value"><?php echo $row['collage'];?></div>
    <div class="name">የስራ አድራሻ</div><div class="value"><?php echo $row['office_location'];?></div>
    <div class="name">የስራ ቦታ ስልክ</div><div class="value"></div>    
    </div>
    <div class="row"><div class="name">4 የመዋጮ መጥን</div><div class="value"><?php echo $row['monthly_payment'];?></div></div>
    <div class="row"><div class="name">5 ክፍያዉን ከዚህ በታች ከተጠቀሱት መንገዶች አንዱን ይምረጡ </div><div class="value"></div>
</div>
    <div class="row"><div class="name">5.1 ከባንክ ኢሳብ የሚቆረጥ <span class="box"></span> </div>

    </div>
    <div class="row">
        <div class="name">5.1.1 </div><div class="value"></div>

    </div>
    <div class="row">
        <div class="name">5.1.2</div><div class="value"></div>

    </div>
    <!-- <div class="row">
        <div class="name">5.1.3</div><div class="value"></div>

    </div> -->
    <div class="row">
        <div class="name">5.2 በድርጅቱ በኩል በየወሩ በካሽ የሚከፈል</div><div class="box"></div>

    </div>
    <div class="row">
        <div class="name">5.3 ወደ ድርጅቱ ሂሳብ በየወሩ ወደ ባንክ ለማስገባት </div><div class="box"></div>

    </div>
    <div class="row">
        <div class="name">5.4 ድርጅቱ ድረስ ፊት ለፊት ቀርቦ መክፈል</div><div class="box"></div>

    </div>
    <div class="row">
        <div class="name">6.የ ክፍያ ቀን ከ ቅን 1 እስከ 5 </div><div class="value"></div>

    </div>
    <div class="row">
        <div class="name">7 ለሁሉም ክፍያዎች በድርጅቱ ደረሰኝ ይቆረትበታል  </div><div class="value"></div>

    </div>
    <div class="row">
        
       <div class="name">ፊርማ </div><div class="value"></div>
      <div class="name">ቀን </div><div class="value"></div>
    </div>    
    

</main>


 <!-- bank form -->

 

</body>
</html>


<?php endwhile; }?>
</div>
</div>
<!--end pdf id-->
<button  onclick="generatPDF()" id = "print-btn">
       <p class="pdf-print"> Download As PDF <p>

</button>

<!-- <script src="find.js"></script> -->


  </body>
</html>