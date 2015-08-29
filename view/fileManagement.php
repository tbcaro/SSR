<?php

	$title = "Control Panel";
	require 'headerInclude.php';
?>
<section class="fileManage">
	
	<h1>Control Panel</h1>

	<a href="../controller/controller.php?action=UploadImage">
		<div class = "fileUploadButton">			
			Upload Image
		</div>
	</a>

	<a href="../controller/controller.php?action=UploadNewsletter">
		<div class = "fileUploadButton">		
			Upload Newsletter		
		</div>
	</a>

	<a href="../controller/controller.php?action=UploadQuoteList">
		<div class = "fileUploadButton">	
			Upload Quote List		
		</div>
	</a>

	<a href="../controller/controller.php?action=EmailList">
		<div class = "fileUploadButton">	
			Send Email		
		</div>
	</a>

</section>

<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>