<?php

	$title = "Under Construction";
	require 'headerInclude.php';
?>

	<section class="under-construction">
        <img alt="under-construction" src="../img/under-construction-shovel.gif" />
        <br>                    
        <h1>Under Construction</h1>
    </section>

<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>