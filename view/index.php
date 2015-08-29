<?php
	
	$title = "Home Page";
	require 'headerInclude.php';
?>

	<section id="home-head">
	    <img alt="logo" src="../img/logo.png" />
	</section>    
	<section>
	    <img src="../img/welcome.jpg" alt="ski-lift" />                    
	</section>
	<section class="innercontent"> 
	    <div class="content-largefont">
	        <span class="quote">"Snowflake Ski Resort - Chilled fun!"</span>
	        <br/>                    
	        <a href="../controller/controller.php?action=AddMember">Become a member today!</a>
	    </div>
	</section>

<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();	

	require 'footerInclude.php';
?>
