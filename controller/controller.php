<?php
	
    session_start();
    require_once("../security/model.php");

	
	require_once "../model/model.php";
	require_once "../lib/gen_funcs.php";


	if(get_magic_quotes_gpc())
	{
		function stripslashes_gpc(&$value)
		{
			$value = stripslashes($value);
		}

		array_walk_recursive($_GET, 'stripslashes_gpc');
		array_walk_recursive($_POST, 'stripslashes_gpc');
		array_walk_recursive($_COOKIE, 'stripslashes_gpc');
		array_walk_recursive($_REQUEST, 'stripslashes_gpc');
	}


	//Check the GET and POST arrays to see how the action is processed
	if(isset($_POST['action']))
	{
		$action = $_POST['action'];
	}
	
	elseif(isset($_GET['action']))
	{
		$action = $_GET['action'];
	}
	
	//If neither is set then send to home page by default
	else
	{
		include("../view/index.php");
		exit();
	}


	if (!userIsAuthorized($action)) 
	{
        if(!loggedIn()) 
        {
            header("Location:../security/index.php?action=SecurityLogin&RequestedPage=" . urlencode($_SERVER['REQUEST_URI']));
        } 

        else 
        {
            include('../security/not_authorized.html');
        }
    } 
    else 
    {
		//Determine action and feed back correct page
		switch ($action) 
		{

			case 'About':
				include "../view/about.php";
				break;

			case 'AddMember':
				addMember();
				break;

			case 'ControlPanel':
				include "../view/controlPanel.php";
				break;

			case 'DeleteMember':
				deleteMember();
				break;

			case 'DetailView':
				detailMember();
				break;

			case 'EditMember':
				editMember();
				break;

			case 'EmailList':
				$recipients = getRecipients();
				include "../view/emailList.php";
				break;

			case 'Gradesheet':
				include "../view/assign4-gradesheet.php";
				break;

			case 'Home':
				include "../view/index.php";
				break;

			case 'Ideas':
				include "../view/ideas.php";
				break;


			case 'Members':
				listMembers();
				break;

			case 'Newsletter':
				include "../view/newsletter.php";
				break;

			case 'ProcessAddMember':
				processAddMember();
				break;

			case 'ProcessImageUpload':
				$fileList = listImages();

				$message = uploadImages();

				include "../view/imageFileProcess.php";
				break;

			case 'ProcessNewsletterUpload':
				$message = uploadNewsletter();

				include "../view/htmlFileProcess.php";
				break;

			case 'ProcessQuoteListUpload':
				$message = uploadQuoteList();

				include "../view/textFileProcess.php";
				break;

			case 'ProcessSubscribe':
				$message = subscribeMember();

				include "../view/subscribeProcess.php";
				break;

			case 'Rates':
				include "../view/rates.php";
				break;

			case 'SearchMembers':
				SearchMembers();
				break;

			case 'SearchPage':
				include "../view/search.php";
				break;

			case 'SendEmail':
				$returnVals = sendMail();

				$isError = $returnVals["isError"];

				if($isError)
				{
					$errorMessage = $returnVals["errorMessage"];
					include "../view/errorPage.php";
				}
				else
				{	
					$recipients = $returnVals["recipients"];
					include "../view/sendEmail.php";
				}
				break;

			case 'Subscribe':
				include "../view/subscribe.php";
				break;

			
			case 'UnderConstruction':
				include "../view/underconstruction.php";
				break;

			case 'Unsubscribe':
				include "../view/unsubscribe.php";
				break;

			case 'UnsubscribeProcess':
				$message = unsubscribeMember();
				
				include '../view/unsubscribeProcess.php';
				break;
				
			case 'UploadImage':
				$fileList = listImages();

				include "../view/imageFileUpload.php";
				break;

			case 'UploadNewsletter':
				$fileList = listNewsletter();

				include "../view/htmlFileUpload.php";
				break;

			case 'UploadQuoteList':
				$fileList = listQuoteList();

				include "../view/textFileUpload.php";
				break;

			case 'ViewCurQuoteList':
				include "../datafile/quotelist.txt";
				break;

			default:
				include "../view/index.php";
				break;
		}
	}

	function addMember()
	{
		$mode = "Add";
		$memberID = 0;
		$firstName = "";
		$lastName = "";
		$email = "";
		$package = "";
		$resortCredit = "0.00";
		$memberSince = date("m/d/Y");
		$currentMember = "y";

		include "../view/editForm.php";
	}
	
	function deleteMember()
	{
		$memberID = $_GET['memberID'];

		if(!isset($memberID))
		{
			$errorMessage = "Please enter memberID";
			include "../view/errorPage.php";
		}
		else
		{
			$rowCount = deleteMemberDB($memberID);

			if($rowCount != 1)
			{
				$errorMessage = "Deletion occurred for $rowCount rows";
				include "../view/errorPage.php";
			}			
			else
			{
				header("Location:../controller/controller.php?action=Members&delete=true");
			}
		}
	}

	function detailMember()
	{
		if(!isset($_GET['memberID']))
		{
			$errorMessage = "Please enter memberID";
			include "../view/errorPage.php";
		}
		else
		{
			$memberID = $_GET['memberID'];
			$results = getMember($memberID);
			if($results == false)
			{
				$errorMessage = "No member could be found";
				include "../view/errorPage.php";
			}
			else
			{
				include "../view/detailView.php";
			}			
		}
	}

	function editMember()
	{
		if(!isset($_GET['memberID']))
		{
			$errorMessage = "Please enter memberID";
			include "../view/errorPage.php";
		}

		else
		{
			$memberID = $_GET['memberID'];
			$results = getMember($memberID);
			if($results == false)
			{
				$errorMessage = "No member could be found";
				include "../view/errorPage.php";
			}

			else
			{
				$mode = "Edit";
				$memberID = $results['memberID'];
				$firstName = $results['firstName'];
				$lastName = $results['lastName'];
				$email = $results['email'];
				$package = $results['package'];
				$resortCredit = $results['resortCredit'];
				$memberSince = $results['membershipStartDate'];
				$currentMember = $results['currentMember'];

				include "../view/editForm.php";
			}			
		}
	}

	function listMembers()
	{
		$results = getAllMembers();
		$rowCount = count($results);
		if($rowCount == 0)
		{
			$errorMessage = "No members found";
			include "../view/errorPage.php";
		}
		elseif($rowCount == 1)
		{
			//Because there is only one record in array (aka one array in array),
			//we will just take away the outer array to leave the single array inside as original name
			//this will be important so that detailView page can be used for single fetch() and fetchAll()
			$results = $results[0];
			include "../view/detailView.php";
		}
		else
		{
			include "../view/members.php"; 
		}
	}

	function processAddMember()
	{
		$errors = "";

		//Gather Form Data
		$mode = $_POST['mode'];
		$memberID = $_POST['memberID'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		$package = $_POST['package'];
		$resortCredit = $_POST['resortCredit'];
		$memberSince = $_POST['memberSince'];
		
		if(isset($_POST['currentMember']))
		{
			$currentMember = "y";
		}
		else
		{
			$currentMember = "n";
		}



		//Validation
		if(empty($firstName) || strlen($firstName) > 20)
		{
			$errors .= "\\n\\n * First Name required (1-20 characters)";
		}
		if(empty($lastName) || strlen($lastName) > 20)
		{
			$errors .= "\\n\\n * Last Name required (1-20 characters)";
		}
		if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($email) > 30)
		{
			$errors .= "\\n\\n * Valid email required (1-30 characters)";
		}
		if(empty($package))
		{
			$errors .= "\\n\\n * Package selection required";	
		}
		if(!empty($resortCredit) && !is_numeric($resortCredit))
		{
			$errors .= "\\n\\n * Resort Credit must be decimal value i.e [0.0].";	
		}
		elseif(empty($resortCredit))
		{
			$resortCredit = 0;
		}
		if(empty($memberSince) || !strtotime($memberSince))
		{
			$errors .= "\\n\\n * Sign up date required. Must be date format (mm/dd/yyyy).";
		}
		


		if(!empty($errors))
		{
			include "../view/editForm.php";
		}
		else
		{
			if($mode == 'Add')
			{
				$memberID = insertMember($firstName, $lastName, $email, $package, $resortCredit, $memberSince, $currentMember);
			}
			elseif($mode == 'Edit')
			{
				$recordsAffected = updateMember($memberID, $firstName, $lastName, $email, $package, $resortCredit, $memberSince, $currentMember);
			}
			//Need to redirect to view details about newly inserted member
			header("Location:../controller/controller.php?action=DetailView&memberID=$memberID");
		}

	}

	function searchMembers()
	{

		//document.location = '../controller/controller.php?action=SearchMembers&searchType=text&criteria=' + criteria;
		
		$searchType = $_GET['searchType'];
		$criteria = $_GET['criteria'];

		switch ($searchType) 
		{
			case 'text':
				$results = textSearch($criteria);
				break;

			case 'select':
				$results = selectSearch($criteria);
				break;

			case 'button':
				$results = buttonSearch();
				break;
			
			default:
				$errorMessage = "Invalid Search Type";
				include "../view/errorPage.php";
				break;
		}


		$rowCount = count($results);
		

		if($rowCount == 0)
		{
			$errorMessage = "No members found";
			include "../view/errorPage.php";
		}
		elseif($rowCount == 1)
		{
			//Because there is only one record in array (aka one array in array),
			//we will just take away the outer array to leave the single array inside as original name
			//this will be important so that detailView page can be used for single fetch() and fetchAll()
			$results = $results[0];
			include "../view/detailView.php";
		}
		else
		{
			include "../view/members.php"; 
		}	
	}

	function sendMail()
	{
		require_once 'Mail.php';

		/***	OPTIONS FOR MAIL OBJECT 	***/
		$options = array();
		$options["host"] = "ssl://smtp.gmail.com";
		$options["port"] = 465;
		$options["auth"] = true;
		$options["username"] = "tbcaro.cis370mailserver@gmail.com";
		$options["password"] = "CIS370Server";

		/***	CREATE MAIL OBJECT 	***/
		$mailer = Mail::factory("smtp",$options);


		$recipients = getRecipients();

		$headers = array();
		$headers["From"] = "Travis Caro <tbcaro.CIS370MailServer@gmail.com>";
		$headers["Subject"] = "Snowflake Ski Resort Newsletter";
		$headers["Content-type"] = "text/html";

		/***	CREATE MESSAGE 	***/
		$newsletter = getNewsletterMessage();
		$message = "<html><body>" . implode($newsletter) . "</body></html>";


		/***	SEND MAIL	***/
		$result = $mailer->send($recipients,$headers,$message);


		/*** 	DETERMINE ERROR    ***/
		if(PEAR::isError($result))
		{
			$errorMessage = $result->getMessage();
			$isError = true;
		}

		/***	GATHER RETURNS 	 ***/
		$returnVals[] = array();

		$returnVals["recipients"] = $recipients;
		$returnVals["isError"] = $isError;
		$returnVals["errorMessage"] = $errorMessage;


		return $returnVals;
	}

	function subscribeMember()
	{
		//Read through current members in list to see if newly signing up member is present in list. Then if email exists already then echo message saying email already exists.

		//Otherwise add new user.

		//Gather form data to vars
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];				
		$email = $_POST['email'];

		//Validate First Name
		if(empty($fname))
		{
			$message = "Please enter First Name";
		}
		//Validate Last Name
		elseif(empty($lname)) 
		{
			$message = "Please enter Last Name";
		}
		//Validate Email
		elseif(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$message = "Please enter a valid email address";
		}
		//All Valid, check list add member to file
		else
		{
			$curMembers = getCurMembers();

			//Initially assume that email is not in file ... we haven't checked yet
			$emailExists = False;

			//Check through array gathered from file to see if email is present in that array...if it is do not add it again, and alert user that email is already in file.
			for ($i=0; $i < count($curMembers); $i++) 
			{ 
				if($email == $curMembers[$i][2])
				{
					$emailExists = True;
				}											
			}

			if($emailExists)
			{
				$message = "This email is already subscribed to our newsletter.";
			}

			else
			{
				$success = addNewMember($fname,$lname,$email);

				if($success)
				{
					$message = "Congratulations $fname! <br/> You have subscribed to our monthly Newsletter.";
				}
				else
				{
					$message = "Unable to subscribe to newsletter";
				}
			}
			
		}

		return $message;
	}

	function unsubscribeMember()
	{
		//Read through file looking for entered email. Place csv into a new file, except for the email that is unsubscribing. That specific email will not be added back into master list.

		$email = $_POST['email'];

		//Validate Email
		if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$message = "Please enter a valid email address";
		}
		//If Valid, check list for email
		else
		{
			$emailRemoved = removeMember($email);

			if($emailRemoved)
			{
				$message = "$email will no longer receive SSR Newsletter.";
			}
			else
			{
				$message = "$email was not found.";
			}	
		}

		return $message;
	}

	function uploadImages()
	{

		$userUpload = getImageUpload();

		//Get all image info into array
		$image_info = getimagesize($_FILES["userfile"]["tmp_name"]);
		
		//Specific vars for data from image_info
		$image_width = $image_info[0];
		$image_height = $image_info[1];
		$image_type = $image_info[2];


		//Check if replacing or adding file
		if(file_exists($userUpload))
		{
			$filePresent = "replaced";
		}

		else
		{
			$filePresent = "uploaded";
		}


		//Image Type
		if($image_type != IMAGETYPE_GIF && $image_type != IMAGETYPE_JPEG && $image_type != IMAGETYPE_PNG)
		{
			$message = "File type not supported. Please select JPEG, PNG, or GIF and try again";			
		}

		//Image Resolution
		elseif($image_width != 1300 && $image_height != 100)
		{
			$message = "Image is not correct size. Please upload an image that is 1300 x 100";
		}

		//Image Size
		elseif($_FILES["userfile"]["size"] > 10000000) //Greater than 10MB
		{
			$message = "Please choose file smaller than 10MB and try again..";	
		}

		//No File Selected
		elseif ($_FILES["userfile"]["error"] == UPLOAD_ERR_NO_FILE) 
		{
			$message = "Please choose file and try again..";
		}

		//Success
		else
		{
			$success = addFileUpload($userUpload);
			
			if($success)
			{
				$message = "File sucessfully $filePresent";
			}
			else
			{
				$message = "Unable to upload file";
			}

		}

		return $message;
	}

	function uploadNewsletter()
	{
		$userUpload = getNewsletterUpload();


		//Check if replacing or adding file
		if(file_exists($userUpload))
		{
			$filePresent = "replaced";
		}
		else
		{
			$filePresent = "uploaded";
		}


		//Check file type
		if($_FILES["userfile"]["type"] !== "text/html")
		{
			$message = "Only text/html Files supported";
		}

		//File size
		if($_FILES["userfile"]["size"] > 10000000) //Greater than 10MB
		{
			echo "Please choose file smaller than 10MB and try again...";	
		}
		
		//No file selected
		elseif ($_FILES["userfile"]["error"] == UPLOAD_ERR_NO_FILE) {
			echo "Please choose file and try again...";
		}
		
		//Success
		else
		{
			$success = addFileUpload($userUpload);

			if($success)
			{
				$message = "File sucessfully $filePresent";
			}
			else
			{
				$message = "Unable to upload file";
			}
		}
		
		return $message;
	}

	function uploadQuoteList()
	{
		$userUpload = getQuoteListUpload();


		//Check if replacing or adding file
		if(file_exists($userUpload))
		{
			$filePresent = "replaced";
		}
		else
		{
			$filePresent = "uploaded";
		}


		//File type
		if($_FILES["userfile"]["type"] !== "text/plain")
		{
			$message = "Only text/plain files supported";
		}

		//File size
		elseif($_FILES["userfile"]["size"] > 10000000) //Greater than 10MB
		{
			$message = "Please choose file smaller than 10MB and try again...";	
		}

		//No file selected
		elseif ($_FILES["userfile"]["error"] == UPLOAD_ERR_NO_FILE) {
			$message = "Please choose file and try again...";
		}

		//Success
		else
		{
			$success = addFileUpload($userUpload);

			if($success)
			{
				$message = "File sucessfully $filePresent";
			}
			else
			{
				$message = "Unable to upload file";
			}
		}
		
		return $message;
	}

?>