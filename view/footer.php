<div>
	<div>	
		
		<?php
			
			//Open and read quote list into array
			if($quoteFile = @fopen("../datafile/quotelist.txt","r"))
			{
				//This adds an empty cell to last index of array -> destroys random function
				while(!feof($quoteFile))
				{
					$fileArray[] = fgets($quoteFile);
				}
				

				fclose($quoteFile);

				//Make a new array to eliminate any blank space in first arrray -> inefficient...
				foreach($fileArray as $element)
				{
					if($element != "")
					{
						$quoteArray[] = $element;
					}
				}

				//Test for items in new array

				// for($i = 0; $i < count($quoteArray); $i++)
				// {
				// 	echo "Item $i: $quoteArray[$i] <br/>" ;
				// }


				//Random quote choice
				$randQuote = $quoteArray[array_rand($quoteArray)];

				//Output random quote
				echo "<h4 class='footer-quote'> $randQuote </h4>";
			}
		
			include '../view/navTop.php';
		?>

	</div>

	<div id="footer-feedback">
		<a href="mailto:t.b.caro@eagle.clarion.edu">Site Feedback</a> <br/>
		<br/>
		Snowflake Ski Resort Inc. <br/>
		Phone: (555)-867-5309 <br/>
		911 Oneway Down Rd <br/>
		Countdown, CO 54321
	</div>

	<div id="footer-copyright">
		Copyright &copy; 2015 
		<br/>		
		<?php 
			echo "Last Modified: " . date("dMy | g:i a",$modDate);
		?>		
		<br/>
		<br/>
						
		<a href="http://validator.w3.org"> 
			<img src="../img/html5.png" alt="html5 Validator"> 
		</a>

		<a href="http://validator.w3.org">
			<img src="../img/css3.png" alt="css3 Validator">
		</a>
		<br/>
	</div>
</div>
