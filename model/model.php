<?php
	
	function addFileUpload($userUpload)
	{
		$success = false;

		if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $userUpload))
		{
			$success = true;
		}

		return $success;
	}

	function addNewMember($fname,$lname,$email)
	{
		$memberinfo = array($fname,$lname,$email);

		$success = false;

		$memberList = fopen("../datafile/memberlist.csv","ab");
		if(fputcsv($memberList,$memberinfo))
		{
			$success = true;
		}

		fclose($memberList);

		return $success;
	}

	function buttonSearch()
	{
		try
		{
			$connection = connectToDB();
			$query = "SELECT * FROM members
						WHERE currentMember = 'y' ORDER BY firstName";

			//Load query
			$statement = $connection->prepare($query);

			//Execute query
			$statement->execute();

			//Array of records
			$results = $statement->fetchAll();

			$statement->closeCursor();
			return $results;
		}
		catch (PDOException $ex)
		{
			$errorMessage = $ex->getMessage();
			include "../view/errorPage.php";
			die;
		}
	}

	function connectToDB()
	{
		$dsn = "mysql:host=localhost;dbname=s_tbcaro_ssr;";
		
		$username = "s_tbcaro";
		$password = "Eagle370";


		try
		{
			$connection = new PDO($dsn,$username,$password);
		}
		catch(PDOException $ex)
		{
			$errorMessage = $ex->getMessage();
			include "../view/errorPage.php";
			die;
		}

		return $connection;
	}

	function deleteMemberDB($memberID)
	{
		$connection = connectToDB();
		$query = "	DELETE FROM members
						WHERE memberID = :memberID";

		//Load query
		$statement = $connection->prepare($query);

		$statement->bindValue(':memberID',$memberID);

		//Execute query
		$success = $statement->execute();

		$statement->closeCursor();

		if($success)
		{	
			return $statement->rowCount();
		}
		else
		{
			//Call log error info to generate and display error message...normally this would
			//logged into a file for admin use
			logSQLError($statement->errorInfo());
		}
	}

	function getAllMembers()
	{
		try
		{
			$connection = connectToDB();
			$query = "SELECT * 
						FROM members ORDER BY firstName";

			//Load query
			$statement = $connection->prepare($query);

			//Execute query
			$statement->execute();

			//Array of records
			$results = $statement->fetchAll();

			$statement->closeCursor();
			return $results;
		}
		catch (PDOException $ex)
		{
			$errorMessage = $ex->getMessage();
			include "../view/errorPage.php";
			die;
		}
	}

	function getMember($memberID)
	{
		try
		{
			$connection = connectToDB();
			$query = "SELECT * FROM members
						WHERE memberID = :memberID";

			//Load query
			$statement = $connection->prepare($query);
			$statement->bindValue(':memberID',$memberID);

			//Execute query
			$statement->execute();

			//Array of records
			$results = $statement->fetch();

			$statement->closeCursor();
			return $results;
		}
		catch (PDOException $ex)
		{
			$errorMessage = $ex->getMessage(); 
			include "../view/errorPage.php";
			die;
		}
	}

	function getCurMembers()
	{
		//Read file of current members into an array
		$curMembers = array();

		$handle = fopen("../datafile/memberlist.csv","r");

		while(!feof($handle))
		{
			$temparr = fgetcsv($handle);
			$curMembers[] = $temparr;
		}

		fclose($handle);

		return $curMembers;
	}


	function getImageUpload()
	{
		$userUpload = "../img/headerimg/" . $_FILES["userfile"]["name"];
		return $userUpload;
	}

	function getNewsletterMessage()
	{
		$newsletter = file("../view/newsletter/newsletter.html");
		return $newsletter;
	}

	function getNewsletterUpload()
	{
		$userUpload = "../view/newsletter/newsletter.html";
		return $userUpload;
	}

	function getQuoteListUpload()
	{
		$userUpload = "../datafile/quotelist.txt";
		return $userUpload;
	}

	function getRecipients()
	{
		
		/***	GATHER RECIPIENTS	***/
		$recipients = array();

		$handle = fopen("../datafile/memberlist.csv","r");

		while(!feof($handle))
		{
			//Get the record of each member
			$member = fgetcsv($handle);

			//For each member, place their email in recipients array
			$recipients[] = $member[2]; 
		}

		fclose($handle);

		return $recipients;
	}

	function insertMember($firstName, $lastName, $email, $package, $resortCredit, $memberSince, $currentMember)
	{
	
		$connection = connectToDB();
		$query = "INSERT INTO members (firstName, lastName, email, package, resortCredit, membershipStartDate, currentMember)
					VALUES (:firstName, :lastName, :email, :package, :resortCredit, :memberSince, :currentMember)";

		//Load query
		$statement = $connection->prepare($query);

		$statement->bindValue(':firstName',$firstName);
		$statement->bindValue(':lastName',$lastName);
		$statement->bindValue(':email',$email);
		$statement->bindValue(':package',$package);
		$statement->bindValue(':resortCredit',$resortCredit);
		$statement->bindValue(':memberSince',toMySqlDate($memberSince));
		$statement->bindValue(':currentMember',$currentMember);

		//Execute query
		$success = $statement->execute();

		$statement->closeCursor();

		if($success)
		{	
			//Get newly generated ID in database for member
			$memberID = $connection->lastInsertId();
			return $memberID;
		}
		else
		{
			//Call log error info to generate and display error message...normally this would
			//logged into a file for admin use
			logSQLError($statement->errorInfo());
		}
	}

	function listImages()
	{
		$current_dir = "../img/headerimg";
		$dir = opendir($current_dir);

		while(($file = readdir($dir)) !== false)
		{
			if($file != "." && $file != "..")
			{
				$fileList[] = $file;
			}
		}

		closedir($dir);

		return $fileList;
	}

	function listNewsletter()
	{
		$current_dir = "../view/newsletter";
		$dir = opendir($current_dir); 


		while(($file = readdir($dir)) !== false)
		{
			if($file != "." && $file != "..")
			{
				$fileList[] = $file;;
			}
		}

		closedir($dir);

		return $fileList;
	}

	function listQuoteList()
	{
		$current_dir = "../datafile";
		$dir = opendir($current_dir); 


		while(($file = readdir($dir)) !== false)
		{
			if($file != "." && $file != "..")
			{
				$fileList[] = $file;;
			}
		}

		closedir($dir);

		return $fileList;
	}

	function logSQLError($error)
	{
		$errorMessage = $error[2];

		include '../view/errorPage.php';
	}
	
	function removeMember($email)
	{
		//Make a handle for original file to read through for email and a handle for a temp file to write to and skip the email that wishes to unsubscribe
		$origMemberList = fopen("../datafile/memberlist.csv","r");
		$tempMemberList = fopen("../datafile/tempmemberlist.csv","w");

		//Assume that the email hasn't been removed (i.e. not in file) ... haven't read file yet
		$emailRemoved = False;

		//Read through original file
		while (!feof($origMemberList)) 
		{
			//Get each member one line at a time
			$memberinfo = fgetcsv($origMemberList);

			//If member is not the member that wants removed, then add them to the new list
			if($email != $memberinfo[2])
			{
				//For when memberinfo is returned false
				if($memberinfo != false)
				{
					fputcsv($tempMemberList,$memberinfo);
				}
			}
			else
			{
				//Email was found and removed
				$emailRemoved = True;
			}
		}

		//Then close up files
		fclose($origMemberList);
		fclose($tempMemberList);

		//Rename the temp file to the original name so that it replaces the old list
		rename("../datafile/tempmemberlist.csv","../datafile/memberlist.csv");

		return $emailRemoved;
	}

	function selectSearch($criteria)
	{
		try
		{
			$connection = connectToDB();
			$query = "SELECT * FROM members
						WHERE package LIKE :package ORDER BY package";

			//Load query
			$statement = $connection->prepare($query);
			$statement->bindValue(':package',"%$criteria%");

			//Execute query
			$statement->execute();

			//Array of records
			$results = $statement->fetchAll();

			$statement->closeCursor();
			return $results;
		}
		catch (PDOException $ex)
		{
			$errorMessage = $ex->getMessage();
			include "../view/errorPage.php";
			die;
		}
	}

	function textSearch($criteria)
	{
		try
		{
			$connection = connectToDB();
			$query = "SELECT * FROM members
						WHERE 
						firstName LIKE :criteria OR
						lastName LIKE :criteria OR
						email LIKE :criteria OR
						package LIKE :criteria 
						ORDER BY firstName";

			//Load query
			$statement = $connection->prepare($query);
			$statement->bindValue(':criteria',"%$criteria%");

			//Execute query
			$statement->execute();

			//Array of records
			$results = $statement->fetchAll();

			$statement->closeCursor();
			return $results;
		}
		catch (PDOException $ex)
		{
			$errorMessage = $ex->getMessage();
			include "../view/errorPage.php";
			die;
		}
	}


	function updateMember($memberID, $firstName, $lastName, $email, $package, $resortCredit, $memberSince, $currentMember)
	{
		$connection = connectToDB();
		$query = "	UPDATE members 
					SET firstName = :firstName, lastName = :lastName, email = :email, 
						package = :package, resortCredit = :resortCredit, 
						membershipStartDate = :memberSince, currentMember = :currentMember
					WHERE memberID = :memberID";

		//Load query
		$statement = $connection->prepare($query);

		$statement->bindValue(':memberID',$memberID);
		$statement->bindValue(':firstName',$firstName);
		$statement->bindValue(':lastName',$lastName);
		$statement->bindValue(':email',$email);
		$statement->bindValue(':package',$package);
		$statement->bindValue(':resortCredit',$resortCredit);
		$statement->bindValue(':memberSince',toMySqlDate($memberSince));
		$statement->bindValue(':currentMember',$currentMember);

		//Execute query
		$success = $statement->execute();

		$statement->closeCursor();

		if($success)
		{	
			return $statement->rowCount();
		}
		else
		{
			//Call log error info to generate and display error message...normally this would
			//logged into a file for admin use
			logSQLError($statement->errorInfo());
		}
	}

	

?>