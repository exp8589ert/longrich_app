<select name="packlevel" 
		class="reglevel m-level regInput exception requiredv" 
		id="packages">
<option disabled="disabled"></option>
<option data-percent="0" 
		value="0" 
		data-gsales="zero" 
		selected="selected">
		Select Level
</option>
<option data-percent="0.12" 
		data-gsales="0.06"
		<?= ($packLevel === '7,500,000' )? 'selected' : '' ; ?>
		value="7,500,000">
		Senior Stockist&nbsp;&nbsp;- N7,500,000 (15,000pv)&nbsp;&nbsp;
</option>
<option data-percent="0.12" 
		data-gsales="0.04" 
		<?= ($packLevel === '3,500,000' )? 'selected' : '' ; ?>
		value="3,500,000">
		Junior Stockist&nbsp;&nbsp;- N3,500,000 (5,000pv)&nbsp;&nbsp;
</option>
<option data-percent="0.12" 
		data-gsales="0.01" 
		<?= ($packLevel === '750,000' )? 'selected' : '' ; ?>
		value="750,000">
		Platinum VIP&nbsp;&nbsp;- N750,000 (1,680pv)&nbsp;&nbsp;
</option>
<option data-percent="0.12" 
		data-gsales="0" 
		<?= ($packLevel === '320,000' )? 'selected' : '' ; ?>
		value="320,000">
		Platinum&nbsp;&nbsp;- N320,000 (720pv)&nbsp;&nbsp;
</option>
<option data-percent="0.10" 
		data-gsales="0" 
		<?= ($packLevel === '120,000' )? 'selected' : '' ; ?>
		value="120,000">
		Gold&nbsp;&nbsp;- N120,000 (240pv)&nbsp;&nbsp;
</option>
<option data-percent="0.08" 
		data-gsales="0"
		<?= ($packLevel === '75,000' )? 'selected' : '' ; ?> 
		value="75,000">
		Silver&nbsp;&nbsp;- N75,000 (120pv)&nbsp;&nbsp;
</option>
<option data-percent="0.08" 
		data-gsales="0" 
		<?= ($packLevel === '40,000' )? 'selected' : '' ; ?>
		value="40,000">
		Q-Silver&nbsp;&nbsp;- N40,000 (60pv)&nbsp;&nbsp;
</option>
<option disabled="disabled"></option>
</select>
