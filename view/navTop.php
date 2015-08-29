<!--
Title: Navigation
Author: Travis Caro
Course: CIS 370
Description: Make modular navigation to be universally loaded into all pages
-->
<ul>
    <li><a href="../controller/controller.php?action=Home">Home</a> | </li>
    <li><a href="../controller/controller.php?action=Rates">Rates</a> | </li>
    <li><a href="../controller/controller.php?action=UnderConstruction">Events</a> | </li>
    <li><a href="../controller/controller.php?action=Newsletter">Newsletter</a> | </li>
    
    <?php 

        if( userIsAuthorized("ControlPanel") || userIsAuthorized("Members") || userIsAuthorized("SearchPage") ||
            userIsAuthorized("AddMember") || userIsAuthorized("UploadImage") || userIsAuthorized("UploadNewsletter") ||
            userIsAuthorized("UploadQuoteList") || userIsAuthorized("EmailList")
            ) 
        { 
    ?>
    
    	<li><a href="../controller/controller.php?action=ControlPanel">Admin</a> | </li>

    <?php } ?>


    <?php

	 	if(   userIsAuthorized("SecurityManageUsers") || 
                userIsAuthorized("SecurityManageFunctions") || 
                userIsAuthorized("SecurityManageRoles")) 
        {
    ?>
   	
   		<li><a href="../security/index.php">Security</a> | </li>

	<?php } ?>


    <li><a href="../controller/controller.php?action=About">Help</a></li>
</ul>
