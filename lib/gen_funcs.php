<?php 

	function toDisplayDate($date)
	{
		if($phpDate = strtotime($date))
		{
			return date("m/d/Y",$phpDate);
		}
		else
		{
			return "";
		}
	}

	function toDisplayCurrency($number)
	{
		
		if($money = "$" . number_format($number,2))
		{
			return $money;
		}
		else
		{
			return "";
		}
		
	}

	function toDisplayYesNo($yesno)
	{
		if($yesno == "y")
		{
			return "Yes";
		}
		elseif($yesno == "n")
		{
			return "No";
		}
		else
		{
			return "";
		}
	}

	function toMySqlDate($date)
	{
		if($phpDate = strtotime($date))
		{
			return date("Y-m-d",$phpDate);
		}
		else
		{
			return "";
		}
	}

 ?>