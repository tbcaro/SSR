<!--
Title: Navigation
Author: Travis Caro
Course: CIS 370
Description: Make modular navigation to be universally loaded into all pages
-->
        
<ul>
    <li><a href="../controller/controller.php?action=Home">Home</a></li>








    <?php if(userIsAuthorized("Rates")) { ?>

    <li><a href="../controller/controller.php?action=Rates">Rates</a></li>

    <?php } ?>







    <li><a href="../controller/controller.php?action=UnderConstruction">Events <img alt="dropdown icon" src="../img/drop-icon.png" /></a>
        <ul>
            <li><a href="../controller/controller.php?action=UnderConstruction">Featured Events</a></li>
            <li><a href="../controller/controller.php?action=UnderConstruction">Event Calendar</a></li>            
        </ul>    
    </li>









    <li><a href="../controller/controller.php?action=Newsletter">Newsletter <img alt="dropdown icon" src="../img/drop-icon.png" /></a>
        <ul>
            <li><a href="../controller/controller.php?action=Subscribe">Subscribe</a></li>
        </ul>
    </li>











        <?php 

            if( userIsAuthorized("ControlPanel") || userIsAuthorized("Members") || userIsAuthorized("SearchPage") ||
                userIsAuthorized("AddMember") || userIsAuthorized("UploadImage") || userIsAuthorized("UploadNewsletter") ||
                userIsAuthorized("UploadQuoteList") || userIsAuthorized("EmailList")
                ) 
            { 
        ?>
        
        <li><a href="../controller/controller.php?action=ControlPanel">Admin <img alt="dropdown icon" 
        src="../img/drop-icon.png" /></a>
            <ul>
            

            <?php 
                if(userIsAuthorized("Members")) 
                {
            ?>   

                <li><a href="../controller/controller.php?action=Members">Members 

                    <?php 
                        if(userIsAuthorized("SearchPage")) 
                        {
                    ?>
                        <img alt="flyout icon" src="../img/flyout-icon.png" /></a>
                        <ul>
                            <li><a href="../controller/controller.php?action=SearchPage">Search</a></li>
                        </ul>

                    <?php } ?>
                    
                </li>


            <?php
                } 
                if(userIsAuthorized("AddMember")) 
                {
            ?>
        

                <li><a href="../controller/controller.php?action=AddMember">Add Member</a></li>
                
            <?php
                } 
                if(userIsAuthorized("UploadImage")) 
                {
            ?>

                <li><a href="../controller/controller.php?action=UploadImage">Upload Image</a></li>

            <?php
                } 
                if(userIsAuthorized("UploadNewsletter")) 
                {
            ?>

                <li><a href="../controller/controller.php?action=UploadNewsletter">Upload Newsletter</a></li> 

            <?php
                } 
                if(userIsAuthorized("UploadQuoteList")) 
                {
            ?>

                <li><a href="../controller/controller.php?action=UploadQuoteList">Upload Quote List</a></li> 
        
            <?php
                } 
                if(userIsAuthorized("EmailList")) 
                {
            ?>     
                  
                <li><a href="../controller/controller.php?action=EmailList">Email List</a></li>

       
            <?php } ?>

            </ul>
        </li>

         <?php } ?>  




    <?php if(   userIsAuthorized("SecurityManageUsers") || 
                userIsAuthorized("SecurityManageFunctions") || 
                userIsAuthorized("SecurityManageRoles")) 
            {
    ?>

    <li><a href="../security/index.php">Security</a></li>

    <?php } ?>






    <li><a href="../controller/controller.php?action=About">Help <img alt="dropdown icon" src="../img/drop-icon.png" /></a>
        <ul>
            <li><a href="../controller/controller.php?action=About">About</a></li>
            <li><a href="../controller/controller.php?action=Ideas">Ideas</a></li>
            <li><a href="../controller/controller.php?action=Gradesheet">Grade Sheet</a></li>
        </ul>
    </li>








    <li>
        <?php
            if (!loggedIn()) 
            {
                echo "<a href='../security/index.php?action=SecurityLogin&RequestedPage=" . urlencode($_SERVER['REQUEST_URI']) . "'>Login </a>";
            }
            else 
            {
                echo "<a href='../security/index.php?action=SecurityLogOut&RequestedPage=" . urlencode($_SERVER['REQUEST_URI']) . "'>Logout ( " . $_SESSION['UserName'] . " ) </a>";
            }
        ?>
    </li>




</ul>

