<?php

	$title = "Error";
	require 'headerInclude.php';
?>

<section class = "pad-10">
	<section class="content-center">
		
	<?php
		
		echo "Error Detected: <br/><br/> $errorMessage";

	?>

	</section>
</section>

<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>