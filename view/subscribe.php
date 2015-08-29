<?php

	$title = "Subscribe";
	require 'headerInclude.php';
?>

<section class="heading-sec">
	Subscribe to Newsletter
</section>

<section class="subscribeForm">
	<form enctype="multipart/form-data" action="../controller/controller.php?action=ProcessSubscribe" method="post">
		First Name: 	<input type="text" name="fname" required/>
		<br/>
		Last Name:		<input type="text" name="lname" required/>
		<br/>
		Email: 			<input type="text" name="email" required/>
		<br/>
		<br/>
		<input type="submit" value="Subscribe">
	</form>
</section>	

<section class="content-center">
	<a href="../controller/controller.php?action=Unsubscribe">Unsubscribe</a> from SSR Newsletter
</section>


<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>