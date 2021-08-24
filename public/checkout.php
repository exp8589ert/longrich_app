<?php
require 'includes/check.php';

if(empty($_SESSION['shoppingCart'])) { header('location: products'); }	
		if (isset($_COOKIE['c_user'])) {
			$sessionData = $showDATA->getSessionData($_COOKIE['c_user']);

			if($_COOKIE['c_user'] === $sessionData['session_cookie']) {
				$userid = $_SESSION['userid'];
				$email = $_SESSION['email'];
				$userStatus = $_SESSION['status'];
				$newSessId = $sessionData['session_id'];
				$loggedIn = $sessionData['session_token'];
				$loggedBool = $_SESSION['logged_in_token'];
				$newCookie = $_SESSION['new_sess_cookie'];

				if($newSessId != session_id() && $newCookie != $_COOKIE['c_user'] || empty($loggedIn) || $loggedBool != TRUE) {
					header('location: login');
				} 
				else {
					$userCred = $showDATA->acc_prof_ref_Table($email);
					$famname = $userCred['family_name'][0];
					$shipAddress = decFunc($userCred['shipping_address'], $enckey);
					$puserCode = $userCred['user_code'];
					$state = decFunc($userCred['state'], $enckey);
					$city = decFunc($userCred['city'], $enckey);	
					}
			}
			else {
				header('location: login');
			}
		}
		else {
			header('location: login');
		}
include 'header.php';
?>

<div id="menu-wrapper" class="checkout">

<form method="POST" id="checkout-form" action="checkout">
<section id="checkout" class="unique-section">
<label class="heading">SELECTED PRODUCT LIST&nbsp; 
<i class="fas fa-clipboard-list"></i>
</label>

<table> 
	<tr>
		<th width="3.5%">Image</th>
		<th width="15%">Name</th>
		<th width="5%">PV</th>
		<th width="5%">Quantity</th>
		<th width="5%">Unit Price</th>
		<th width="8%">Total</th>
	</tr> 

<?php 

if(!empty($_SESSION['shoppingCart'])) {

foreach($_SESSION['shoppingCart'] as $keys => $items) {

	$pdIdty = $items['itemId'];
	$pImg = $items['pdImg'];
	$pName = $items['pdName'];
	$pPdval = intval($items['pdval'])? $items['pdval'] : 0;
	$pQnty = $items['pdQty'];
	$puPrc = $items['uPrice'];
	$unitPrice = filter_var($puPrc, FILTER_SANITIZE_NUMBER_INT);

?>

<tr> 
	<td><img src="<?php echo $pImg; ?>" /></td>
	<td><?php echo $pName; ?></td>
	<td><?php echo $pPdval; ?></td>
	<input type="hidden" value="<?php echo $pdIdty;  ?>" >
	<td><?php echo $pQnty; ?></td>
	<td><?php echo number_format($puPrc); ?></td>
	<td><?php 
		$itemsXpV = $pPdval * $pQnty; 
		$itemQprice = $unitPrice * $pQnty; 
		echo number_format($itemQprice); 
	?>
	</td>
</tr>

<?php  
	$totalPdV += $itemsXpV;
	$totalQty += $pQnty;
	$priceSum += $itemQprice;
	$cartSumTotal = $totalQty;
}
}

?> 

<tr class="action-btn total-row">
	<td colspan="2" class="action-btn" align=left>
		<label class="action-btn">Total</label>
	</td>
	<td colspan="" class="action-btn">
	<label class="action-btn">
		<?php if(!empty($_SESSION['shoppingCart'])) { echo $totalPdV.' pv'; } ?>
	</label>
	</td>
	<td colspan="" class="action-btn">
	<label class="action-btn">
		<?php if(!empty($_SESSION['shoppingCart'])) { echo $totalQty; } ?></label>
	</td>
	<td class="action-btn"></td>
	<td class="action-btn">
	<label class="action-btn total-amount">
		<?php if(!empty($_SESSION['shoppingCart'])) { 
			echo "<label class='fa-naira'> ".number_format($priceSum)."</label>"; } 
		?>
	</label> 
	</td>
</tr>

<tr>
	<td colspan="3"><i class="fas fa-truck"></i>&nbsp;</td>
	<td colspan="2">Delivery Cost:</td>
	<td><label class="shpRate"> </label></td>
</tr>
</table>

<div class="amount-to-pay">Total product cost to pay into Longrich's account: &nbsp;
<label class="">
	<?php if(!empty($_SESSION['shoppingCart'])) { 
			echo "<label class='fa-naira'> ".number_format($priceSum)."</label>"; 
		} 
	?>
</label></div>


<div class="user-address">
<div class="reminder"> Thank you 
	<?php echo $famname ?> 
	for selecting these products. This is to inform you that after you make payment for these items, you'll be notified to pick up your products when the items arrive at the address you provided. 
	<br />
	<br />
	If you want to come to our office for collection of items, pay only the cost for these products. 
	<br />
	<br />
	But if you want our company to ship these items to your location, please select your state and pay the delivery cost into Gtriune's account. If not pay only the amount for items selected.
	<br />
	<br />

	<div class="amount-to-pay gtriune">Delivery cost to be paid into G-triune's account: &nbsp; <label class="delivery-cost"></label></div>

	<div class="office-account">
		Account Name:<span>G-TRIUNE NIG ENTERPRISE</span>
		<br />	Bank Name:  <span>Guaranty Trust Bank (GT. Bank).</span>
		<br />	Bank Account No.:  <span>0052874568.</span>
	</div>

<div class="address">
	Delivery location: <i class="fas fa-truck"></i>&nbsp; <br />
	<?php echo $shipAddress.', '.$city.', '.$state.' State'; ?>
</div>
</div>

<div class="order-details">
	<div class="account">
		Account Name: <span>Longliqi Intl Nig Ltd.</span>
		<br />	Bank Name:  <span>Zenith Bank Nig.</span>
		<br />	Bank Account No.:  <span>1012908177.</span>
		<br /><br />
		<i class="fas fa-phone"></i>
		&nbsp; 09068123707 (MTN)<br />
		<i class="fas fa-phone"></i>
		&nbsp; 08023500959 (AIRTEL)
	</div>

<div class="s-rates">
<label>DELIVERY RATES</label> 

<div class="s-wrapper">
<div class="rate-display"><span class="rate-target"></span></div>
<select name="userstate" 
		id="states" 
		class="state userstate regInput requiredv">
<?php require 'state.php'; ?>
</select>
</div>
</div>
</div>

<a href="products" class="back"><i class="fas fa-caret-left"></i> Back</a>
</div>

<button type="submit">ORDER&nbsp;NOW</button>
</section>
</form>
</div>

<?php include 'x-footer.php'; ?>


<script>

var itemCost,
	deliveryCost,
	rate
$('#states').on('change', function() {
	rate = $(this).find(':selected').data('rate');
	$('.rate-target').add($('.shpRate')).text(' '+ngamount.format(rate));
	deliveryCost = ngamount.format(rate);
	$('.delivery-cost').text(deliveryCost);
});

let object, rateVal;
object = $('#states').trigger('change');
rateVal = object.find(':selected').data('rate');
$('.shpRate').text(ngamount.format(rateVal));
var totalAmt = ngamount.format(rateVal),
	itemCost = ngamount.format(<?php echo $priceSum?>);
$('.delivery-cost').text(totalAmt);

$('#checkout-form').on('submit', (e)=> {
var orderPara = {
	"userAction" : "OPlaced",
	"itemCost": itemCost,
	"deliveryCost": rate
}

e.preventDefault();
$.ajax({
	url: 'ticket.php',
	method: 'POST',
	data: orderPara,
	cache: false,
	success: (response, status, xhr)=> {
		$('#checkout').html(response);
	}
})
})
</script>

</body>
</html>

