<?php

	$title = "Image Process";
	require 'headerInclude.php';
?>

<section class = "pad-10">
	<section class="content-center">

		<?php 
			
			echo "$message";

			//Display current directory 			
			echo "<ul>";

			foreach($fileList as $file)
			{
				echo "<li>$file</li>";
			}

			echo "</ul>";

		?>

	</section>
</section>

<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>