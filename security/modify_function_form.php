<?php
	$title = "Control Panel - Modify Function";
	require '../security/headerInclude.php';
?>
    <h2>Modify Function</h2>

    <section class="securityForm"> 
        <form action="../security/index.php?action=SecurityProcessFunctionAddEdit" method="post">

                <input type="hidden" name="FunctionID" value="<?php echo $id; ?>"/>

                Name:  <input type="text" name="Name" size="20" value="<?php echo $name; ?>" autofocus required  /><br/>
                Description: <input type="text" name="Description" size="20" value="<?php echo $desc; ?>" />

                <br/>

                <input type="submit" value="Submit" />

        </form>
	</section>
<?php
	require '../security/footerInclude.php';
?>
