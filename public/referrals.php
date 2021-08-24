<select onclick="$(this).css({
'border':'1.1px solid #9dc1e3',
'webkit-box-shadow':'0px 0px 3px 0px rgba(75,140,204,1)',
'box-shadow':'0px 0px 3px 0px rgba(75,140,204,1)',
'moz-boz-shadow':'0px 0px 3px 0px rgba(75,140,204,1)'
});

" onmouseout="$(this).css({
'border':'1.1px solid #b4b4b4',
'box-shadow':'none'
});" name="packlevels" class="m-level" id="referrals">
	
	<option disabled="disabled"></option>
	
	<option data-refval="0" value="" selected="selected">
	Select Referral Level
	</option>

	<option data-refval="15000" value="7,500,000">
	Senior Stockist&nbsp;&nbsp;- 15,000PV
	</option>

	<option data-refval="10000" value="3,500,000">
	Junior Stockist&nbsp;&nbsp;- 10,000PV
	</option>

	<option data-refval="1680" value="750,000">
	Platinum VIP&nbsp;&nbsp;- 1,680PV
	</option>
	
	<option data-refval="720" value="320,000">
	Platinum&nbsp;&nbsp;- 720PV
	</option>

	<option data-refval="240" value="120,000">
	Gold&nbsp;&nbsp;- 240PV
	</option>

	<option data-refval="120" value="75,000">
	Silver&nbsp;&nbsp;- 120PV
	</option>

	<option data-refval="60" value="40,000">
	Q-Silver&nbsp;&nbsp;- 60PV
	</option>

	<option data-percentage="0" value="9,800">
	Starter Combo&nbsp;&nbsp;- N9,800
	</option>

	<option disabled="disabled"></option>
</select>
