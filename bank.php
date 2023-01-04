
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
    <link rel="stylesheet" href="printable2.css">
    <title>Slip</title>
  </head>
  <body>


  
  <?php

if(isset($_GET['printid'])){
$id = $_GET['printid'];




$sql= "SELECT * FROM doner_table WHERE id = '$id'";
$result = $conn->query($sql);
while( $row = $result->fetch_assoc()):;

  ?>
   <div class = "print-div" id="print" style = "height:100%; width:100%;">
<header class="Bheader"> 
        <div class="BupperHeader">
        <div class="Bcbe-logo"></div>
            <div  class="BleftHeader">
                
                <h2>COMMERCIAL BANK OF ETHIOPIA</h2>
                <h2>የኢትዮጵያ ንግድ ባንክ</h2>
              </div>  
              <div class="BrightHeader">
                  <h2>FROM : CBECATS106</h2>
                  <h2>CUSTOMERS STANDING INSTRUCT</h2>
                  <h2>የደምበኞች ቋሚ ትዕዛዝ መቀበያ </h2>
                  </div>

        </div>
        <div class="BlowerHeader">
            <h2>Please complete this form BLOCK LETTERS </h2>
        </div>      
</header>
<main class="bank-main">
    <div class="row">
        <div class="name"> አዲስ ቋሚ ትዕዛዝ / New Standing Instruction</div><div class="bvalue"></div>
</div>
    <div class="row"><div class="name">የነበረዉን ቋሚ ትዕዛዝ ማሻሻል / Amendment of Existing Standing Instruction </div><div class="bvalue"></div>

    </div>
    <div class="row">
      <div class="name"> የተቀናሽ ሂሳብ ቁጥር / Debt Account Number</div><div class="bvalue"><?php echo $row['account_no'];?></div>
     </div>
    <div class="row">
      <div class="name"> የሂሳቡ ባለቤት ስም / Account Holder Name</div><div class="bvalue"><?php echo $row['first_name'] . " ".$row['middle_name'];?></div>
    </div>
    <div class="row">
        <div class="name">ትዕዛዙ ተፈጻሚነቱ የሚጀመርበት ቀን / Effective Date</div><div class="bvalue"></div>
      </div>
      <div class="row">
        <div class="name"> ትዕዛዙ የሚያበቃበት ጊዜ /Expire Date </div><div class="bvalue"></div>
      </div>
      <div class="row">
        <div class="name  spanned">
            <span >
                በየቀኑ / Daily  <div class="span-box">                    
                </div>
            </span>
            <span >
                በየሳምንቱ /Weekly<div class="span-box">                    
                </div>
            </span>
            <span >
                በየወሩ /Monthly<div class="span-box">                    
                </div>
            </span>
            <span >
                የሚቀነስበት ቀን ይግለጹ /<br/> state the Exact Date           
            ..........................
            </span>

         </div>
      </div>

      <div class="row">
        <div class="name">የሚተላለፍበት ገንዘብ መጠን /Transaction Amount   </div><div class="bvalue"><?php echo $row['monthly_payment'];?> ETB</div>
      </div>
   <div class="row">
        <div class="name empP"><span class="emp">ማሳሰቢያ </span> 
             ፡ ተቀናሽ ሂሳቡ ትዕዛዙ ተፈጻሚ በሚሆንበት ቀን
             በቂ ስንቅ  ከሌለው  ባንኩ ሃላፊነት አይወስድም
             ፡በተጨማሪም ባንኩ በስህተት ከተጠቀሰው ጊዜ በላይ ወይም ከተጠቀሰው የገንዘብ
              መጠን በላይ ቢቀነስ በስህተት የተቀነሰው ወይም በልዩነቱ ከታች ከተጠቀሰው ሂሳብ
               የማስተካከያ እርምጃ ይወሰዳል</div>
    </div>
    <div class="row">
        <div class="name empP"><span class="emp">Notice </span>
              : when the account to be debited has insufficient 
              fund during the data of transfer the bank will be responsible for not committing 
              the transaction and also if the back wrongly credited out the stated or exceeding the amount stated above 
            the transfer amount mentioned or or the difference will bea automatically reserved.
        </div>
        
   </div>
   <div class="row">
    <div class="name">ገንዘቡ ገቢ የሚደረግበት ሂሳብ  / beneficiary Account Number</div>
    <div class="bvalue"> </div>
</div>
<div class="row">
    <div class="name">የሂሳቡ ባለቤት ስም / /beneficiary`s Name</div>
    <div class="bvalue"> </div>
</div>
<div class="row">
    <div class="name">ከሂሳቡ ተቀናሽ የተደረገብትን መረጃ ይፈልጋሉ ? / do you need debt receipt</div>
    <div class="bvalue small"> አዎ / yes............... </div>
    <div class="bvalue small"> አያስፈልግም / No ...............</div>

</div>
<div class="row">
    <div class="name">የክፍያ መግለጫ / Payment Narrative</div>
    <div class="bvalue"> </div>
</div>
<div class="row">
    <div class="name sign">የአምልካች ፊርማ / /Applicant`s Signature .......................</div>
</div>

</div>




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