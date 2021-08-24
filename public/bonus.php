<select onclick="$(this).css({
'border':'1.1px solid #9dc1e3',
'webkit-box-shadow':'0px 0px 3px 0px rgba(75,140,204,1)',
'box-shadow':'0px 0px 3px 0px rgba(75,140,204,1)',
'moz-boz-shadow':'0px 0px 3px 0px rgba(75,140,204,1)'
});
" onmouseout="$(this).css({
'border':'1.1px solid #b4b4b4',
'box-shadow':'none'
});" name="bonus-type" class="bonus-type" id="bonus-type">
	
<option disabled="disabled"></option>
<option data-bonus="zero" value="0" 
		selected="selected">Select Bonus type</option>
<option data-bonus="addall" value="1">All Bonuses (PB, DB, LB & RB)</option>
<option data-bonus="perform" value="2">Performance Bonus Only</option>
<option data-bonus="develop" value="3">Development Bonus Only</option>
<option data-bonus="leader" value="4">Leadership Bonus Only</option>
<option data-bonus="retail" value="5">Retail/Maintenance Bonus Only</option>
<option disabled="disabled"></option>
</select>
