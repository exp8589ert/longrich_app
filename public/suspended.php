<?php
require 'includes/check.php';


	if(!isset($_SESSION['suspended'])) {
		header('location: error');
	}

require 'header.php';
?>

	<div class="suspended">
		<?php echo $_SESSION['errmessage']; ?>
	</div>

<?php require 'x-footer.php'; ?>