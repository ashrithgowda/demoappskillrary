<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }
?>

  <style type="text/css">
.register{
    background: -webkit-linear-gradient(left, #33a477, #000000);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
  text-align: center;
  color: #fff;
  margin-top: 15%;
  font-size: 16px;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
    height: 400px;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 9% 9% 0 9%;
    margin-top: 10%;
    width: 100%;
}
.btnRegister{
    border: none;
    border-radius: 4px;
    padding: 8px 25px;
    background: #33A477;
    color: black;
    font-weight: 600;

}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #33A478;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 110px;
    color: #33A478;
    border: 2px solid #33A478;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.nav-tabs .nav-link.active{
  background: white;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: black;
}
/*.content{
      position: relative;
    left: 50%;
    transform: translate(-50%);
    top: -4%;
    width: 100%;
}*/
.controlForm{
    border: 1px solid #33A478;
    border-radius: 4px;
}
.controlForm:focus{
      box-shadow: inherit !important;
      border-color: black;
}
.checkboxLabel{
    font-size: 12px;
    line-height: 0px;
    top: -2px;
    position: relative;
}
.groupForm{
  margin-bottom: 0;
}
.Forgot{
    font-size: 14px;
    color: #33A478;
    font-weight: 600;
}
.Forgot:hover{
    color: #33A478;
    font-weight: 600;
}
.login_Btn{
  background: #33A477;
  border: 1px solid #33A477;
  padding: 5px 18px;
  border-radius: 5px;
}
.login-form{
  width: 50%;
  padding: 0%;
  margin: 20% 0% 0% 10%;
}
.registerDiv{
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  bottom: 9%;
}
#demoCredentials{
  color: white;
}
#forgetPasswordButton{
  background-color: #33A478 !important;
  border-color: #33A478 !important;
}
#loginPasswordPage{
  color: black;
    font-weight: 700;
    text-decoration: underline;
    font-size: 14px;
}
.main-footer{
  margin-left: 0;
}
/* tabs css  */
.loginTab{
  border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
    background: white;
}
.loginTab:hover{
  border-top-right-radius: 1.5rem !important;
    border-bottom-right-radius: 1.5rem !important;
    border-top-left-radius: 1.5rem !important;
    border-bottom-left-radius: 1.5rem !important;
    background: white !important;
}
.register .nav-tabs .nav-link {
    padding: 2%;
    height: 31px;
    font-weight: 600;
    color: black;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
    width: 105px;
}
.register .nav-tabs .nav-link.active {
    width: 110px;
    color: #33A478;
    border: 2px solid #33A478;
    border-top-left-radius: 1.5rem;
    height: 33px;
    border-bottom-left-radius: 1.5rem;
    
}
.nav-tabs.nav-justified>li {
    float: none;
    padding: 1%;
}
.membership a{
  color: #33A478;
  font-weight: 600;
}
@media (min-width: 768px){
.nav-tabs.nav-justified>li {
    display: table-cell;
    width: 1%;
}
.nav-tabs.nav-justified>li>a {
    border-bottom: initial;
    border-radius: initial;
}
}

</style>
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        
                          <div class="tooltip-content">
                            <table id="demoCredentials">
                            <tbody>
                            <tr>
                            <td rowspan="2" id="adminCredentialsHeader" class="admin"><b>Administrator: &nbsp;</b> </td>
                            <td>Username: <b>admin</b></td>
                            </tr>
                            <tr>
                            <td>Password: <b>admin</b></td>
                            </tr>
                            <tr><td style="color: transparent">content</td></tr>
                            <tr>
                            <td rowspan="2" id="userCredentialsHeader" class="admin"><b>Regular User:</b> </td>
                            <td id="userCredentialsUsername">Username: <b>user</b> </td>
                            </tr>
                            <tr>
                            <td>Password: <b>user</b></td>
                            </tr>
                            </tbody>
                            </table>
                          </div>

                     
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="btn-pref nav nav-tabs nav-justified" id="myTab" role="tablist">
                                <li class="nav-item nav-item-allcourse " onclick="loginTab()">
                                    <a id="loginClick" class="nav-link loginTab" data-toggle="tab" href="#login" aria-selected="true" onclick="loginTab()">Login</a>
                                </li>
                                <li class="nav-item nav-item-allcourse registerTab" onclick="registerTab()">
                                    <a id="registerClick" class="nav-link registerContent" data-toggle="tab" href="#register" aria-selected="false" onclick="registerTab()">Register</a>
                                </li>
                            </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class=" <?php if (!(isset($_GET['type'])) || ($_GET['type'] == "login")){ echo "tab-pane fade in  active";} else { echo "tab-pane fade in ";}?>" id="login" role="tabpanel">
                                <h3 class="register-heading">Login</h3>
                               
                                <div class="row login-form">
                                    <div class="col-md-9 col-md-offset-5">
                                    <div class="plainTextTooltip" style="display:none; font-size: 12px; color: black;" id="plainTextTooltip">Please enter email address or username below to get password reset instructions.</div>

                                    <form action="verify.php" method="POST">
                                        <div class="form-group">
                                        <?php
                                          if(isset($_SESSION['error'])){
                                            echo "
                                              <div class='callout callout-danger text-center' style='color:red'>
                                                <p>".$_SESSION['error']."</p> 
                                              </div>
                                            ";
                                            unset($_SESSION['error']);
                                          }
                                          if(isset($_SESSION['success'])){
                                            echo "
                                              <div class='callout callout-success text-center'>
                                                <p>".$_SESSION['success']."</p> 
                                              </div>
                                            ";
                                            unset($_SESSION['success']);
                                          }
                                        ?>
                                          <!-- <input type="email" class="form-control controlForm" placeholder="Email" value="" /> -->
                                          <input type="text" name="email" class="form-control controlForm" id="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                        <input type="password" name="password" class="form-control controlForm" id="password" placeholder="Password"  required>
                                        </div>
                                        <div class="form-group">
                                        <input type="text" name="forgetPasswordEmailOrUsername" class="form-control controlForm" id="forgetPasswordEmailOrUsername" style="display:none;" placeholder="Your Email or Username">
                                        </div>
                                        <div class="form-group groupForm">
                                          <input type="checkbox" id="keepLoggedInCheckBox" name="keepLoggedInCheckBox">
                                          <label id="keepLoggedInLabel" for="keepLoggedInLabel" class="checkboxLabel">Keep me logged in</label>
                                        </div>
                                        <div align="center">
                                          <!-- <a href="#" class="Forgot">Forgot your password</a> -->
                                          <a href="javascript: void(0)" class="Forgot" onclick="forgotPasswordRecover()" id="toPasswordRecoveryPageLink">Forgot your password?</a>
                                        </div><br/>
                                        <div align="center">
                                          <button type="submit" class="login_Btn" id="last" name="login">Login</button>
                                        </div>
                                        <div align="center">
                                          <button type="submit" style="margin-left: 0px; display:none;" id="forgetPasswordButton" class="btn btn-success text-white" name="forgetPasswordButton" onclick="confirm('password info has sent')">Request Login Info</button>
                                        </div><br/>
                                        <div align="center">
                                          <a href="javascript: void(0)" onclick="loginPasswordPage()" style="display:none;" id="loginPasswordPage">Return to login page</a>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class=" <?php if ((isset($_GET['type']) && $_GET['type'] == "register")){ echo "tab-pane fade in  active";} else { echo "tab-pane fade in ";}?>" id="register" role="tabpanel">
                            <?php
                            if(isset($_SESSION['error'])){
                              echo "
                                <div class='callout callout-danger text-center'>
                                  <p>".$_SESSION['error']."</p> 
                                </div>
                              ";
                              unset($_SESSION['error']);
                            }

                            if(isset($_SESSION['success'])){
                              echo "
                                <div class='callout callout-success text-center'>
                                  <p>".$_SESSION['success']."</p> 
                                </div>
                              ";
                              unset($_SESSION['success']);
                            }
                          ?>
                                <h3  class="register-heading">Register</h3>
                                <form action="register.php" method="POST">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control controlForm" name="firstname" placeholder="First Name" value="<?php (isset($_SESSION["firstname"])) ? $_SESSION["firstname"]: '' ?>" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="email" class="form-control controlForm" name="email" placeholder="Email" value="<?php (isset($_SESSION["email"])) ? $_SESSION["email"] : '' ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control controlForm" name="repassword" placeholder="Confirm Password" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                            <input type="text" class="form-control controlForm" name="lastname" placeholder="Last Name" value="<?php (isset($_SESSION["lastname"])) ? $_SESSION["lastname"] : '' ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control controlForm" placeholder="Password" name="password"  />
                                        </div>

                                    </div>
                                    <div class="registerDiv">
                                      
                                      <input type="submit" class="btnRegister" name="signup" value="Register"/>
                                    </div>
                                    
                                </div>
                                <div align="center" class="membership">
                                  <a href="login.php?type=login">I Already have a membership</a><br>
                                  <a href="index.php"><i class="fa fa-home"></i> Home</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div><br/>
            <?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php' ?>
<script type="text/javascript">

var type = "<?php if (isset($_GET['type'])) {echo $_GET['type'];} else {"login";}?>";
if (type=="login") {
document.getElementById("loginClick").click();
} else {
  document.getElementById("registerClick").click();
}
 function loginTab(){
  $(".loginTab").css("background-color","white");
   $(".loginTab").css("border-color","white");
 }
 function registerTab(){
   $(".registerTab").css("color","black");
   $(".loginTab").css("background-color","transparent");
   $(".loginTab").css("border-color","transparent");
 }
function forgotPasswordRecover (){
    document.getElementById("forgetPasswordEmailOrUsername").style.display = "block";
    document.getElementById("email").style.display = "none";
    document.getElementById("password").style.display = "none";
    document.getElementById("last").style.display = "none";
    document.getElementById("loginPasswordPage").style.display = "block";
    document.getElementById("keepLoggedInCheckBox").style.display = "none";
    document.getElementById("keepLoggedInLabel").style.display = "none";
    document.getElementById("toPasswordRecoveryPageLink").style.display = "none";

    document.getElementById("forgetPasswordButton").style.display = "block";
    document.getElementById("plainTextTooltip").style.display = "block";
    
  
}

function loginPasswordPage(){

    document.getElementById("forgetPasswordEmailOrUsername").style.display = "none";
    document.getElementById("email").style.display = "block";
    document.getElementById("password").style.display = "block";
    document.getElementById("last").style.display = "block";
    document.getElementById("loginPasswordPage").style.display = "none";
        
    document.getElementById("keepLoggedInCheckBox").style.display = "block";
    document.getElementById("keepLoggedInLabel").style.display = "block";
    document.getElementById("keepLoggedInLabel").style.top = "-5px";
    document.getElementById("keepLoggedInLabel").style.left = "20px";
    document.getElementById("toPasswordRecoveryPageLink").style.display = "block";
    document.getElementById("forgetPasswordButton").style.display = "none";
    document.getElementById("plainTextTooltip").style.display = "none";


}

</script>
</body>

