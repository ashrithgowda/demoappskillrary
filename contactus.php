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
 <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="message">Choose programming language</label><br>
                            <select multiple class="chosen-select" name="test" style="width: 250px;">
                                    <option value="">Select</option>
                                    <option value="react">React</option>
                                    <option value="angular">Angular</option>
                                    <option value="node">node</option>
                                    <option value="mongodb">mongodb</option>
                                    <option value="html">HTML</option>
                                    <option value="javascript">javaScript</option>
                                    <option value="java">Java</option>
                            </select>
                        </div>
                         
						<div class="form-group">
    						<input type="checkbox" id="subscribeNews" name="subscribe" value="newsletter">
    						<label for="subscribeNews">Subscribe to newsletter?</label>
                        </div>


                        <div class="mx-auto">
                        <button type="submit" class="btn btn-primary text-right">Submit</button></div>
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