<?php

	$title = "Unsubscribe";
	require 'headerInclude.php';
?>

<section class="heading-sec">
	Subscribe to Newsletter
</section>

<section class="subscribeForm">
	<form enctype="multipart/form-data" action="../controller/controller.php?action=UnsubscribeProcess" method="post">
		Email: 			<input type="text" name="email" required/>
		<br/>
		<br/>
		<input type="submit" value="Unsubscribe">
	</form>
</section>	


<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>