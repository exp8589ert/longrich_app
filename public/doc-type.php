<select name="govdocument" 
		id="govDocId" 
		class="arrows exception document-type regInput">
	<option disabled="disabled"></option>
	<option value="0" selected="selected">Select Document </option>
	<option <?= ($docType === 'Voter\'s Card' || $_SESSION['userDocType'] === 'Voter\'s Card')? 'selected' : '' ?> >Voter's Card</option>
	<option <?= ($docType === 'Driver\'s Licence' || $_SESSION['userDocType'] === 'Driver\'s Licence')? 'selected' : '' ?> >Driver's Licence</option>
	<option <?= ($docType === 'National ID' || $_SESSION['userDocType'] === 'National ID')? 'selected' : '' ?> >National ID</option>
	<option <?= ($docType === 'International Passport' || $_SESSION['userDocType'] === 'International Passport')? 'selected' : '' ?> >International Passport</option>
	<option disabled="disabled"></option>
</select>

