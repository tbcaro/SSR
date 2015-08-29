<?php

	$title = "Send Email";
	require 'headerInclude.php';
?>

<section class="heading-sec">
	Send Emails
</section>


<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	/***	DISPLAY ERROR 	***/
	if($isError)
	{
		echo "$message";
	}
	
	/***	DISPLAY SUCCESS W/RECIPIENT LIST 	***/
	else
	{

		echo "<section class='directoryList'> Emails successfully sent to:";
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
	}


	require 'footerInclude.php';
?>