<?php
	$title = "Control Panel - Add Role";
	require '../security/headerInclude.php';
?>

	<h2>Add Role</h2>
	<section class="securityForm">
		<form action="../security/index.php?action=SecurityProcessRoleAddEdit" method="post">

			Name: <input type="text" name="Name" size="20" value="" autofocus required ><br/>
			Description: <input type="text" name="Description" size="20" value=""><br/>
			<br/>

			<input type="submit" value="Submit" />

		</form>
	</section>
<?php
	require '../security/footerInclude.php';
?>

