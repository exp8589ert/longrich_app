<footer class="x-footer">
	<div><span class="url">
		<a href="http://localhost:81/longrichs.com">www.longrichs.com</a>
		</span> 
		<?php 
			$dateFmt = new dateTime();
			$Today = date_format($dateFmt, 'd M, Y'); 
			echo $Today;
		?> | @&nbsp; Longrichs.com. All Right Reserved
	</div>
</footer>
<script src="assets/script/script.js"></script>