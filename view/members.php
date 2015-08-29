<?php

	$title = "Members";
	require 'headerInclude.php';
?>

<div class="innercontent">

	<?php 

		if(isset($_GET['delete']))
		{
			echo "<div class='content-center'>";
			echo "Delete Successful!";
			echo "</div>";
		}
	?>
	
	<h1 class="content-center">Memberlist</h1>
	
	<a href="../controller/controller.php?action=SearchPage">
		<div class = "searchButton">	
			Search		
		</div>	
	</a>


	<div class="rowFoundLabel">
		<?php echo "$rowCount row(s) found:"; ?>
	</div>

	<table id="member-table">
		<tr class="headRow">
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Ski Package</th>
			<th>Resort Credit</th>
			<th>Member Since</th>
			<th>Current Member</th>
		</tr>

		<!-- Creates rows for every member in table -->
		<?php 

			$i = 0;
			foreach($results as $row){ 
				$i++;
				
		?>
		<a href="../controller/controller.php?action=Home">
			<tr class= <?php echo ($i % 2 == 0) ? '"evenRow"' : '"oddRow"';  ?>>
				<td class="left"> 
					<a href="../controller/controller.php?action=DetailView&memberID=<?php echo $row['memberID'];?>">					
						<?php echo htmlspecialchars($row['firstName']); ?>
					</a>
				</td>
				<td class="left"><?php echo htmlspecialchars($row['lastName']); ?></td>
				<td class="left"><?php echo htmlspecialchars($row['email']); ?> </td>
				<td class="center"><?php echo htmlspecialchars($row['package']); ?> </td>
				<td class="right"><?php echo htmlspecialchars(toDisplayCurrency($row['resortCredit'])); ?> </td>
				<td class="center"><?php echo htmlspecialchars(toDisplayDate($row['membershipStartDate'])); ?> </td>
				<td class="center"><?php echo htmlspecialchars(toDisplayYesNo($row['currentMember'])); ?> </td>
			</tr>
		</a>

		<?php } ?>


	</table>

</div>

<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>