<?php

	$title = "About";
	require 'headerInclude.php';

    date_default_timezone_set("America/New_York");
    $modDate = getlastmod();
?>

	<section class="content-largefont">
        Snowflake Ski Resort Inc. <br/>
        Phone: (555)-867-5309 <br/>
        911 Oneway Down Rd <br/>
        Countdown, CO 54321
    </section>
    <section id="map-view">
        
    </section>
    <section class = "content-center">
        Developed by: <a href="mailto:t.b.caro@eagle.clarion.edu">Travis Caro</a>
        <br/>
        Last Update:

        <?php 
            echo date("F jS, Y",$modDate);
        ?>
    </section>
    <section class = "content-center">
        <a href="../controller/controller.php?action=Ideas">Inspiration</a>
    </section>
    <section class = "content-center">
        <a href="../controller/controller.php?action=Gradesheet">Grade Sheet</a>
    </section>

<?php
    //Mod date in header

    // date_default_timezone_set("America/New_York");
    // $modDate = getlastmod();

	require 'footerInclude.php';
?>