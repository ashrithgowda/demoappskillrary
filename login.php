<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
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


   <div class="card">
  
  <div class="container">
 <div id="headerContainer" class="header" style="color: black">Please identify yourself</div>
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
  <input type="text" name="email" placeholder="Email"  required ></div>  
   <div><input type="password" name="password" placeholder="Password"  required></div>
   <div><button type="submit" id="last" class="btn btn-success text-white" name="login">Login</button>
      <a href="index.php"><i class="fa fa-home"></i> Home</a>
   </div>
  </form>
  
  </div>
   <img src="srlogo.png">
 </div>

<?php include 'includes/scripts.php' ?>
</body>
</html>