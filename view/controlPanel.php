<?php

	$title = "Control Panel";
	require 'headerInclude.php';
?>
<section class="fileManage">
	
	<h1>Control Panel</h1>

	<?php  

		if (userIsAuthorized("Members"))
		{
	?>
	<a href="../controller/controller.php?action=Members">
		<div class = "fileUploadButton">	
			Members		
		</div>
	</a>
	<?php
		
		}
		
		if (userIsAuthorized("AddMember"))
		{
	?>
	<a href="../controller/controller.php?action=AddMember">
		<div class = "fileUploadButton">	
			Add Member		
		</div>
	</a>
	<?php
		
		}
		
		if (userIsAuthorized("UploadImage"))
		{
	?>
	<a href="../controller/controller.php?action=UploadImage">
		<div class = "fileUploadButton">			
			Upload Image
		</div>
	</a>
	<?php
		
		}
		
		if (userIsAuthorized("UploadNewsletter"))
		{
	?>
	<a href="../controller/controller.php?action=UploadNewsletter">
		<div class = "fileUploadButton">		
			Upload Newsletter		
		</div>
	</a>
	<?php
		
		}
		
		if (userIsAuthorized("UploadQuoteList"))
		{
	?>
	<a href="../controller/controller.php?action=UploadQuoteList">
		<div class = "fileUploadButton">	
			Upload Quote List		
		</div>
	</a>
	<?php
		
		}
		
		if (userIsAuthorized("EmailList"))
		{
	?>
	<a href="../controller/controller.php?action=EmailList">
		<div class = "fileUploadButton">	
			Email List		
		</div>
	</a>
	<?php		
		}
	?>
</section>

<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>