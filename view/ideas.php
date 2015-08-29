<?php

	$title = "Ideas";
	require 'headerInclude.php';
?>
	
	<section class="heading-sec">
        Site Inspiration
    </section>
    <section class="content-inspiration">
        <a href="http://www.7springs.com/">Seven Springs</a>
         
        <br/>

        <section class="inspiration-container">
            <img src="../img/seven-springs.jpg" alt="Seven Springs" />
        </section>
    </section>
    <section class="content-inspiration">
        <a href="http://www.northernlightinnovation.com/">Northern Light Innovation</a>
        
        <br/>

        <section class="inspiration-container">
            <img src="../img/northern-light-innovation.jpg" alt="Northern Light Innovation" />
        </section>
    </section>
    <section class="content-inspiration">
        <a href="http://line25.com/tutorials/how-to-create-a-pure-css-dropdown-menu">Line-25</a>
        
        <br/>

        <section class="inspiration-container">
            <img src="../img/line-25.jpg" alt="Line 25" />
        </section>
    </section>


<?php
    date_default_timezone_set("America/New_York");
    $modDate = getlastmod();

	require 'footerInclude.php';
?>