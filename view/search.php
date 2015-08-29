<?php

	$title = "Search";
	require 'headerInclude.php';
?>

	<h1 class="content-center">Search</h1>


	<div class="searchForm">
		
		<div id="searchIcon">
			<img src="../img/searchIcon.png" alt="search Icon" />
		</div>
		<input id="searchBox" type="text" placeholder="Search..." />
		<br/>
		<br/>
		<div class="content-center">
			<select id="dropSearch">
				<option value="null"> -- Select -- </option>
				<option value="Season Pass"> Season Pass </option>
				<option value="Late Pass"> Late Pass </option>
				<option value="Weekly Ski"> Weekly Ski </option>
			</select>
		</div>

		<a>
			<div id="searchButton" class = "fileUploadButton">	
				View Current Members Only		
			</div>	
		</a>
		
	</div>

	<script>


		//Event Handlers
	  	$("#searchIcon").click(

	        function()
	        {
	            textSearch();
	        }

	    );

	    $("#dropSearch").change(

	    	function()
	    	{
	    		selectSearch();
	    	}

    	);

	    $("#searchBox").keypress(

	    	function(event)
	    	{
	    		if(event.which == 13)
	    		{
	    			textSearch();
	    		}
	    	}
		);

	    $("#searchButton").click(

	        function()
	        {
	            buttonSearch();
	        }

	    );

		//action=SearchMembers&searchType=???&checkbox=true&criteria=???
		//Functions
	    function textSearch()
	    {
	    	var criteria = getSearch();

	    	document.location = '../controller/controller.php?action=SearchMembers&searchType=text&criteria=' + criteria;

	    }

	    function selectSearch()
	    {
	    	var criteria = determineDropSelect();

	    	document.location = '../controller/controller.php?action=SearchMembers&searchType=select&criteria=' + criteria;
	    }

	    function buttonSearch()
	    {
	    	document.location = '../controller/controller.php?action=SearchMembers&searchType=button&criteria=';
	    }

	    //Getters
	    function determineDropSelect()
	    {
	    	return $("#dropSearch").val();
	    }

	    function getSearch()
	    {
	    	return $("#searchBox").val();
	    }

	</script>


<?php
	date_default_timezone_set("America/New_York");
	$modDate = getlastmod();

	require 'footerInclude.php';
?>