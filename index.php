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
	border-bottom: 2px solid #33A478;
    width: 22%;
    left: 50%;
    position: relative;
    line-height: 1.5;
    transform: translate(-50%);
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
.Limage{
	margin-bottom: 20px;
    width: 100%;
    height: 115px;
}
.carouselHeadings{
	width: 250px;
	font-size: 22px;
}
.carouselIndicators{
	position: relative;
    float: right;
    margin-top: -15px;
	left: -40px;
}

.latestLeftIcon, .latestRightIcon{
	background: black;
    padding-left: 10px;
    padding-right: 10px;
    font-size: 28px !important;
}
.LimageContent{
	margin-top: 15px;
}
.heading{
	font-size: 18px;
}
.cost{
	font-size: 17px;
    font-weight: bold;
}

/* feature css  */

.courses_controls {
	text-align: center;
	margin-bottom: 50px;
}

.courses_controls ul li {
	list-style: none;
	font-size: 18px;
	color: #1c1c1c;
	display: inline-block;
    margin-right: 90px;
	position: relative;
	cursor: pointer;
}

.courses_controls ul li.active:after {
	opacity: 1;
}

.courses_controls ul li:after {
	position: absolute;
	left: 0;
	bottom: -2px;
	width: 100%;
	height: 3px;
	background: #33A478;
	content: "";
	opacity: 0;
}

.courses_controls ul li:last-child {
	margin-right: 0;
}

.courses_item {
	margin-bottom: 50px;
}

.courses_item:hover .courses_item_pic .courses_item_pic_hover {
	bottom: 20px;
}

.courses_item_pic {
	height: 200px;
	position: relative;
	overflow: hidden;
	background-position: center center;
}

.courses_item_pic_hover {
	position: absolute;
	left: 0;
	bottom: -50px;
	width: 100%;
	padding: 0;
	text-align: center;
	-webkit-transition: all, 0.5s;
	-moz-transition: all, 0.5s;
	-ms-transition: all, 0.5s;
	-o-transition: all, 0.5s;
	transition: all, 0.5s;
}

.courses_item_pic_hover li {
	list-style: none;
	display: inline-block;
	margin-right: 6px;
}

.courses_item_pic_hover li:last-child {
	margin-right: 0;
}

.courses_item_pic_hover li:hover a {
	background: black;
	border-color: black;
}

.courses_item_pic_hover li:hover a i {
	color: #ffffff;
	transform: rotate(360deg);
}

.courses_item_pic_hover li a {
	font-size: 16px;
	color: #1c1c1c;
	height: 40px;
	width: 40px;
	line-height: 40px;
	text-align: center;
	border: 1px solid #ebebeb;
	background: #ffffff;
	display: block;
	border-radius: 50%;
	-webkit-transition: all, 0.5s;
	-moz-transition: all, 0.5s;
	-ms-transition: all, 0.5s;
	-o-transition: all, 0.5s;
	transition: all, 0.5s;
}

.courses_item_pic_hover li a i {
	position: relative;
	transform: rotate(0);
	-webkit-transition: all, 0.3s;
	-moz-transition: all, 0.3s;
	-ms-transition: all, 0.3s;
	-o-transition: all, 0.3s;
	transition: all, 0.3s;
}

.courses_item_text {
	text-align: center;
	padding-top: 15px;
}

.courses_item_text h6 {
	margin-bottom: 10px;
}

.courses_item_text h6 a {
	color: #252525;
	font-size: 16px;
}

.courses_item_text h5 {
	color: #252525;
	font-weight: 700;
}
@media (min-width: 992px){
	#navbar-search-input:focus{
		width: 150px !important;
	}
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
				<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
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

						<!-- featured products starts here  -->

						<div>
							<div class="row">
								<div class="col-lg-12">
									<div class="section-title">
										<h2 style="text-align: center;">Featured Product</h2>
									</div>
									<div class="courses_controls">
										<ul>
											<li class="active" data-filter="*">All</li>
											<li data-filter=".latest">Latest</li>
											<li data-filter=".mostviewed">Most Viewed</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="row courses_filter">
								<div class="col-lg-4 col-md-4 col-sm-6 mix all">
									<div class="courses_item">
										<div class="courses_item_pic set-bg" data-setbg="https://www.skillrary.com/uploads/course/1229_small.jpg">
											<ul class="courses_item_pic_hover">
												<li><a href="#"><i class="fa fa-heart"></i></a></li>
												<li><a href="#"><i class="fa fa-retweet"></i></a></li>
												<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
											</ul>
										</div>
										<div class="courses_item_text">
											<h6><a href="#">Selenium Using Java</a></h6>
											<h5>$30.00</h5>
										</div>
									</div>
								</div>
						
								<div class="col-lg-4 col-md-4 col-sm-6 mix latest">
									<div class="courses_item">
										<div class="courses_item_pic set-bg" data-setbg="https://www.skillrary.com/uploads/course/1228_small.jpg">
											<ul class="courses_item_pic_hover">
												<li><a href="#"><i class="fa fa-heart"></i></a></i>
												<li><a href="#"><i class="fa fa-retweet"></i></a></i>
												<li><a href="#"><i class="fa fa-shopping-cart"></i></a></i>
											</ul>
										</div>
										<div class="courses_item_text">
											<h6><a href="#">Apache</a></h6>
											<h5>$70.00</h5>
										</div>
									</div>
								</div>
							
								<div class="col-lg-4 col-md-4 col-sm-6 mix mostviewed">
									<div class="courses_item">
										<div class="courses_item_pic set-bg" data-setbg="https://www.skillrary.com/uploads/course/1227_small.jpg">
											<ul class="courses_item_pic_hover">
												<li><a href="#"><i class="fa fa-heart"></i></a></i>
												<li><a href="#"><i class="fa fa-retweet"></i></a></i>
												<li><a href="#"><i class="fa fa-shopping-cart"></i></a></i>
											</ul>
										</div>
										<div class="courses_item_text">
											<h6><a href="#">Core Java</a></h6>
											<h5>$70.00</h5>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-6 mix latest">
									<div class="courses_item">
										<div class="courses_item_pic set-bg" data-setbg="https://www.skillrary.com/uploads/course/1223_small.jpg">
											<ul class="courses_item_pic_hover">
												<li><a href="#"><i class="fa fa-heart"></i></a></i>
												<li><a href="#"><i class="fa fa-retweet"></i></a></i>
												<li><a href="#"><i class="fa fa-shopping-cart"></i></a></i>
											</ul>
										</div>
										<div class="courses_item_text">
											<h6><a href="#">Manual Tesing</a></h6>
											<h5>$70.00</h5>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-6 mix mostviewed">
									<div class="courses_item">
										<div class="courses_item_pic set-bg" data-setbg="https://www.skillrary.com/uploads/course/1231_small.png">
											<ul class="courses_item_pic_hover">
												<li><a href="#"><i class="fa fa-heart"></i></a></i>
												<li><a href="#"><i class="fa fa-retweet"></i></a></i>
												<li><a href="#"><i class="fa fa-shopping-cart"></i></a></i>
											</ul>
										</div>
										<div class="courses_item_text">
											<h6><a href="#">JMeter</a></h6>
											<h5>$70.00</h5>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- featured products ends here  -->

						<!-- double carousel starts -->

					<div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<h3 class="carouselHeadings">Latest Courses</h3>
								<a class="left carousel-control carouselIndicators" href="#carousel-latest" data-slide="prev">
									<span class="fa fa-angle-left latestLeftIcon"></span>
								</a>
								<a class="right carousel-control carouselIndicators" href="#carousel-latest" data-slide="next">
									<span class="fa fa-angle-right latestRightIcon"></span>
								</a>
								<div id="carousel-latest" class="carousel slide" data-ride="carousel" data-interval="3000">
									<div class="carousel-inner">
									<div class="item active">
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner1.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner2.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner3.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
									</div>
									<div class="item">
									<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner1.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner2.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner3.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
									</div>
									<div class="item">
									<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner1.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner2.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner3.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
									</div>
									</div>
									
								</div>
							</div>

							<div class="col-md-6 col-sm-6">
								<h3>Review Products</h3>
								<a class="left carousel-control carouselIndicators" href="#carousel-review" data-slide="prev">
									<span class="fa fa-angle-left latestLeftIcon"></span>
								</a>
								<a class="right carousel-control carouselIndicators" href="#carousel-review" data-slide="next">
									<span class="fa fa-angle-right latestRightIcon"></span>
								</a>
								<div id="carousel-review" class="carousel slide" data-ride="carousel" data-interval="3000">
									<div class="carousel-inner">
									<div class="item active">
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner1.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner2.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner3.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
									</div>
									<div class="item">
									<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner1.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner2.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner3.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
									</div>
									<div class="item">
									<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner1.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner2.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<img class="Limage" src="images/banner3.png" alt="First slide">
											</div>
											<div class="col-md-6 LimageContent">
												<p class="heading">Crab pool security</p>
												<p class="cost">$30.00</p>
											</div>
										</div>
									</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>

						<!-- double carousel ends  -->

						<!-- Blog starts here -->

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
						
						<!-- Blog ends here -->

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
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>

(function ($) {

$(window).on('load', function () {
	$(".loader").fadeOut();
	$("#preloder").delay(200).fadeOut("slow");

	$('.courses_controls li').on('click', function () {
		$('.courses_controls li').removeClass('active');
		$(this).addClass('active');
	});
	if ($('.courses_filter').length > 0) {
		var containerEl = document.querySelector('.courses_filter');
		var mixer = mixitup(containerEl);
	}
});

$('.set-bg').each(function () {
	var bg = $(this).data('setbg');
	$(this).css('background-image', 'url(' + bg + ')');
});


})(jQuery);

</script>
</body>
</html>