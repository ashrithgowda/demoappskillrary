<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style type="text/css">
@media (min-width: 768px){
.modal-dialog {
    width: 800px;
    margin: 30px auto;
}
}
.modal-content{
	box-shadow: none !important;
	background: transparent;
}
.closeButtonn{
    position: absolute !important;
    right: 7px !important;
    top: 6px !important;
    background: black !important;
    opacity: 1 !important;
    color: white;
    padding: 3px 8px !important;
    border-radius: 24px !important;
}
.closeButtonn:hover{
	color: white;
}
.closeButtonn:focus{
	outline: none;
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
	        		<div id="message" style="background-color: green;height:32px; display:none"><button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span >Payment is successfully done</span></div>
					<h1 class="page-header">YOUR CART</h1>

	        		<div class="box box-solid">
	        			<div class="box-body">
		        		<table class="table table-bordered">
		        			<thead>
		        				<th></th>
		        				<th>Photo</th>
		        				<th>Name</th>
		        				<th>Price</th>
		        				<th width="20%">Quantity</th>
		        				<th>Subtotal</th>
		        			</thead>
		        			<tbody id="tbody">
		        			</tbody>
		        		</table>
	        			</div>
	        		</div>
	        		<?php
	        			if(isset($_SESSION['user'])){
	        				echo "
	        					<!-- <div id='paypal-button'></div>
	        					<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#bank'>Bank</button> -->
	        					<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#paytm'>checkout</button>
	        				";
	        			}
	        			else{
	        				echo "
	        					<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
	        				";
	        			}
	        		?>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
var total = 0;
$(function(){
	$(document).on('click', '.cart_delete', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'cart_delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.minus', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		if(qty>1){
			qty--;
		}
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.add', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		qty++;
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	getDetails();
	getTotal();

});

function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'cart_details.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
			getCart();
		}
	});
}

function getTotal(){
	$.ajax({
		type: 'POST',
		url: 'cart_total.php',
		dataType: 'json',
		success:function(response){
			total = response;
		}
	});
}
</script>
<!-- Paypal Express -->
<script>
paypal.Button.render({
    env: 'sandbox', // change for production if app is live,

	client: {
        sandbox:    'ASb1ZbVxG5ZFzCWLdYLi_d1-k5rmSjvBZhxP2etCxBKXaJHxPba13JJD_D3dTNriRbAv3Kp_72cgDvaZ',
        //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
    },

    commit: true, // Show a 'Pay Now' button

    style: {
    	color: 'gold',
    	size: 'small'
    },

    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                    	//total purchase
                        amount: { 
                        	total: total, 
                        	currency: 'USD' 
                        }
                    }
                ]
            }
        });
    },

    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
			window.location = 'sales.php?pay='+payment.id;
        });
    },

}, '#paypal-button');
</script>

<div class="container">
  <div class="modal fade" id="bank" role="dialog">
    <div class="modal-dialog dialogModal">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">bank</h4>
        </div>
     
        <iframe src="iframe_modal.php"  height="220" width="800" style="border:none;">
        	
        </iframe>

        <div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default paymentdone" data-dismiss="modal">Success</button>
        </div>
      </div>
      
    </div>
  </div>


<div class="container">
  <div class="modal fade" id="paytm" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <!-- <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">paytm</h4>
        </div> -->
         
          <button type="button" class="close closeButtonn" data-dismiss="modal">&times;</button>
 
		<iframe src="iframe_modal.php?user=<?php echo $_SESSION['user'];?>"  height="470" width="800" style="border:none; border-radius: 10px;">
		
        	
        </iframe>

        <!-- <div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default paymentdone" data-dismiss="modal">Success</button>
        </div> -->
      </div>
      
	</div>
  </div>


<script>
	$('.paymentdone').click(function () {

		$('#message').show();	 
		let url =window.location.pathname;
		window.open(url, '_blank', 'height=200,width=300');

	});

</script>
  
</div>
</body>
</html>