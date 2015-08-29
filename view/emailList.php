<?php

	$title = "Mail Newsletter";
	require 'headerInclude.php';
?>

<h1 class="content-center">Mail Newsletter</h1>

<a href="../controller/controller.php?action=SendEmail">
	<div class = "fileUploadButton">	
		Send Email		
	</div>	
</a>

<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	
	/***	DISPLAY SUCCESS W/RECIPIENT LIST 	***/

	echo "<section class='directoryList'> Members subscribed to newsletter:";
	echo "<ul>";

	for($i = 0; $i < count($recipients); $i++)
	{
		if($recipients[$i] != "")
		{
			echo "<li> $recipients[$i] </li>";
		}
	}

	echo "</ul>";
	echo "</section";
	


	require 'footerInclude.php';
?>