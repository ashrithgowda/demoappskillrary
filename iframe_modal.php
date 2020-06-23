
	<!-- <div class="form-group">
			<label for="firstname">Firstname</label>
  			<input type="text" class="form-control" id="firstname" name="firstname" value="" required>
	</div><br>

  <div class="form-group">
      <label for="lastname">Lastname</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="" required>
  </div><br>


  <div class="form-group">
      <label for="cardnumber">card number</label>
        <input type="number" class="form-control" id="cardnumber" name="cardnumber" required>
  </div><br>



  <div class="form-group">
      <label for="cvvnumber">cvv number</label>
        <input type="text" class="form-control" id="cvvnumber" name="cvvnumber" value="" required>
  </div> -->

<?php include 'includes/header.php'; 
require_once("phpqrcode/qrlib.php");
$user=$_GET['user'];
// Path where the images will be saved
$filepath = 'images/myimage.png';
// Image (logo) to be drawn
$logopath = 'https://skillrary.com/uploads/images/fav-sr-64x64-logo.png';
// qr code content
$transactionId = rand();
$codeContents = "Transaction Id : ".$transactionId;
// Create the file in the providen path
// Customize how you want
QRcode::png($codeContents,$filepath , QR_ECLEVEL_H, 20);

// Start DRAWING LOGO IN QRCODE

$QR = imagecreatefrompng($filepath);

// START TO DRAW THE IMAGE ON THE QR CODE
$logo = imagecreatefromstring(file_get_contents($logopath));
$QR_width = imagesx($QR);
$QR_height = imagesy($QR);

$logo_width = imagesx($logo);
$logo_height = imagesy($logo);

// Scale logo to fit in the QR Code
$logo_qr_width = $QR_width/3;
$scale = $logo_width/$logo_qr_width;
$logo_qr_height = $logo_height/$scale;

imagecopyresampled($QR, $logo, $QR_width/3, $QR_height/3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

// Save QR code again, but with logo on it
imagepng($QR,$filepath);
 ?>
<style type="text/css">
.paytmContentUl{
  margin: 16px;
  padding: 0;
  list-style: decimal;
}
.paytmContentUl li{
  font-size: 15px;
  line-height: 3;
  color: black;
}
.loginText{
  font-size: 20px;
  font-weight: 800;
  color: #33A478;
}
.paytm-left{
  margin: 4% 0 0 0;
}
.playCircle{
  color: #33A478;
}
.apple-android-icons{
  margin: 5%;
  padding: 0;
}
.aalisticons{
  margin-top: -20px;
}
.aalisticons ul{
  list-style: none;
}
.aalisticons ul li{
  display: inline-block;
  margin: 3%;
}
.someContainer{
  display: flex;
}
.leftContainer{
  background: #f8f9fc;
  height: 450px;
  width: 400px;
}
.rightContainer{
  background: white;
  height: 450px;
  width: 400px;
}
.qrimage{
  width: 100%;
}
.scanQR{
  text-align: center;
  font-size: 16px;
  font-weight: 600;
}
.lineBottom{
  background: #33A478;
  height: 10px;
  width: 100%;
}
.lineBottom1{
  background: black;
  height: 10px;
  width: 100%;
}
.croossIcon{
  float: right;
  margin-right: 10px;
  margin-top: 10px;
  font-size: 25px;
}
.paymentButton{
  background: #33A478;
  color: white;
  font-size: 18px;
  padding: 4px 15px;
  margin-top: 27px;
  border: 1px solid #33A478;
  margin-left: 15px;
}
.paymentButton:hover{
  background: black;
  color: white;
  font-size: 18px;
  padding: 4px 15px;
  margin-top: 27px;
  border: 1px solid black;
  margin-left: 15px;
}
</style>
<body>

<div class="someContainer">
  <div class="leftContainer">
    <div style="margin: 45px 30px;">
      <h3 class="loginText">To Make Payment</h3>
      <ul class="paytmContentUl">
        <li>Open QR Code Scanner</li>
        <li>Tap Scan <i class="fa fa-qrcode" aria-hidden="true"></i> &nbsp;option available at the bottom</li>
        <li>Point QR Scanner at QR Code to make payment</li>
      </ul>
      <!-- <p style="font-size: 15px;color: #33A478;font-weight:bold"><i class="fa fa-play-circle playCircle" aria-hidden="true"></i> &nbsp;Watch Video</p> -->

      <div style="float:left">
        <label style="color: #33A478;font-size: 16px;">Transaction Id: </label><br/><input type="number" class="form-control" name="pay" id="pay"/>
      </div>
      <div>
        <button onclick="closeframe()" class="paymentButton">Payment</button>
      </div>

    </div>
      <div class="aalisticons">
        <ul class="apple-android-icons">
          <h4 class="learn-heading" style="text-align: center;">LEARN ON THE GO!</h4>
          <li><a href="https://bit.ly/skillraryios" target="_blank"><img src="https://www.skillrary.com/assets/skillrary/images/app-apple.png"/></a></li>
          <li><a href="https://bit.ly/skillraryandroid" target="_blank"><img src="https://www.skillrary.com/assets/skillrary/images/app-android.png"/></a></li>
        </ul>
      </div>
  </div>
  <div class="rightContainer">
    <!-- <i class="fa fa-times-circle croossIcon" aria-hidden="true"></i> -->
    <img src="<?php echo $filepath;?>" class="qrimage"/>
    <p class="scanQR">Scan QR Code with QR Code Scanner</p>
  </div>

</div>
<div class="lineBottom"></div>
<div class="lineBottom1"></div>
</body>

<script>
  function closeframe() {
    var pay = document.getElementById("pay").value;

    if (pay.length > 0 ) {
      if (pay > 0) {
        var transaction = "<?php echo $transactionId;?>";
        if (pay == transaction) {
          window.parent.location.href="sales.php?pay="+transaction;  
        } else {
          alert('Invalid Transaction Id');
        }
        
      } else {
        alert('Invalid Transaction Id');
      }
    } else {
      alert('Please Provide Transaction Id to complete payment');
    }
    //window.parent.document.getElementById('closeFrame').click(); 
    
  }
</script>