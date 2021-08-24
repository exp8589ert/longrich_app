<?php
error_reporting(0);

if(!isset($_SESSION)) { session_start(); }

if(isset($_POST['itemQuantity']) && !empty($_POST['itemQuantity']) && 
	$_POST['itemQuantity'] != 0) {

switch($_POST['action']) {
	case 'addItem':
	$_SESSION['appendToInput'] = filter_var(strip_tags($_POST['itemQuantity']), FILTER_SANITIZE_SPECIAL_CHARS);
	$itemArray = array(
		$_POST['itemId'] => array(
			"itemId" => filter_var(strip_tags($_POST['itemId']), FILTER_SANITIZE_SPECIAL_CHARS),
			"pdImg" => filter_var(strip_tags($_POST['itemImg']), FILTER_SANITIZE_SPECIAL_CHARS),
			"pdName" => filter_var(strip_tags($_POST['itemName']), FILTER_SANITIZE_SPECIAL_CHARS),
			"pdval" => filter_var(strip_tags($_POST['itemPv']), FILTER_SANITIZE_SPECIAL_CHARS),
			"pdQty" => filter_var(strip_tags($_POST['itemQuantity']), FILTER_SANITIZE_SPECIAL_CHARS),
			"uPrice" => filter_var(strip_tags($_POST['itemPrice']), FILTER_SANITIZE_SPECIAL_CHARS)
		)
	);
	if(!empty($_SESSION["shoppingCart"])) {
	$_SESSION["shoppingCart"] = array_merge($_SESSION["shoppingCart"], 
	$itemArray);
	}
	else {
	$_SESSION["shoppingCart"] = $itemArray;
	}
	echo "<script> $('.cart-action-info').html('<div class=\"add\"> Item added to cart. </div>');  </script>";
	break;

	case 'removeItem':
	foreach ($_SESSION["shoppingCart"] as $key => $product) {
	if($product["itemId"] == $_POST['itemId']) {
		unset($_SESSION["shoppingCart"][$key]);
	}
	} 
	$_SESSION["shoppingCart"] = array_values($_SESSION["shoppingCart"]);
	echo "<script> $('.cart-action-info').html('<div class=\"remove\"> Item removed from cart. </div>');  </script>";
}

} 

if(isset($_SESSION['shoppingCart'])) {
	$totalPdV = 0;
	$itemsXpV = 0;
	$totalQty = 0;
	$priceSum = 0;
}
?>

<form method="POST" action="checkout" class="action-btn cart-form">
<div class="cart-action-info"></div>
<table class="action-btn"> 
	<tr class="action-btn">
		<th width="8.5%" class="action-btn">Image</th>
		<th width="29%" class="action-btn">Name</th>
		<th width="13%" class="action-btn">PV</th>
		<th width="13%" class="action-btn">Quantity</th>
		<th width="13%" class="action-btn">Unit Price</th>
		<th width="15.8%" class="action-btn">Total</th>
		<th width="8.5%" class="action-btn">Action</th>
	</tr> 

<?php 
if(isset($_POST['deleteCart'])) {
	unset($_SESSION['shoppingCart']);
	echo "<script> $('.cart-action-info').html('<div class=\"remove\"> You have emptied your cart. </div>');  </script>";
}

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

<tr class="action-btn"> 
	<td class="action-btn">
		<img src="<?php echo $pImg; ?>" class="action-btn" />
	</td>
	<td class="action-btn"><?php echo $pName; ?></td>
	<td class="action-btn"><?php echo $pPdval; ?></td>
	<input type="hidden" value="<?php echo $pdIdty;  ?>" >
	<td class="action-btn"><?php echo $pQnty; ?></td>
	<td class="action-btn"><?php echo number_format($puPrc); ?></td>
	<td class="action-btn"><?php 

		$itemsXpV = $pPdval * $pQnty; 
		$itemQprice = $unitPrice * $pQnty; 
		echo number_format($itemQprice); 

	?>
	</td>
	<td class="action-btn">
		<a href="#" title="Remove item" class="delete-item action-btn">
			<i class="far fa-trash-alt action-btn"></i>
		</a>
	</td>
</tr>

<?php  
	$totalPdV += $itemsXpV;
	$totalQty += $pQnty;
	$priceSum += $itemQprice;
	$cartSumTotal = $totalQty;
}
}
else {
	$cartSumTotal = '0';
}

?> 

<tr class="action-btn">
	<td colspan="2" class="action-btn" align=left>
		<label class="action-btn">Total</label>
	</td>

	<td colspan="" class="action-btn">
		<label class="action-btn">
			<?php if(!empty($_SESSION['shoppingCart'])) { 
				echo $totalPdV. ' pv'; } 
			?>
		</label>
	</td>
	<td colspan="" class="action-btn">
		<label class="action-btn">
			<?php if(!empty($_SESSION['shoppingCart'])) { 
				echo $totalQty; } ?>
		</label>
	</td>

	<td class="action-btn"></td>
	<td class="action-btn">
	<label class="action-btn total-amount"><?php if(!empty($_SESSION['shoppingCart'])) { echo "<span class='fa-naira'> ".number_format($priceSum)."</span>"; } ?></label> 
	</td>

	<td class="action-btn"> 
		<?php if(!empty($_SESSION['shoppingCart'])) { echo '<a href="javascript:void(0)" title="Empty cart" class="delete-all action-btn"><i class="fas fa-trash-alt action-btn"></i></a>'; } 
		?>
	</td>
</tr>
</table>


<?php 
	if(isset($_SESSION['shoppingCart']) && !empty($_SESSION['shoppingCart'])) {
		echo '<button type="submit" name="cartList" class="button"> CHECK OUT</button>';
		$_SESSION['loginRequired'] = '<span class="error_msg">Please login to complete your order.</span>';
	} else {
		echo '<button type="button" title="Shopping Cart Is Empty" disable="disable" class="button disable action-btn">CART EMPTY</button>';
	}
?>
</form> 


<script>

	$('#cartCounter').text(<?php echo $cartSumTotal; ?>);
	$('a.delete-all').on('click', (e)=> {
	e.preventDefault();
	emptyPara = {
		'deleteCart':'empty-cart'
	}
	$.ajax({
		url: 'cart.php',
		method: 'POST',
		cache: false,
		data: emptyPara,
		beforeSend: function(xhr) {
			$('form.product-form').each(function() {
				var pFInputNum = $(this).find('input[type="number"]'),
				pFormBtn = $(this).find('button');

				if(pFInputNum.attr('disabled', 'disabled')) {
					pFInputNum.removeAttr('disabled');
					pFInputNum.val(1);
					pFormBtn.find('span').replaceWith('<span title="Add to Cart"> Select&nbsp;&nbsp;<i class="fas fa-cart-plus"></i> </span>');
				}
			});
		},
		success: function(response, status, xhr) {
			$('#cart-items').html(response);
				if(status === 'success') {
					setTimeout(removeDelaction, 2000);
				}
		}
	});
	});

	$('a.delete-item').on('click', function(e) {
		e.preventDefault();
		let pQnty = $($(this).parent().prevAll()[2]).text(),
		pdId = $($(this).parent().prevAll()[3]).val();
		remParam = {
		"itemId" : pdId,
		"itemQuantity" : pQnty,
		"action" : "removeItem"
		};
		$.ajax({
			url: 'cart.php',
			method: 'POST',
			data: remParam,
			cache: false,
			beforeSend: function(xhr) {
				var cnvtPIDarr = [],
				cnvtpdId = parseInt(pdId);
				$('form.product-form').each(function(k, u) {
				var pFInputNum = $(this).find('input[type="number"]'),
				pFormBtn = $(this).find('button'),
				pID = $(this).find('input[type="hidden"].pId').val();
				var cnvtPID = parseInt(pID);

				if(cnvtpdId == cnvtPID) {
					if(pFInputNum.attr('disabled', 'disabled')) {
						pFInputNum.removeAttr('disabled');
						pFInputNum.val(1);
						pFormBtn.find('span').replaceWith('<span title="Add to Cart"> Select&nbsp;&nbsp;<i class="fas fa-cart-plus"></i> </span>');
					}
				}			
				});
			},
			success: function(response, status, xhr) {
			if(status === 'success') {
			$('#cart-items').html(response);
			setTimeout(removeDelaction, 2000);
			}
			}, 
			error: function(response, status, xhr) {
			$('.cartMessage').html("<div class='error'>Your action to remove item from cart could not be executed, Please try again.</div>");
			}
		});
	});

</script>



