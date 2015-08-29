<?php

	$title = "Unubscribe Process";
	require 'headerInclude.php';
?>

<section class = "pad-10">
	<section class="content-center">
		
	<?php
		
		echo "$message";

	?>

	</section>
</section>



<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>