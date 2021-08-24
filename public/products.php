<?php 

require 'includes/check.php';
require 'header.php';

$catName = array(
	'Daily Cosmetics',
	'Health Care',
	'Superklean',
	'Health Series',
	'NutriVRich',
	'Energy Shoe',
	'Accessories',
	'Value Pack'
);

function callShuffleCat($showDATA, $catName) {
	$diffIndex = mt_rand(0, count($catName) - 1);
	$pdtId = null;
	$shufdItemArray = $showDATA->selectPrd($catName[$diffIndex], $pdtId);
	foreach($shufdItemArray as $cateName => $item) {
		$prodId = $item['product_id'];
		$pname = $item['product_name']; 
		$pvalue = $item['product_value'];
		$psMdesc = $item['small_description'];
		$pprice = $item['product_price'];
		$pimage = $item['product_image'];
		$pmOdesc = $item['modal_description'];
		$itemUsag = $item['Item_usage'];
		$itemCont = $item['item_content'];
		$pCaution = $item['item_caution'];
		$shpInfo = $item['shipping_info'];
		$outOfStck = $item['out_of_stock'];

		echo ' <form method="POST" 
					 novalidate 
					 action="cart.php" 
					 class="product-form">

		<div class="item-list">
		<div class="image-wrapper pdtarget pdshow-button">
			<span title="More Detail" class=" pdtarget pdshow-button expand">
			<i class="fas fa-expand pdtarget pdshow-button"></i></span>';

			if($outOfStck == '1') {
				echo '<div class="stock-status">Product Not available</div>';
			}
		echo '<img src="'.$pimage.'" title="'.$pname.'" alt="'.$pname.'" class="pImg pdtarget pdshow-button">
		</div>

		<div class="p-description">
			<div class="details"> 
			<div class="pname">
				<span class="pname-icon"></span> &nbsp;
				<span class="prod-name">'.$pname.' |</span>
				<span  class="pvalue">PV: '.$pvalue.'</span>';
				$pImages = $showDATA->getPimages($prodId);
				$counter = 0;
				foreach($pImages as $pImg => $imgUrl) {
					$urlValues = $imgUrl['product_images'];
					$counter++;
					echo '<input value="'.$urlValues.'" type="hidden" class="imgUrl imgUrlSrc'.$counter.'">';
				}

		$videos = $showDATA->get_videos();
		foreach ($videos as $videosC => $colvalues) {
			$videoId = $colvalues["video_id"];
			$pdvideoId = $colvalues["prod_id"];
			$videoName = $colvalues["video_name"];
			$videoUrl = $colvalues["video_url"];
			$videothmb = $colvalues["thumbnail"];

			if($pdvideoId == $prodId) {
				echo '<input data-pdvideourl="'.$videoUrl.'" value="'.$videothmb.'" type="hidden" class="videoThum">';
			}
		}

		echo '<input value="'.$pname.'" type="hidden" class="itemName">
				<input value="'.$pvalue.'" type="hidden" class="pValue">
				<input value="'.$prodId.'" type="hidden" class="pId">
				<input value="'.$itemUsag.'" type="hidden" class="itemUsage">
				<input value="'.$itemCont.'" type="hidden" class="itemContent">
				<input value="'.$pCaution.'" type="hidden" class="itemCaution">
				<input value="'.$pmOdesc.'" type="hidden" class="itemDescr">
				<input value="'.$pprice.'" type="hidden" class="itemPrice">
				<input value="Normally shipped or delivered between 1 - 7 Business days after payment is received." type="hidden" class="shippingInfo"></div>
			<div class="text">'.$psMdesc.'</div></div>
			<div class="user-action-wrapper">
			
			<label class="fa-naira ppricex">'.number_format($pprice).'&nbsp;|
			<span>Item #:</span>
			</label>';

		if(isset($_SESSION['shoppingCart']) && !empty($_SESSION['shoppingCart'])) {

			$cartStdId = [];
			foreach($_SESSION['shoppingCart'] as $keys => $items) {
					$arrayItemId = intval($items['itemId']);
					array_push($cartStdId, $arrayItemId);
					if($prodId == $items['itemId']) {
						$cartPdQnty = $items['pdQty'];
					}
			}

			if(in_array($prodId, $cartStdId)) {
				echo '<input type="number" disabled="disabled" name="visible_quantity" value="'.$cartPdQnty.'" class="item-number disable" autocomplete="off">';

				echo '<button type="submit" title="Remove from Cart" value="buy" name="'.$prodId.'" name="addtocart" class="addTocart remFrmCart infinite-scroll"><span class="white"> Added&nbsp;&nbsp;<i class="fas fa-check"></i> </span></button>'; 
					} 
					else { 
					echo '<input type="number" name="visible_quantity" value="1" class="item-number" autocomplete="off">';

					echo'<button';
						if($outOfStck == '1') {
							echo ' disabled="disabled"';
						}
					echo ' type="submit" title="';
						if($outOfStck == '1') {
							echo 'Out of stock';
						} else { echo 'Add to Cart'; }
						
					echo'" value="buy" name="'.$prodId.'" class="addTocart"><span> Select&nbsp;&nbsp;<i class="fas fa-cart-plus"></i> </span></button>';
					}
		} 	
		else  {
			echo '<input type="number" name="visible_quantity" value="1" class="item-number" autocomplete="off">';
			echo'<button type="submit" title="Add to Cart" value="buy" name="'.$prodId.'" class="addTocart"><span> Select&nbsp;&nbsp;<i class="fas fa-cart-plus"></i> </span></button>'; 
		}
		echo '</div>
		</div>
	</div>
</form>';
	}
}

function totalItem($showDATA, $catName) {
	$totalItem = 0;
	for($x = 0; $x < count($catName); $x++) {
		$pdtId = null;
		$itemCount = $showDATA->selectPrd($catName[$x], $pdtId);
		$totalItem += count($itemCount);
	}
	return $totalItem;
}

function itemCount($showDATA, $catName) {
	$pdtId = null;
	$prodArray = $showDATA->selectPrd($catName, $pdtId);
	$itemCount = count($prodArray);
	return $itemCount;
}

function callpCat($showDATA, $catName) {
	$pdtId = null;
	$prodArray = $showDATA->selectPrd($catName, $pdtId);
	$itemCount = count($prodArray);

	foreach($prodArray as $items) {
		$prodId = $items['product_id'];
		$pname = $items['product_name']; 
		$pvalue = $items['product_value'];
		$psMdesc = $items['small_description'];
		$pprice = $items['product_price'];
		$pimage = $items['product_image'];
		$pmOdesc = $items['modal_description'];
		$itemUsag = $items['Item_usage'];
		$itemCont = $items['item_content'];
		$pCaution = $items['item_caution'];
		$shpInfo = $items['shipping_info'];
		$outOfStck = $items['out_of_stock'];

		echo ' <form method="POST" 
					 novalidate 
					 action="cart.php" 
					 class="product-form">

				<div class="item-list">
				<div class="image-wrapper pdtarget pdshow-button">

				<span title="More Detail" 
					  class=" pdtarget pdshow-button expand">
					  <i class="fas fa-expand pdtarget pdshow-button"></i>
				</span>';

			if($outOfStck == '1') {
				echo '<div class="stock-status">Product Not available</div>';
			}

		echo '<img src="'.$pimage.'" 
					 title="'.$pname.'" 
					 alt="Picture coming soon" 
					 class="pImg pdtarget pdshow-button">
		</div>

		<div class="p-description">
			<div class="details">
			<div class="pname">
				<span class="pname-icon"></span> &nbsp;
				<span class="prod-name">'.$pname.' |</span>
				<span  class="pvalue">PV: '.$pvalue.'</span>';
				$pImages = $showDATA->getPimages($prodId);
				$counter = 0;
				foreach($pImages as $pImg => $imgUrl) {
					$urlValues = $imgUrl['product_images'];
					$counter++;
					echo '<input value="'.$urlValues.'" type="hidden" class="imgUrl imgUrlSrc'.$counter.'">';
				}

$videos = $showDATA->get_videos();
foreach ($videos as $videosC => $colvalues) {
	$videoId = $colvalues["video_id"];
	$pdvideoId = $colvalues["prod_id"];
	$videoName = $colvalues["video_name"];
	$videoUrl = $colvalues["video_url"];
	$videothmb = $colvalues["thumbnail"];

		if($pdvideoId == $prodId) {
			echo '<input data-pdvideourl="'.$videoUrl.'" value="'.$videothmb.'" type="hidden" class="videoThum">';
			}
		}

		echo '<input value="'.$pname.'" type="hidden" class="itemName">
			  <input value="'.$pvalue.'" type="hidden" class="pValue">
			  <input value="'.$prodId.'" type="hidden" class="pId">
			  <input value="'.$itemUsag.'" type="hidden" class="itemUsage">
			  <input value="'.$itemCont.'" type="hidden" class="itemContent">
			  <input value="'.$pCaution.'" type="hidden" class="itemCaution">
			  <input value="'.$pmOdesc.'" type="hidden" class="itemDescr">
			  <input value="'.$pprice.'" type="hidden" class="itemPrice">
			  <input value="Normally shipped or delivered between 1 - 7 Business days after payment is received." type="hidden" class="shippingInfo">
			  </div>
			<div class="text">'.$psMdesc.'</div></div>

			<div class="user-action-wrapper">
			<label class="fa-naira ppricex">'.number_format($pprice).'	
				&nbsp;|<span>Item #:</span>
			</label>';
			
			if(isset($_SESSION['shoppingCart']) && !empty($_SESSION['shoppingCart'])) {
				$cartStdId = [];
				foreach($_SESSION['shoppingCart'] as $keys => $items) {
					$arrayItemId = intval($items['itemId']);
					array_push($cartStdId, $arrayItemId);
					if($prodId == $items['itemId']) {
						$cartPdQnty = $items['pdQty'];
					}					
				}

			if(in_array($prodId, $cartStdId)) {
				echo '<input type="number" disabled="disabled" name="visible_quantity" value="'.$cartPdQnty.'" class="item-number disable" autocomplete="off">';

				echo '<button type="submit" title="Remove from Cart" value="buy" name="'.$prodId.'" name="addtocart" class="addTocart remFrmCart infinite-scroll"><span class="white"> Added&nbsp;&nbsp;<i class="fas fa-check"></i> </span></button>'; 
			} 
			else { 
				echo '<input type="number" name="visible_quantity" value="1" class="item-number" autocomplete="off">';

				echo'<button ';
					if($outOfStck == '1') {
						echo ' disabled="disabled"';
					}
				echo' type="submit" title="';
					if($outOfStck == '1') {
							echo 'Out of stock';
					} else { echo 'Add to Cart'; }

				echo '" value="buy" name="'.$prodId.'" class="addTocart"><span> Select&nbsp;&nbsp;<i class="fas fa-cart-plus"></i> </span></button>';
			}

			} 
			else  {
				echo '<input type="number" name="visible_quantity" value="1" class="item-number" autocomplete="off">';

				echo'<button';
					if($outOfStck == '1') {
						echo ' disabled="disabled"';
					}
				echo ' type="submit" title="';

					if($outOfStck == '1') {
							echo 'Out of stock';
					} else { echo 'Add to Cart'; }

				echo '" value="buy" name="'.$prodId.'" class="addTocart"><span>Select&nbsp;&nbsp;<i class="fas fa-cart-plus"></i> </span></button>'; 
				}			
				echo '</div>
		</div>
	</div>
</form>';
	}
}

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
		} 
		else {
			$greetings = 'Hi, '. $_SESSION['familyName'];
		}
	}
	
}

?>

<?php include'includes/logout.php'; ?>

<div id="menu-wrapper" class="universal-menu product">
	<aside><a href="index.php"><div class="logo"></div></a></aside>
	<?php include 'menu.php'; ?>
</div>

<section class="item-description pdtarget pdu-modal"> 
	<div class="exception pdcontent">
		<label class="p-info exception">| Product Information</label>
		<i class="fas fa-times pdtarget close pdpage"></i>
		<div class="discription exception">
			<div class="item-tag name set-font exception">
				<label class="all exception">Item:</label> <span class="item-name exception populate"></span>
			</div>

			<div class="item-tag item-usage set-font exception">
				<p><label class="all exception">Usage:</label> <span class="item-usage exception populate"></span></p>
			</div>

			<div class="item-tag item-content set-font exception">
				 
				<p><label class="all exception">Content: </label><span class="item-content exception populate"></span></p>
			</div>

			<div class="item-tag caution set-font exception">
				<p><label class="all exception">Cautions: </label>
				<span class="item-caution exception populate"></span></p> 
			</div>

			<div class="item-tag desc exception"><p>
				<label class="all exception">Description: </label>
				<span class="item-descr populate exception"></span></p></div>

			<div class="item-tag icon5 exception pvalue"><label class="all exception">Pv: </label>				<span class="item-value populate exception"></span> 
			</div>

			<div class="item-tag icon6 exception"><label class="all exception">Price: </label>
				<span class="exception"><span class="item-price populate exception"></span><i class="far fa-check-circle"></i>
				</span>
			</div>

			<div class="item-tag shipping exception">
				<p class="exception">
					<label class="all exception">Shipping: </label><span class="item-shipping-info populate exception"></span></p>
			</div>
		</div>

		<div class="image-container">
			<img src="" class="src-collector exception">
				<div id="vid-frame" class="iframe fmedia-holder media-holder exception">
					<video class="v-tag pd-video exception" data-autoplay="false" autostart="0" volume="1" width="100%" height="100%" height="240" poster="" controls="controls">
						<source src="/longrichs.com/'.$videoUrl.'">
					</video>
				</div>
			<div class="image-thumbnail exception"><ul id="thumb-nails"></ul>
			</div>
		</div>
	</div>
</section>


<section class="wrapper product-cat-wrapper">
	<div class="auto-slidder-wrapper products">
		<div id="active-display">
			<label class="greeting"><?php if(isset($greetings)) { echo $greetings; } ?> </label>

	<div class="MS-content">
		<section class="carousel">
		<?php callShuffleCat($showDATA, $catName); ?>
		</section>
	</div>

	<div class="MS-controls">
		<input type="range" class="range-bar" disabled="disabled" value="" name="" min="0" max="10" step="1">
		<button class="left MS-direction"></button>
		<button class="right MS-direction"></button>
	</div>
		</div><div class="transparent"></div>
	</div>

	<div class="inner-wrapper togglex" id="choose">
	<nav>
		<ul class="product-list">
				<li class="tabx active">All Categories (<?php echo totalItem($showDATA, $catName); ?>)</li>
				<li class="tabx">Daily Cosmetics (<?php echo itemCount($showDATA, $catName[0]) ?>)</li>
				<li class="tabx">Health Care (<?php echo itemCount($showDATA, $catName[1]) ?>)</li>
				<li class="tabx" >Superklean (<?php echo itemCount($showDATA, $catName[2]) ?>)</li>
				<li class="tabx" >Health Series (<?php echo itemCount($showDATA, $catName[3]) ?>)</li>						
				<li class="tabx" >Nutri VRich (<?php echo itemCount($showDATA, $catName[4]) ?>)</li>
				<li class="tabx" >Energy Shoes (<?php echo itemCount($showDATA, $catName[5]) ?>)</li>
				<li class="tabx" >Accessories (<?php echo itemCount($showDATA, $catName[6]) ?>)</li>
				<li class="tabx" id="daily-cosmetics">Value Pack (<?php echo itemCount($showDATA, $catName[7]) ?>)</li>
			</ul>
	</nav> 

<div class="tab-contents-wrapper panels">
<div class="panel">
<div class="gridslidder"><br />
<div class="xname">Daily Cosmetics (<?php echo itemCount($showDATA, $catName[0]) ?>)</div>
<div class="health products">
<div class="marketting-content">
	Here our finnest beauty and daily cosmetics that help build up your self esteem and confidence. Stay young and attractive, aromatize and beautify your <br />body with Longrich's most valuable cosmetics. If you’re not already stocking your beauty cabinet and makeup bags, <br />it’s time to finally give it a go and add some of these skincare products to your cart.
</div>


<div class="MS-content">
<section class="carousel">
	 <?php callpCat($showDATA, $catName[0]);  ?>
</section>
</div>
<div class="MS-controls">
<input type="range" class="range-bar" disabled="disabled" value="" name="" min="0" max="10" step="1">
<button class="left MS-direction"></button>
<button class="right MS-direction" id="health-care"></button>
</div>
</div>
</div>

<div class="gridslidder">
<div class="xname">Health Care (<?php echo itemCount($showDATA, $catName[1]) ?>)</div>
<div class="health-care products">
<div class="marketting-content">
If you're looking for daily health care products that are safe for your heart, immune system, reproductive system and still delivers the taste of refreshment, <br />Longrich health care products are great choice to meet those needs. From Calcium Tablet that provides the body cells with energy and building blocks that they use for healing and <br />reproduction to Mengqian Fertility Supplement is very much effective for female infertility. This helps prepare women's body to conceive and carry pregnancy to term.
And so many of them.
</div>

<div class="MS-content">
<section class="carousel"><?php callpCat($showDATA, $catName[1]); ?></section>
</div>

<div class="MS-controls">
<input type="range" class="range-bar" disabled="disabled" value="" name="" min="0" max="10" step="1">
<button class="left MS-direction"></button>
<button class="right MS-direction" id="superklean"></button>
</div>

</div>
</div>

<div class="gridslidder">
<div class="xname">
	Superklean (<?php echo itemCount($showDATA, $catName[2]) ?>)</div>
<div class="superklean products">
<div class="marketting-content">

Women's and babies' health care is one of our top priority. 
We believe our products are healthy solutions for use within your home–and for the community and environment outside of it. <br />We are always evaluating how to reduce these products' environmental impact, increase performance and safety, and create a more sustainable supply chain. <br />

Ultra-thin Napkins that feature our innovative pure fit design that conforms to your body for reliable leak protection and <br />comfort 

By using Longrich's Superklean products, you’re joining us in nurturing the health of the next generation of women and children.

</div>
<div class="MS-content"><section class="carousel"><?php callpCat($showDATA, $catName[2]); ?></section>
</div>
<div class="MS-controls">
<input type="range" class="range-bar" disabled="disabled" value="" name="" min="0" max="10" step="1">
<button class="left MS-direction"></button>
<button class="right MS-direction" id="health-series"></button>
</div>

</div>
</div>

<div class="gridslidder">
<div class="xname">Health Series (<?php echo itemCount($showDATA, $catName[3]) ?>)</div>
<div class="cosmetics products">
<div class="marketting-content">
	Having a reliable cooking utensil set is paramount for even the most amateur cooks. If you’re making box Mac ‘n’ Cheese for the kids, you still want a reliable pot and spoon that won’t melt <br />under all of that cheesy pressure. Whether you’re in the market for new utensils because you just moved or you’re looking for a matching utensils set, we’ve got you covered.<br />
	Our health series also includes Fujian Cup which provides users with alkaline water that helps to reduce the high acidity level in the body. And also energy necklace for Male and Female.
</div>
<div class="MS-content">
<section class="carousel">
	<?php callpCat($showDATA, $catName[3]);  ?>
</section>
</div>
<div class="MS-controls">
<input type="range" class="range-bar" disabled="disabled" value="" name="" min="0" max="10" step="1">
<button class="left MS-direction"></button>
<button class="right MS-direction" id="nutri-vrich"></button>
</div>
</div>
</div>

<div class="gridslidder">
<div class="xname">Nutri VRich (<?php echo itemCount($showDATA, $catName[4]) ?>)</div>
<div class="cosmetics products">
<div class="marketting-content">
	Whether you’re looking to jumpstart your metabolism or breakthrough a weight loss plateau, Longrich NutriVRich pink tea (Slim tea) are a great way to get there. With natural ingredients, <br />NutriVRich pink tea aim to cleanse the body of waste and toxins, reducing belly bloat and swelling. Ingredients, taste, and length of NutriVRich pink tea are all important factors to evaluate when choosing the best NutriVRich pink tea for you. We’ve reviewed five great NutriVRich pink tea on the market and provided their best features and benefits in the description.
</div>
<div class="MS-content">
<section class="carousel">
	<?php callpCat($showDATA, $catName[4]);  ?>
</section>
</div>
<div class="MS-controls">
<input type="range" class="range-bar" disabled="disabled" value="" name="" min="0" max="10" step="1">
<button class="left MS-direction"></button>
<button class="right MS-direction" id="energy-shoes"></button>
</div>
</div>
</div>

<div class="gridslidder">
<div class="xname">Energy Shoes (<?php echo itemCount($showDATA, $catName[5]) ?>)</div>
<div class="cosmetics products">
<div class="marketting-content">
	Longrich Energy Shoes has the latest shoe technology integrated into its design. Designed for people who work on hard surfaces all day and experience <br />discomfort and fatigue in their feet and legs. They are built with Massaging Gel Technology and extra cushioning to provide all-day shock absorption, they help you stay energized while you work.<br /> These shoes are suitable for people with joint issues, arthritis, rheumatism, etc. Stroke patients. Cervical/lumbar spondylosis patients. People with hormonal imbalance.
</div>
<div class="MS-content">
<section class="carousel">
	<?php callpCat($showDATA, $catName[5]);  ?>
</section>
</div>
<div class="MS-controls">
<input type="range" class="range-bar" disabled="disabled" value="" name="" min="0" max="10" step="1">
<button class="left MS-direction"></button>
<button class="right MS-direction" id="accessories"></button>
</div>
</div>
</div >

<div class="gridslidder">
<div class="xname">Accessories (<?php echo itemCount($showDATA, $catName[6]) ?>)</div>
<div class="cosmetics products">
<div class="marketting-content">
	Longrich also provides accessories, gadgets for personal use. Amongst them includes power bank, test pass gadget, superklean indicator, toolbox e.t.c <br />Toolbox also called toolkit, tool chest or work box is a box to organize, carry, and protect your daily used items/tools. While they may not include tools for every project, these  tool sets on the <br />market do offer an excellent starting point for any home or office setup. They’re also durable, and, in some cases, include a lifetime warranty.
</div>
<div class="MS-content">
<section class="carousel">
	<?php callpCat($showDATA, $catName[6]);  ?>
</section>
</div>
<div class="MS-controls">
<input type="range" class="range-bar" disabled="disabled" value="" name="" min="0" max="10" step="1">
<button class="left MS-direction"></button>
<button class="right MS-direction" id="value-pack"></button>
</div>
</div>
</div>

<div class="gridslidder">
<div class="xname">Value Pack (<?php echo itemCount($showDATA, $catName[7]) ?>)</div>
<div class="cosmetics products">
<div class="marketting-content">
	 We believe it is our responsibility to set a course for a more mindful way of doing business where companies act as partners with other stakeholders to create a brighter <br /> future for our customers. With that in mind, Longrich has made available personalized packages to suit idividuals with different financial capabilities. Available below are some of our value Packs that <br /> members can also benefit from.
</div>
<div class="MS-content">
<section class="carousel">
	<?php callpCat($showDATA, $catName[7]);  ?>
</section>
</div>
<div class="MS-controls">
<input type="range" class="range-bar" disabled="disabled" value="" name="" min="0" max="10" step="1">
<button class="left MS-direction"></button>
<button class="right MS-direction"></button>
</div>
</div>
</div>

</div>

<div class="panel">
	<div class="gridslidder">
		<br /><div class="xname">Daily Cosmetics</div><br />
		<div id="daily-cosm-p">
				 <?php callpCat($showDATA, $catName[0]);  ?>
		</div>
	</div>
</div>

<div class="panel">
	<div class="gridslidder"><br /><div class="xname">Health Care</div><br />
		<div id="health-p">
			<?php callpCat($showDATA, $catName[1]);  ?>
		</div>
	</div>
</div>

<div class="panel">
	<div class="gridslidder"><br />
		<div class="xname">Superklean</div><br />
		<div id="sklean-p">
				<?php callpCat($showDATA, $catName[2]);  ?>
		</div>
	</div>
</div>

<div class="panel">
	<div class="gridslidder"><br />
		<div class="xname">Health Series</div><br />
		<div id="health-sp">
				<?php callpCat($showDATA, $catName[3]);  ?>
		</div>
	</div>
</div>

<div class="panel">
	<div class="gridslidder"><br />
		<div class="xname">Nutri VRich</div><br />
		<div id="nutri-vp">
				<?php callpCat($showDATA, $catName[4]);  ?>
		</div>
	</div>
</div>

<div class="panel">
	<div class="gridslidder">
		<br />
		<div class="xname">Energy Shoes</div>
		<br />
		<div id="energy-sp">
				<?php callpCat($showDATA, $catName[5]);  ?>
		</div>
	</div>
</div>

<div class="panel">
	<div class="gridslidder"><br />
		<div class="xname">Accessories </div><br />
		<div id="accessr-p">
				<?php callpCat($showDATA, $catName[6]);  ?>
		</div>
	</div>
</div>

<div class="panel">
	<div class="gridslidder"><br />
		<div class="xname">Value Pack </div><br />
		<div id="value-p" class="products">
				<?php callpCat($showDATA, $catName[7]);  ?>
		</div>
	</div>
</div>


<script>
var ngamount = new Intl.NumberFormat('en-NG', {
		style: 'currency',
		currency: 'NGN',
		minimumFractionDigits: 0
});

$('.MS-controls').each((k, p)=> {

	var gcounter = 0,
	sldBtn = $(p).children('button.MS-direction');
	rangeslide = $(p).children('input[class="range-bar"]');
	$(rangeslide).val(gcounter);
	$(rangeslide).attr('min', gcounter);

	$(sldBtn).on('click', function(e) {
	var pcarousel = $(this).parent().prev().children(),
	pitem = $(this).parent().prev().children().children(), 
	rangeslider = $(this).parent().children('input[class="range-bar"]'),
	pitemNo = pitem.length,
	pslidewith = 280;
	$(rangeslider).attr('max', pitemNo - 5);

	if($(this).attr('class').match(/\b(left)\b/)) {
	gcounter--;			
	rangeslider.val(gcounter);
		if(gcounter <  0) {
		gcounter = pitemNo - 5;
		rangeslider.val(gcounter);
		pcarousel.css({ 'transform':'translateX('+ (-pslidewith * gcounter) +'px)', 'transition' : 'none' });
		}
		else {
		pcarousel.css({ 'transform':'translateX('+ (-pslidewith * gcounter) +'px)', 'transition' : '0.4s ease-in-out'});
		}
	}
	else {
		gcounter++;
		rangeslider.val(gcounter);
		if(gcounter > pitemNo - 5) {
		gcounter = 0;
		rangeslider.val(gcounter);
		pcarousel.css({ 'transform':'translateX('+ (-pslidewith * gcounter) +'px)', 'transition' : 'none' });
		} 
		else {
		pcarousel.css({ 'transform':'translateX('+ (-pslidewith * gcounter) +'px)', 'transition' : '0.4s ease-in-out' });
		}
	}
	});
});

var pdumodal = $('section.pdu-modal'),
itemImage = $('.src-collector'),
itemVideo = $('video.v-tag.pd-video'),
itemName = $('span.item-name.populate'),
itemUsage = $('span.item-usage.populate'),
itemContent = $('span.item-content.populate'),
itemCaution = $('span.item-caution.populate'),
itemDescr = $('span.item-descr.populate'),
itemPrice = $('span.item-price.populate'),
itemValue = $('span.item-value.populate'),
itemShippingInfo = $('span.item-shipping-info.populate');

$('img.pdtarget, .pdtarget').each(function(p, k) {
$(k).on('click', function(e) {
if($(e.target).attr('class').match(/\b(pdshow-button|pdcontent)\b/)) {

	var prodImage,
	prodName,
	prodValue,
	prodUsage,
	prodContent,
	prodCaution,
	prodDescr,
	prodPrice,
	prodShipInfo,
	generation,
	pImgSrc,
	pdvidThumbs,
	thumbnails;
	spanPdImg = $(this).siblings('img').attr('src');
	iconPdImg = $(this).parent().siblings('img').attr('src');
	prodImage = $(this).attr('src');
	generation = $(this).parent().next().children().children();
	thumbnails = $('#thumb-nails img');
	pImgSrc = generation.find('input.imgUrl');
	pdvidThumbs = generation.find('input.videoThum');


	for(var f = 0; f < pImgSrc.length; f++) {
		$('#thumb-nails').append('<li><img class="exception thn-images" src="'+$(pImgSrc[f]).val()+'" /></li>');
	}

	for(var q = 0; q < pdvidThumbs.length; q++) {
		if($(pdvidThumbs[q]).val() != undefined) {
			$('#thumb-nails').append('<li class="videoThmb"><img class="exception thn-images videoThmb" data-videourl="'+$(pdvidThumbs[q]).data('pdvideourl')+'" src="'+$(pdvidThumbs[q]).val()+'" /></li>');
		}
	}
	
	if(thumbnails.length != '') {
		
		$(thumbnails).on('click mouseover', function(e) { 
			if($(e.currentTarget).hasClass('videoThmb')) {
				itemVideo.attr('poster', $(e.currentTarget).attr('src'));
				itemVideo.attr('src', $(e.currentTarget).data('videourl'));
				$('img.src-collector').css('display', 'none');
				$('#vid-frame').css('display', 'block').each(function(ind, elem) {
					$(this).find('video').trigger('play');
				});
				$('#vid-frame video').css('border', 'none');
			} 
			else {
				$('img.src-collector').css('display', 'block');
				$('#vid-frame').css('display', 'none');
				itemImage.attr('src', $(this).attr('src'));
				$('#vid-frame').each(function(ind, elem) {
					$(this).find('video').trigger('pause');
				});
			}
			$(e.currentTarget).addClass('active-thn');
			$(thumbnails).not(e.currentTarget).each(function(v, x){
				$(x).removeClass('active-thn');
			});
		});
	}

	
	prodName = generation.find('input.itemName').val();
	prodValue = generation.find('input.pValue').val();
	prodUsage = generation.find('input.itemUsage').val();
	prodContent = generation.find('input.itemContent').val();
	prodCaution = generation.find('input.itemCaution').val();
	prodDescr = generation.find('input.itemDescr').val();
	prodPrice = generation.find('input.itemPrice').val();
	prodShipInfo = generation.find('input.shippingInfo').val();
	
	if(prodImage != undefined || prodName != undefined || prodValue != undefined || prodUsage != undefined || prodContent != undefined || prodCaution != undefined || prodDescr != undefined || prodPrice != undefined || prodShipInfo != undefined) {


		itemImage.attr('src', spanPdImg);
		itemImage.attr('src', iconPdImg);
		itemImage.attr('src', prodImage);
		itemName.text(prodName);
		itemUsage.text(prodUsage);
		itemContent.text(prodContent);
		itemCaution.text(prodCaution);
		itemDescr.text(prodDescr);
		itemPrice.text(ngamount.format(prodPrice));
		itemValue.text(prodValue);
		itemShippingInfo.text(prodShipInfo);
	}
	$(pdumodal).addClass('display');
	$('body').css('overflow', 'hidden');
} 
else {
	if($(e.target).attr('class').match(/\b(exception)\b/)) {
		pdumodal.addClass('display ');
	} 
	else {
		$('#vid-frame').each(function(ind, elem) {
			$(this).find('video').trigger('pause');
		});
		$('img.src-collector').css('display', 'block');
		$('#vid-frame').css('display', 'none');
		
		$('#thumb-nails').html('');
		pdumodal.removeClass('display');
		$('body').css('overflow', 'auto');
	}
}
});
});

var savedPid = [],
actnBtnArrr = [];
	
$('form.product-form').each(function(i, n) {

	var itemNoRegEx = /^[.]|(\d){1,}\./;
	$(this).find('input[type="number"].item-number').on('keyup', function() {
		let $this = $(this).val();
		if($this >= 0 || $this !== '') {
			$('.cartMessage').html('');
		} 
	});

	var allAtionBtn,
	allProId;
	allAtionBtn = $(this).children().find('button.addTocart');
	allProId = $(this).find('input[type="hidden"].pId').val();
	savedPid.push(allProId);
	actnBtnArrr.push(allAtionBtn);

	$(this).on('submit', function(ev) {
		ev.preventDefault();
		const rvmCartMsg = ()=> {
			$('.cartMessage').html('');	
		};
		let proId,
		pName,
		pValue,
		pPrice,
		pQuantity,
		actionBtn;

		proId = $(this).find('input[type="hidden"].pId').val();
		proImg = $(this).find('img').attr('src');
		pName = $(this).find('input[type="hidden"].itemName').val();
		pValue = $(this).find('input[type="hidden"].pValue').val();
		pPrice = $(this).find('input[type="hidden"].itemPrice').val();
		pQuantity = $(this).find('input[type="number"].item-number');
		actionBtn = $(this).children().find('button.addTocart');
		pQuant = pQuantity.val();

		if(pQuant <= 0 || pQuant === '' || itemNoRegEx.test(pQuant)) {
			
			$('<div class="cartMessage"><div class="error">Please enter a valid no of item or value greater than zero.</div></div>').insertBefore($(this).parents('.MS-content'));
			return false;
		}
		else {
		$('.cartMessage').html('');	
		$('#cart-items').removeClass('nodisplay');
		var addItemToCart = ()=> {
		pQuantity.attr('disabled', 'true');
		var addParam = {
			"itemId" : proId,
			"itemImg" : proImg,
			"itemName" : pName,
			"itemPv" : pValue,
			"itemPrice" : pPrice,
			"itemQuantity" : pQuant,
			"action" : "addItem"
		}
		$.ajax({
			url: 'cart.php',
			method: 'POST',
			data: addParam,
			cache: false,
			success: function(response, status, xhr) {
				$('#cart-items').html(response);
				if(status === 'success') {
					setTimeout(removeDelaction, 2000);
				}
			}, 
			error: function(response, status, xhr) {
				$('.cartMessage').html("<div class='error'>Your action to add item to cart could not be executed, Please try again.</div>");
			}
		});
	}
	var remItemFrmCart = ()=> {
	pQuantity.removeAttr('disabled');
	var remParam = {
		"itemId" : proId,
		"itemQuantity" : pQuant,
		"action" : "removeItem"
	}
	$.ajax({
		url: 'cart.php',
		method: 'POST',
		data: remParam,
		cache: false,
		success: function(response, status, xhr) {
			pQuantity.val(1);
			$('#cart-items').html(response);
			if(status === 'success') {
				setTimeout(removeDelaction, 2000);
			}
		}, 
		error: function(response, status, xhr) {
			$('.cartMessage').html("<div class='error'>Your action to remove item from cart could not be executed, Please try again.</div>");
		}
	});
}
var addCont = null,
rmvCont = null;
for(var f = 0; f < actnBtnArrr.length; f++) {
	if(actnBtnArrr[f].attr('name') === proId) {
		if(actnBtnArrr[f].find('i').hasClass('fa-cart-plus') == true) {
			$(actnBtnArrr[f]).find('span').replaceWith('<span class="white" title="Remove from Cart"> Added&nbsp;&nbsp;<i class="fas fa-check"></i> </span>');
			$(actnBtnArrr[f]).prev().attr('disabled', 'disabled');
			$(actnBtnArrr[f]).prev().val(pQuant);
			addCont = 1;
		} else {
			$(actnBtnArrr[f]).find('span').replaceWith('<span title="Add to Cart"> Select&nbsp;&nbsp;<i class="fas fa-cart-plus"></i> </span>');
			$(actnBtnArrr[f]).prev().removeAttr('disabled');
			$(actnBtnArrr[f]).prev().val(1);
			rmvCont = 2;
		}
	}
}
	if(addCont == 1) {
		addItemToCart();
	}
	if(rmvCont == 2) {
		remItemFrmCart();
	}
}
	});
});

setTimeout(rvmCartMsg, 3000);
function rvmCartMsg() {
	$('.gridslidder .cartMessage .error').addClass('nodisplay');	
}
</script>

<div class="availbale-soon">
	Some of our products which are not listed on our page are still in production and will soon be availbale in the market for consumption. As soon as they are ready, we will make them available for our customers to purchase. <br />We are committed to providing the best health care services to Mankind.
</div>
<?php include 'contact.php'; ?></div></section>
<?php include("footer.php") ?>



