<?php

	$title = "Quote List Upload";
	require 'headerInclude.php';
?>

<section class="content-center">

	<form enctype="multipart/form-data" action="../controller/controller.php?action=ProcessQuoteListUpload" method="post">
		<h4>Quote List Upload:</h4>		
		<br/>
		<input type="file" name="userfile" />
		<input type="submit" value="Submit" />
		<br/>
		<br />
	</form>

	<h3>Current Directory</h3>
	<section class="directoryList">
		<?php
			
			echo "<ul>";

			foreach($fileList as $file)
			{
				echo "<li>$file</li>";
			}

			echo "</ul>";
			
		?>					
	</section>

	<p>
		<a href="../controller/controller.php?action=ViewCurQuoteList">View Current Quote List</a>
	</p>
	
</section>


<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>