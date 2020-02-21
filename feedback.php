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

<a href="images/dummy_pdf_invoice.pdf" download>
  <input type="button" class="btn btn-primary btn-block btn-flat btn btn-success" name="downloadInvoice" value="Download Invoice" ><br><br>
</a>


<input type="button" class="btn btn-primary btn-block btn-flat btn btn-success" name="refund" value="Refund" disabled="disabled">



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
</body>
</html>