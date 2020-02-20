<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
 						<form method="POST" action="profile_edit.php" enctype="multipart/form-data">

  							<div class="form-group">
                    			<label for="firstname">Firstname</label>
                      			<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                			</div>

			                <div class="form-group">
			                    <label for="lastname">Lastname</label>
			                      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
			                </div>

			                <div class="form-group">
			                    <label for="email">Email</label>
			                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
			                </div>


			   				<div class="form-group">
			                    <label for="password">Password</label>
			                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
			                </div>

			                <div class="form-group">
			                    <label for="contact">Contact Info</label>
			                      <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $user['contact_info']; ?>">
			                </div>

  							<div class="form-group">
                    			<label for="addresstype" style="width:150px;" >Address Type</label>
			                    <select class="chosen-select" name="addresstype" style="width: 250px;">
			                        <option value="" >Select</option>
			                        <option value="home" <?php if($user['addresstype'] == 'home') echo 'selected';?> >Home</option>
			                        <option value="office" <?php if($user['addresstype'] == 'office') echo 'selected';?> >Office</option>
			                    </select>
			                </div>

							<div class="form-group">
                  			    <label for="address">Address</label>
                            	<textarea class="form-control" id="address" name="address"><?php echo $user['address']; ?></textarea>
                			</div>

  							<div class="form-group">
			                    <label for="gender" style="margin-top: -6px;">Gender</label>
			                    <input type="radio" name="gender" value="male" id="male" <?php if($user['gender'] == 'male') echo 'checked';?> > Male &nbsp;
			                    <input type="radio" name="gender" value="female" id="female" <?php if($user['gender'] == 'female') echo 'checked';?>> Female &nbsp;
			                    <input type="radio" name="gender" value="unknown" id="unknown" <?php if($user['gender'] == 'unknown') echo 'checked';?>> Unknown 
			                </div>

						 	<div class="form-group">
						        <label for="photo" >Photo</label>
                                <input type="file" id="photo" name="photo">
						    </div>
						    <hr>

						    <div class="form-group">
			                    <label for="birthday">Date of birth</label>
			                    <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Date of birth" value="<?php echo $user['birthday']; ?>">
			                </div>

							<div class="form-group">
			                    <label for="curr_password">Current Password</label>
			                    <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
			                </div>

                        <div class="mx-auto">

                        <button type="submit" class="btn btn-success text-right" name="edit">Update</button></div>
                    </form>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

<script type="text/javascript">
    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
</script>
</body>
</html>