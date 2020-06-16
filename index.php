<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
.blogContainer{
	margin: 0;
	padding: 0;
}
.FromBlog{
	text-align: center;
	font-weight: 600;
	font-size: 28px;
}
.FromBlog:before{
	position: absolute;
    left: 0;
    top: 380px;
    /* bottom: 250px; */
    right: 0;
    height: 4px;
    width: 80px;
    background: #33A478;
    content: "";
    margin: 0 auto
}
.blogImg{
	width: 100%;
    height: 200px;
    border: 2px solid black;
}
.imgContent{
	list-style: none;
	margin: 0;
	padding: 0;
	display: inline-flex;
}
.imgContent li{ 
	font-size: 15px;
}
.imgContent li:nth-child(2){
	padding-left: 8px;
}
.divUlBlog{
	margin-bottom: 10px;
}
.blogPContentHead{
	font-size: 18px;
    font-weight: 900;
}
.blogPContent{
	color: #6f6f6f;
	font-size: 15px;
}
</style>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="images/banner1.png" alt="First slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/banner2.png" alt="Second slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/banner3.png" alt="Third slide">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
		            <h2>Monthly Top Sellers</h2>
					<div>
						<h3 class="FromBlog">From The Blog</h3>
					</div><br/>
					<div class="row">
						<div class="col-md-4">
							<img class="blogImg" src="https://www.skillrary.com/uploads/course/1229_small.jpg" ><br/><br/>
							<div class="divUlBlog">
							<ul class="imgContent">
								<li><i class="fa fa-calendar-o" aria-hidden="true"></i> May 31, 2020</li>
								<li><i class="fa fa-comment-o" aria-hidden="true"></i> 5</li>
							</ul>
							</div>
							<p class="blogPContentHead">Skillrary tips for learning simple</p>
							<p class="blogPContent">You will be mentored by leading industry experts throughout the course so that you can excel in the subject.</p>
						</div>
						<div class="col-md-4">
							<img class="blogImg" src="https://www.skillrary.com/uploads/course/1228_small.jpg" ><br/><br/>
							<div class="divUlBlog">
							<ul class="imgContent">
								<li><i class="fa fa-calendar-o" aria-hidden="true"></i> May 31, 2020</li>
								<li><i class="fa fa-comment-o" aria-hidden="true"></i> 5</li>
							</ul>
							</div>
							<p class="blogPContentHead">Skillrary tips for learning simple</p>
							<p class="blogPContent">You will be mentored by leading industry experts throughout the course so that you can excel in the subject.</p>
						</div>
						<div class="col-md-4">
							<img class="blogImg" src="https://www.skillrary.com/uploads/course/1227_small.jpg" ><br/><br/>
							<div class="divUlBlog">
							<ul class="imgContent">
								<li><i class="fa fa-calendar-o" aria-hidden="true"></i> May 31, 2020</li>
								<li><i class="fa fa-comment-o" aria-hidden="true"></i> 5</li>
							</ul>
							</div>
							<p class="blogPContentHead">Skillrary tips for learning simple</p>
							<p class="blogPContent">You will be mentored by leading industry experts throughout the course so that you can excel in the subject.</p>
						</div>
					</div>
						
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();
		       			//echo $month; die;
		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details
						    	LEFT JOIN sales ON sales.id=details.sales_id
						    	LEFT JOIN products ON products.id=details.product_id
						    	WHERE MONTH(sales_date) = '$month' GROUP BY details.id 
						    	ORDER BY total_qty DESC LIMIT 6 ");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>&#36; ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
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