<?php

	$title = "Newsletter";
	require 'headerInclude.php';


    require '../view/newsletter/newsletter.html';
?>

<div class="news-article">
	<a href="../controller/controller.php?action=Subscribe"> Subscribe </a> to our Newsletter		
</div>

<?php
    date_default_timezone_set("America/New_York");
    $modDate = getlastmod();

	require 'footerInclude.php';
?>