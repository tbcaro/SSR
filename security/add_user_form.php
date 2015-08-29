<?php
	$title = "Control Panel - Add User";
	require '../security/headerInclude.php';
?>


<script>

//AJAX Demo    


function checkUserNames(submit)
{


    $.getJSON("../security/index.php",
        { 
            action: "SecurityCheckNameExists", 
            userName: $("#UserName").val() 
        },
        
        function(jsonReturned)
        {
            if(jsonReturned.dupFound == true)
            {
                alert("That username is already in use.");
                $("#UserName").select();
            }
            else if(submit)
            {
                $("#AddForm").submit();
            }   

        }

        );


}


</script>

    <h1>Add User</h1>
    <section class="securityForm">   
        <form id="AddForm" action="../security/index.php?action=SecurityProcessUserAddEdit" method="post">

            First Name*: <input type="text" name="FirstName" size="20" value="" autofocus required ><br/>

            Last Name*: <input type="text" name="LastName" size="20" value=""><br/>

            User Name*: <input type="text" name="UserName" id="UserName" onchange="checkUserNames(false)" size="20" value="" required ><br/>

            Password*: <input type="password" name="Password" size="20" value=""><br/>

            Email*: <input type="text" name="Email" size="20" value=""><br/>

            <br/>

            <input type="button" value="Submit" onclick="checkUserNames(true)" />

        </form>
    </section>
<?php
	require '../security/footerInclude.php';
?>
