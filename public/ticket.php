<?php
include 'includes/check.php';

$_SESSION['emptyOrder'] = "<div class='error_msg'>Empty order! You must choose at least one item for you to be able to place an order.</div>";

if(isset($_POST['userAction']) && !empty($_SESSION['shoppingCart'])) {
		
		if($_POST['userAction'] == "OPlaced") {

				$orderNo = genhash(7);
				$buyerUserId = $_SESSION['userid'];
				$delivCost = $_POST['deliveryCost'];

				foreach($_SESSION['shoppingCart'] as $item =>$value) {

					$proId = $value['itemId'];
					$proVal = intval($value['pdval'])? $value['pdval'] : 0;
					$proQnty = $value['pdQty'];
					$unitPrice = $value['uPrice'];
					$pAmount = filter_var($unitPrice, FILTER_SANITIZE_NUMBER_INT);
					$inputData->placeOrder($orderNo, $delivCost, $proId, $proVal, $proQnty, $pAmount, $buyerUserId);
				}

				echo '<div class="order-wrapper">
						<span class="ticket-number">TICKET DETAILS.</span> <label class="save">SAVE <i class="fas fa-print"></i></label>
						<div class="order-placed"> 

						You have successfully placed your order &nbsp;<i class="fas fa-check"></i> <br /> <br /> Please write down or save your ticket number for reference purposes. <br />If you refresh this page, the information below will go away. <br /> You can access your order ticket number from  profile <i class="fas fa-chevron-right right"></i> products.
				<br />
				<br />
				Your order ticket number is<span>'.'LR-'.strtoupper($orderNo).'</span> 
				<br />
				<br />
				Total product cost to deposit into Longrich: <b>'.$_POST['itemCost'].'</b>
				<br />
				Delivery cost to deposit into Gtriune\'s account : <b><span class="fa-naira">'.number_format($delivCost).'</span>
				<br />

				<label class="location">Delivery Location:</label> Awka, Abia State.

				<br />
				<br />


<div class="order-details ticket">
	<div class="account g-account">
		<div>Account Name: <span>Longliqi Intl Nig Ltd.</span></div>
		<div>Bank Name: <span>Zenith Bank Nig.</span></div>
		<div>Bank Account No.: <span>1012908177.</span></div>
		<br />
	</div>
	<div class="account g-account">
		<div>Account Name: <span>G-TRIUNE NIG ENTERPRISE</span></div>
		<div>Bank Name: <span>Guaranty Trust Bank (GT. Bank)</span></div>
		<div>Bank Account No.: <span>0052874568.</span></div>
		<br />
	</div>
</div>



					<div class="payment-reminder">
						Please pay the total deposit amount into the Bank account provided for us to ship your ordered product(s). For any inquiry, call the number below or visit our Office.
					</div>

					 <br />
					 <br />

				<i class="fas fa-phone"></i> &nbsp; 
				09068123707 (MTN), <br /> 
				&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 08023500959 (AIRTEL)

					  </div> 
						  	<br />
							 <a href="forum">Forum <i class="fab fa-flipboard"></i></a>

							 &nbsp; &nbsp;
							  <a href="https://longrichs.com/help">Help <i class="far fa-question-circle"></i></a>

					  </div>';

				unset($_SESSION['shoppingCart']);
		}
		
	} else {
		echo $_SESSION['emptyOrder'];
	}
?>

<script>
	$('#checkout label.save').on('click', 
		()=> print() 
	);
</script>