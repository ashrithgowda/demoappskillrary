<?php include 'includes/session.php'; ?>
<?php
	$slug = $_GET['category'];

	$conn = $pdo->open();

	try{
		$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$cat = $stmt->fetch();
		$catid = $cat['id'];
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>
<?php include 'includes/header.php'; ?>

   <style>
       
        .shop {
            border-radius:6px;
            list-style-type:none;
            padding:0;
            margin:0;
        }
        .shop li{
            display: inline-table;
        }
        .cart {
            border: 4px solid #0066FF;
            border-radius:6px;
            min-height:128px;
            display:block;
            padding: 20px 10px;
        }
        .product {
            border:3px solid white;
        }
        .product:hover {
            border:3px solid red;
            cursor:move;
        }
        .itemchoosen {
            this.style.opacity = 0.5;
            this.style.border = "2px solid red";
        }
        .itemblurred {
            this.style.border = none;
        }
        #cartArea {
            position: relative;
            min-height: 200px;
            width: 100%;
            float: left;
        }
        #cartArea img {
            float: left;
            width: 20%;
            margin: 2%;
        }
        .itemPrice {
            width: 100%;
            float: left;
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
		            <h1 class="page-header"><?php echo $cat['name']; ?></h1>
		       		<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
						    $stmt->execute(['catid' => $catid]);
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
                                                <img src='".$image."' class='product' id='".$row['name']."' data-price='".$row['price']."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>INR ".number_format($row['price'], 2)."</b>
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
	        		<fieldset id="mycart" class="cart">
        <legend>My cart</legend>
        <div id="cartArea"></div>
    </fieldset>
    <fieldset id="mycart" class="cart">
        <legend>Total</legend>
        <p id="the_sub_total"></p>
        <p id="the_total">0</p>
    </fieldset>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>


<script>
        var cartArea = document.querySelector('#cartArea'); 
        var prods = document.querySelectorAll('.product');
        var itemPriceElement;
        for(var i = 0; i < prods.length; i++) {
            itemPriceElement = document.createElement("span");
            itemPriceElement.className = "itemPrice";
            itemPriceElement.innerHTML = prods[i].getAttribute("data-price");
            prods[i].parentNode.insertBefore(itemPriceElement, prods[i].nextSibling);
            prods[i].setAttribute('draggable', 'true');  // optional with images
            prods[i].addEventListener('dragstart', function(evnt) {
                //this.className = 'itemchoosen';
                this.classList.add('itemchoosen');
                evnt.dataTransfer.effectAllowed = 'copy';
                evnt.dataTransfer.setData('text', this.id);
                return false;  
            }, false);
        }   
        cartArea.addEventListener('dragover', function(evnt) {
            if (evnt.preventDefault) evnt.preventDefault();
            evnt.dataTransfer.dropEffect = 'copy';
            return false;   
        }, false);
        cartArea.addEventListener('dragenter', function(evnt) {
            return false;   
        }, false);
        cartArea.addEventListener('dragleave', function(evnt) {
            return false;
        }, false);
        cartArea.addEventListener('drop', function(evnt) {
            if (evnt.stopPropagation) evnt.stopPropagation();
            var id = evnt.dataTransfer.getData('text');     
            var theitem = document.getElementById(id); 
            //theitem.parentNode.removeChild(el);   
            //theitem.className='itemblurred';
            theitem.classList.add('itemblurred');
            var y  = document.createElement('img');
            y.src = theitem.src;
            cartArea.appendChild(y);
            evnt.preventDefault(); // for Firefox
            updateCart(theitem.getAttribute("data-price"));
            return false;
        }, false);
        function updateCart(price){
            var the_total = document.getElementById("the_total").innerHTML;
            the_total = parseInt(the_total);
            the_total = the_total + parseInt(price);
            document.getElementById("the_total").innerHTML = the_total;
        }
    </script>

</body>
</html>