<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }
?>


<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="designCard.css">

</head>
<body>


   <div class="card" style="background-color: #f7f7f7;">
  
  <div class="container">

 <div id="headerContainer" class="header" style="color: black">Please identify yourself</div>
 <!-- <span>Please enter email address or username below to get password reset instructions.</span> -->


 <div class="plainTextTooltip" style="display:none; font-size: 12px; color: #D2B48C;" id="plainTextTooltip">Please enter email address or username below to get password reset instructions.</div>
   <button type="button" class="btn1"  data-placement="bottom" title="Tooltip on bottom">


  
  <div class="tooltip-content">
  
  <table id="demoCredentials">
  <tbody>
  <tr>
  <td rowspan="2" id="adminCredentialsHeader" class="admin">Administrator:</td>
  <td>Username: <b>admin</b></td>
  </tr>
  <tr>
  <td>Password: <b>admin</b></td>
  </tr>
 
 <tr>
  <td rowspan="2" id="userCredentialsHeader" class="admin">Regular User:</td>
  <td id="userCredentialsUsername">Username: <b>user</b> </td>
  </tr>
  <tr>
  <td>Password: <b>user</b></td>
  </tr>
  </tbody>
  </table>
  </div>
  
   
</button>
  <div>
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
<form action="verify.php" method="POST">
    <input type="text" name="email" id="email" placeholder="Email"  required ></div>  
    <div><input type="password" name="password" id="password" placeholder="Password"  required></div>


    <input type="text" name="forgetPasswordEmailOrUsername"  id="forgetPasswordEmailOrUsername" style="display:none;" placeholder="Your Email or Username">
    <div>

        <span style="margin-left: -100px;"> 
            <input type="checkbox" id="keepLoggedInCheckBox" name="keepLoggedInCheckBox">
        </span>
        <span style="margin-left: -98px;  font-size: 12px;">
            <label id="keepLoggedInLabel" for="keepLoggedInLabel">Keep me logged in</label>
        </span>

        <span style="">
          <p>

            <a href="javascript: void(0)" onclick="forgotPasswordRecover()" id="toPasswordRecoveryPageLink">Forgot your password?</a>
                       <br>

            <!-- <a href="index.php"><i class="fa fa-home"></i> Home</a> -->
            <button type="submit" style="margin-left: 0px;" id="last" class="btn btn-success text-white" name="login">Login</button>
          

            <button type="submit" style="margin-left: 0px; display:none;" id="forgetPasswordButton" class="btn btn-success text-white" name="forgetPasswordButton" onclick="confirm('password info has sent')">Request Login Info</button>

            <a href="javascript: void(0)" onclick="loginPasswordPage()" style="display:none;" id="loginPasswordPage">Return to login page</a>

          </p>
        </span>



   </div>

<span><nobr style="margin-left: -205px; color:#33a478;">SkillRary 2020 Online</nobr></span>

  </form>
  
  </div>
   <img src="srlogo.png">
 </div>

<?php include 'includes/scripts.php' ?>


<script type="text/javascript">
  
function forgotPasswordRecover (){
    document.getElementById("forgetPasswordEmailOrUsername").style.display = "block";
    document.getElementById("email").style.display = "none";


    document.getElementById("forgetPasswordButton").style.display = "block";
    document.getElementById("plainTextTooltip").style.display = "block";

    document.getElementById("last").style.display = "none";
    document.getElementById("keepLoggedInCheckBox").style.display = "none";
    document.getElementById("keepLoggedInLabel").style.display = "none";

    document.getElementById("loginPasswordPage").style.display = "block";


    document.getElementById("password").style.display = "none";
        document.getElementById("toPasswordRecoveryPageLink").style.display = "none";

      // alert('jjjjjjjjjj');
}

function loginPasswordPage(){

    document.getElementById("forgetPasswordEmailOrUsername").style.display = "none";
    document.getElementById("email").style.display = "block";


    document.getElementById("forgetPasswordButton").style.display = "none";
    document.getElementById("plainTextTooltip").style.display = "none";
    document.getElementById("loginPasswordPage").style.display = "none";

    document.getElementById("last").style.display = "block";
    document.getElementById("keepLoggedInCheckBox").style.display = "block";
    document.getElementById("keepLoggedInLabel").style.display = "block";



    document.getElementById("password").style.display = "block";
        document.getElementById("toPasswordRecoveryPageLink").style.display = "block";

}


</script>
</body>
</html>