<?php 
require 'includes/check.php';
require 'header.php';
?>


<section class="wrapper p-status-wrapper">
<div class="inner-wrapper">
<br />

<form class="payment-status" autocomplete="off">
	

	<a href="forum" title="Home">
		<img src="resources/images/longrich-icon.png" class="logo" />
	</a>

	<label class="title">PAYMENT VALIDATION &nbsp;<i class="fas fa-lock"></i></label>

	<br />
	<br />

	<span class="desc">
		Paid already? Register your payment details to validate your payment or check the status of your payment. <br />If your payment have been validated, you'll receive an affirmation. If you have paid, but you have not entered your payment details, please enter them for you to enable us confirm your payment.
		(Please enter exact details).
	</span>

	<br />
	<br />

	<div class="tab">
			<label class="cash top-tab enter-pdetails general"><i class="far fa-stop-circle"></i>&nbsp; Register payment details</label>
			<label class="transfer top-tab check-pdetails general"><i class="far fa-stop-circle"></i>&nbsp; Check payment Status</label>
	</div>
	

	<div class="payment-details deposit-d">
	<fieldset>
		<div class="processing">
			<div id="lpspinner"></div>
		</div>

		<span><i class="far fa-edit"></i> Send us your deposit or transfer details for confirmation. The details must match the ones on your deposit slip or transfer account.
		</span>	

		<br />
		<br />

		<div class="tab-two">
			<label class="cash enter-tab general">Enter deposit details</label>
			<label class="transfer enter-tab general">Enter transfer details</label>
		</div>

		<div class="payment-panel cash-deposit enter-details">

			<table>
				<tr>
					<td colspan="2">
						<div class="bug_msg"></div>
					</td>
				</tr>
				<tr>
				<td>
				<label for="depositor">Depositor's name:
				<input type="text" id="depositor" autofocus="autofocus" maxlength="40" placeholder="Enter depositor's name">
				</label>
				</td>
					
				<td>
				<label for="teller-no">Teller No.:
				<input type="number" id="teller-no" placeholder="Enter teller number">
				</label>
				</td>
				</tr>

				<tr>
				<td>
				<label for="payment-date">Payment date:
				<input 
					type="date" 
					id="payment-date" 
					min="2020-07-01"
					max="2100-12-31">
				</label>
				</td>

				<td>
				<label for="amount-paid">Amount paid: <span class="instruct">(Digits only. No comma)</span>
				<input type="number" id="amount-paid" placeholder="Enter amount paid">
				</label>
				</td>

				</tr>

				<tr>
					<td colspan="2">
						<br />
						<button type="submit" class="rdeposit alldeposit">Send deposit details</button>
					</td>
				</tr>

			</table>
			

		</div>

		<div class="payment-panel transfer-payment enter-details">	

			<table>
				<tr>
					<td colspan="2">
						<div class="bug_msg"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
					<label for="account-name">Account name:
					<input type="text" id="account-name" maxlength="40" placeholder="Enter account name">
					</label>
					</td>
				</tr>

				<tr>
					<td>
					<label for="transfer-date">Transfer date:
					<input 
					type="date" 
					id="transfer-date" 
					min="2020-07-01"
					max="2100-12-31">
					</label>
					</td>

					<td>
					<label for="amount-transf">Amount: 
						<span class="instruct">(Digits only. No comma)</span>
					<input type="number" id="amount-transf" placeholder="Enter amount paid">
					</label>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<br />
						<button  type="submit" class="rtransfer alltransfer">Send transfer details</button>
					</td>
				</tr>
			</table>
		

		</div>

	</fieldset>

	</div>


	<div class="payment-details check-p">

	<fieldset>
		<div class="processing">
			<div id="pspinner"></div>
		</div>

		<span><i class="far fa-list-alt"></i> Check cash deposit or transfer status. Enter your transaction details to check the status of your payment.
		</span>	

		<br />
		<br />

		<div class="tab-two">
			<label class="cash confirm general">Deposit status</label>
			<label class="transfer confirm general">Transfer status</label>
		</div>

		<div class="payment-panel confirm cash-deposit">
					

			<table>
				<tr>
					<td colspan="2">
						<div class="bug_msg"></div>
					</td>
				</tr>
				<tr>
				<td>
				<label for="cdepositor">Depositor's name:
				<input type="text" id="cdepositor" autofocus="autofocus" maxlength="40" placeholder="Enter depositor's name">
				</label>
				</td>
					
				<td>
				<label for="cteller-no">Teller No.:
				<input type="number" id="cteller-no" placeholder="Enter teller number">
				</label>
				</td>
				</tr>

				<tr>
				<td>
				<label for="cpayment-date">Payment date:
				<input 
					type="date" 
					id="cpayment-date" 
					min="2020-07-01"
					max="2100-12-31">
				</label>
				</td>

				<td>
				<label for="camount-paid">Amount paid: <span class="instruct">(Digits only. No comma)</span>
				<input type="number" id="camount-paid" placeholder="Enter amount paid">
				</label>
				</td>

				</tr>

				<tr>
					<td colspan="2">
						<br />
						<button type="submit" class="cdeposit alldeposit">Check Deposit Status</button>
					</td>
				</tr>

			</table>
			

		</div>

		<div class="payment-panel confirm transfer-payment">	

			<table>
				<tr>
					<td colspan="2">
						<div class="bug_msg"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
					<label for="caccount-name">Account name:
					<input type="text" id="caccount-name" maxlength="40" placeholder="Enter account name">
					</label>
					</td>
				</tr>

				<tr>
					<td>
					<label for="ctransfer-date">Transfer date:
					<input 
					type="date" 
					id="ctransfer-date" 
					min="2020-07-01"
					max="2100-12-31">
					</label>
					</td>

					<td>
					<label for="camount-transf">Amount: 
						<span class="instruct">(Digits only. No comma)</span>
					<input type="number" id="camount-transf" placeholder="Enter amount paid">
					</label>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<br />
						<button  type="submit" class="ctransfer alltransfer">Check Transfer Status</button>
					</td>
				</tr>
			</table>
		

		</div>

	</fieldset>

	</div>

	<br />
	<br />
	
</form>
		
		<div class="navigation">
				<a href="forum">Home</a>
				<a href="help"><i class="far fa-question-circle"></i> Help</a>
		</div>

	</div>
</section>






<?php include("x-footer.php") ?>