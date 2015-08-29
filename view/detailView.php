<?php

	$title = "Detail View";
	require 'headerInclude.php';
?>

<div class="detailView">

	<h1 class="content-center"><?php echo htmlspecialchars($results['firstName']) . " " . htmlspecialchars($results['lastName']); ?></h1>


	<div class="formRow">
		<label>First Name: </label>
		<?php echo htmlspecialchars($results['firstName']);  ?>
	</div>

	<div class="formRow">	
		<label>Last Name: </label>  
		<?php echo htmlspecialchars($results['lastName']);  ?>
	</div>
		
	<div class="formRow">
		<label>Email: </label>
		<?php echo htmlspecialchars($results['email']);  ?>
	</div>
		
	<div class="formRow">
		<label>Package: </label>
		<?php echo htmlspecialchars($results['package']);  ?>
	</div>
		
	<div class="formRow">
		<label>Resort Credit: </label>
		<?php echo htmlspecialchars(toDisplayCurrency($results['resortCredit']));  ?>
	</div>
		
	<div class="formRow">
		<label>Member Since: </label>
		<?php echo htmlspecialchars(toDisplayDate($results['membershipStartDate']));  ?>
	</div>
		
	<div class="formRow">
		<label>Current Member: </label>
		<?php echo htmlspecialchars(toDisplayYesNo($results['currentMember']));  ?>
	</div>

	<div class="buttonPanel">
	<?php  

		if (userIsAuthorized("EditMember"))
		{
	?>
		<a href="../controller/controller.php?action=EditMember&memberID=<?php echo $results['memberID']; ?>">
			<div id="editButton">
				Edit
			</div>
		</a>
	<?php
		
		}
		
		if (userIsAuthorized("DeleteMember"))
		{
	?>
		<a href="#">
			<div id="deleteButton">
				Delete
			</div>
		</a>
	<?php
		}
	?>
		
		<div class="clearable"></div>

	</div>

</div>

<script type="text/javascript">

	$('#deleteButton').click(

		function()
		{
			confirmDelete();
		}

	)	

	function confirmDelete()
	{
		var confirmation = confirm("Are you sure you would like to delete this member?");

		if(confirmation==true)
		{
			document.location = "../controller/controller.php?action=DeleteMember&memberID=<?php echo $results['memberID']; ?>"
		}

	}

//"../controller/controller.php?action=DeleteMember&memberID=<?php echo $results['memberID']; ?>"

</script>

<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>