<?php
require 'includes/check.php';
$paymentType = $_POST["confirmPayment"];

if(!empty($paymentType) || $paymentType != '') {

	switch($paymentType) {
		case "regDeposit":
			$regDepName = filter_var(strip_tags($_POST["regDepName"]), FILTER_SANITIZE_SPECIAL_CHARS);
			$regTellerNo = intval(filter_var(strip_tags($_POST["regTellerNo"]), FILTER_SANITIZE_SPECIAL_CHARS));
			$regPayDate = strtotime(filter_var(strip_tags($_POST["regPayDate"]), FILTER_SANITIZE_SPECIAL_CHARS));
			$regAmtDepos = intval(filter_var(strip_tags($_POST["regAmtDepos"]), FILTER_SANITIZE_SPECIAL_CHARS));

			$depositRes = $inputData->registerPayment($regDepName, $regTellerNo, $regPayDate, $regAmtDepos, $transfName = null, $transfDate = null, $amountTransf = null);

				echo $depositRes;
			
				echo '<div class="payment-status-msg confirmed registered">
						<span>Registered </span> <i class="fas fa-check"></i><br /><br /><span>Your deposit details have been registered. Please wait for 3 to 24 hours for us to validate your payment. Or contact our customer care. <br /><br /> After the stipulated time, you can check the status of your payment using the check status button. </span>

						<br />
						<br />
						<br />
						<a href="payment-status"><button type="button">Register another payment</button></a>
					</div>';
			


		break;

		case "regTransfer":
			$transfName = filter_var(strip_tags($_POST["transfName"]), FILTER_SANITIZE_SPECIAL_CHARS);
			$amountTransf = intval(filter_var(strip_tags($_POST["amountTransf"]), FILTER_SANITIZE_SPECIAL_CHARS));
			$transfDate = strtotime(filter_var(strip_tags($_POST["transfDate"]), FILTER_SANITIZE_SPECIAL_CHARS));

			$transferRes = $inputData->registerPayment($regDepName = null, $regTellerNo = null, $regPayDate = null, $regAmtDepos = null, $transfName, $transfDate, $amountTransf);

			
				echo '<div class="payment-status-msg confirmed registered">
						<span>Registered</span> <i class="fas fa-check"></i><br /><br /><span>Your transfer details have been registered. Please wait for 3 to 24 hours for us to validate your payment. Or contact our customer care. <br /><br /> After the stipulated time, you can check the status of your payment using the check status button. </span>

						<br />
						<br />
						<br />
						<a href="payment-status"><button type="button">Register another payment</button></a>
				</div>';

		break;

		case "cdeposit":

			$depositName = filter_var(strip_tags($_POST["depositName"]), FILTER_SANITIZE_SPECIAL_CHARS);
			$tellerNo = intval(filter_var(strip_tags($_POST["tellerNo"]), FILTER_SANITIZE_SPECIAL_CHARS));
			$paymentDate = strtotime(filter_var(strip_tags($_POST["paymentDate"]), FILTER_SANITIZE_SPECIAL_CHARS));
			$amountDeposit = intval(filter_var(strip_tags($_POST["amountDeposit"]), FILTER_SANITIZE_SPECIAL_CHARS));

			$checkDeposit = $showDATA->checkPaymentDetails($depositName, $tellerNo, intval($paymentDate), $amountDeposit, $transfName = null, $transfDate = null, $amountTransf = null);
		
			if($checkDeposit == false) {
				echo '<div class="payment-status-msg notverified">
						<span>Not verified</span> <i class="fas fa-ban"></i><br /><br />

						<span>This payment has not been confirmed or the information does not exist in our system. If you have not registered your payment, please log in the correct payment details so you can enable us validate your payment. <br /><br />If you have registered your payment details, please wait for 3 to 24 hours for us to validate your payment or contact our customer care.</span>

						<br />
						<br />
						<br />
						<a href="payment-status"><button type="button">Confirm another payment</button></a>
					</div>';
			} 
			else {
				if(intval($checkDeposit['paid']) == 1) {
					echo '<div class="payment-status-msg confirmed"><span>Payment confirmed</span> <i class="fas fa-check"></i> <br /><br />

						Your payment has been confirmed. You can now start earning when users register through your referrer link. Thank you for chosing Longrich.

						<br />
						<br />
						<br />
						<a href="payment-status"><button type="button">Confirm another payment</button></a>

					</div>';
				}
				
			}

		break;

		case "ctransfer":
			$transfName = filter_var(strip_tags($_POST["transfName"]), FILTER_SANITIZE_SPECIAL_CHARS);
			$transfDate = strtotime(filter_var(strip_tags($_POST["transfDate"]), FILTER_SANITIZE_SPECIAL_CHARS));
			$amountTransf = intval(filter_var(strip_tags($_POST["amountTransf"]), FILTER_SANITIZE_SPECIAL_CHARS));

			
			$checkTransfer = $showDATA->checkPaymentDetails($depositName = null, $tellerNo = null, $paymentDate = null, $amountDeposit = null, $transfName, $transfDate, $amountTransf);


			if($checkTransfer === false) {
				echo '<div class="payment-status-msg notverified">
						<span>Not verified</span> <i class="fas fa-ban"></i><br /><br />

						<span>This transfer has not been confirmed or the information does not exist in our system. If you have not registered your transfer details, please log in the correct transfer details so you can enable us validate your payment. <br /><br /> If you have registered your payment details, please wait for 3 to 24 hours for us to validate your payment or contact our customer care.</span>

						<br />
						<br />
						<br />
						<a href="payment-status"><button type="button">Confirm another payment</button></a>

					</div>';
			} 
			else {
				if(intval($checkTransfer['paid']) === 1) {
					echo '<div class="payment-status-msg confirmed"><span>Payment confirmed</span> <i class="fas fa-check"></i> <br /><br />

						Your transfer has been confirmed. You can now start earning when users register through your referrer link. Thank you for chosing Longrich.
						<br />
						<br />
						<br />
						<a href="payment-status"><button type="button">Confirm another payment</button></a>

						</div>';
				}
			}
		break;
	}

}


?>


