<?php

	$title = "$mode Member";
	require 'headerInclude.php';
?>

<div class="detailView">

	<h1 class="content-center">
		<?php echo $mode; ?> Member
	</h1>

	<form id="memberForm" action="../controller/controller.php?action=ProcessAddMember" method="Post">

		<input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>">
		<input type="hidden" name="memberID" id="memberID" value="<?php echo $memberID; ?>">

		<div class="formRow">
			<div class="content-center">
				Required Fields = <span class="reqfield">*</span>
			</div>
		</div>
		<div class="formRow">
			<label for="firstName">First Name: <span class="reqfield">*</span></label>
			<input type="text" name="firstName" id="firstName" maxlength="20" value="<?php echo htmlspecialchars($firstName); ?>" required autofocus/>
		</div>

		<div class="formRow">	
			<label for="lastName">Last Name: <span class="reqfield">*</span></label>  
			<input type="text" name="lastName" id="lastName" maxlength="20" value="<?php echo htmlspecialchars($lastName); ?>" required />
		</div>
			
		<div class="formRow">
			<label for="email">Email: <span class="reqfield">*</span></label>
			<input type="email" name="email" id="email" maxlength="30" value="<?php echo htmlspecialchars($email); ?>" required />
		</div>
			
		<div class="formRow">
			<label>Package: <span class="reqfield">*</span></label>
			<select name="package" id="package" required>
				<option <?php if($package=="") {echo "selected";}?> value=""> -- Select -- </option>
				<option <?php if($package=="Season Pass") {echo "selected";}?> value="Season Pass"> Season Pass </option>
				<option <?php if($package=="Late Pass") {echo "selected";}?> value="Late Pass"> Late Pass </option>
				<option <?php if($package=="Weekly Ski") {echo "selected";}?> value="Weekly Ski"> Weekly Ski </option>
			</select>
		</div>
			
		<div class="formRow">
			<label for="resortCredit">Resort Credit:</label>
			<input type="number" name="resortCredit" id="resortCredit" min="0" max="1000000" step="0.01" value="<?php echo htmlspecialchars($resortCredit); ?>" />
		</div>
			
		<div class="formRow">
			<label for="memberSince">Member Since: <span class="reqfield">*</span></label>
			<input type="date" name="memberSince" id="memberSince" required value="<?php echo htmlspecialchars(toMySqlDate($memberSince)); ?>" />
		</div>
			
		<div class="formRow">
			<label for="currentMember">Current Member:</label>
			<input type="checkbox" name="currentMember" id="currentMember" <?php if($currentMember=="y"){echo "checked";} ?> />
		</div>

		<div class="formRow">
			<input type="submit" name="submitButton" value="Submit" class="formSubmit" />
		</div>

	</form>


</div>

<script>
	
	<?php
		if(!empty($errors))
		{
			echo "alert('Following Errors Detected: $errors');";
			echo 'setTimeout( function(){$("#firstName").focus();} , 2 );';
		}
	?>

</script>



<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>