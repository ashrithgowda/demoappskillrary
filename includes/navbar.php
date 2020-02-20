<style>
.dropbtn {
  /*background-color: slategray;*/
  /*color: white;*/

  color: white !important;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 1620px;
  /*box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);*/
  /*z-index: 1;*/
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  /*text-decoration: none;*/
  /*display: block;*/
}

/*display box*/
.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

/*.dropdown:hover .dropbtn {background-color: #3e8e41;}*/

.wrappers {
   display: grid;
   grid-template-columns: repeat(7, 1fr);
   /*grid-template-rows: repeat(7, 100px);*/
}

</style>
<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="index.php" class="navbar-brand"><b>SkillRary</b>-ECommerce</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">HOME</a></li>
          <!-- <li><a href="aboutus.php">ABOUT US</a></li> -->
          <li>

            <!-- <a href="courses.php" id="courses">COURSE</a> -->

                <div class="dropdown">
                  <button class="dropbtn" style="background-color: slategray;color: white !important;" ><a href="index.php">COURSE</a></button>

                  <div class="dropdown-content" style="width:50%; margin-left:-480%;">
                     <span class="wrappers" >
                        <?php
                          $conn = $pdo->open();

                          $stmt = $conn->prepare("SELECT * FROM products");
                          $stmt->execute();
                          foreach($stmt as $row){
                            $slug = $row['slug'];
                            $productName = $row['name'];
                            echo "<a href='product.php?product=$slug'>$productName</a>";
                          }
                          $pdo->close();
                      ?>
                      </span>

                  </div>
                </div>
          </li>

          <li><a href="feedback.php">FEEDBACK</a></li>


          <!-- <li>
              <div class="dropdown">
                <button class="dropbtn" style="background-color: slategray;color: white !important;" ><a href="index.php">MY COURSE</a></button>

              <div class="dropdown-content" style="width:50%; margin-left:-480%;">
                  <span class="wrappers" >

                  <?php
                     // $conn = $pdo->open();

                      // if(isset($_SESSION['user'])){
                      //     try{
                      //          $stmt = $conn->prepare("SELECT p.name, p.slug,p.price FROM cart c join products p on c.product_id = p.id where user_id=:user_id ");
                      //          $stmt->execute(['user_id'=>$user['id']]);
                          
                      //           foreach($stmt as $row){
                      //             $slug = $row['slug'];
                      //             $productName = $row['name'];
                      //             echo "<a href='product.php?product=$slug'>$productName</a>";
                      //           }

                      //     }catch(PDOException $e){
                      //         $output['error'] = true;
                      //         $output['message'] = $e->getMessage();
                      //     }
                      // }else{
                      //       $output['error'] = true;
                      //       $output['message'] = 'No Course';
                      // }

                  ?>

                  </span>

                  </div>
                </div>
          </li> -->

          <!-- <li><a href="aboutus.php">ABOUT US</a></li> -->
          <!-- <li><a href="contactus.php">CONTACT US</a></li> -->
          <li><a href="">CATEGORY</a></li>

          <li>
              <select class="chosen-select" onchange="location = this.value;" name="addresstype" style="width: 150px; margin-top: 12px;">
                  <option value="" >Select category</option>
                <?php
 
                      $conn = $pdo->open();
                      try{
                        $stmt = $conn->prepare("SELECT * FROM category");
                        $stmt->execute();
                        foreach($stmt as $row){
                          echo "<option value='category.php?category=".$row['cat_slug']."'>".$row['name']."</li>
                          ";                  
                        }
                      }
                      catch(PDOException $e){
                        echo "There is some problem in connection: " . $e->getMessage();
                      }

                      $pdo->close();
                ?>
              </select>
          </li>

        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group">
              <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
              <span class="input-group-btn" id="searchBtn" style="display:none;">
                  <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
              </span>
          </div>
        </form>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-success cart_count"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span class="cart_count"></span> item(s) in cart</li>
              <li>
                <ul class="menu" id="cart_menu">
                </ul>
              </li>
              <li class="footer"><a href="cart_view.php">Go to Cart</a></li>
            </ul>
          </li>
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="'.$image.'" class="img-circle" alt="User Image">

                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                        <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'>LOGIN</a></li>
                <li><a href='signup.php'>SIGNUP</a></li>
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
