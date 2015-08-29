
<!DOCTYPE html>
<html>
    <head>
        <title>
			<?php 
				echo $title;
			?>
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- STYLESHEETS -->
        <link rel="stylesheet" href="../css/nav.css"/>
        <link rel="stylesheet" href="../css/main.css"/>        
        
        <!-- FAVICON -->
        <link rel="shortcut icon" href="../img/favicon.ico" />
        
        <!-- SCRIPTS -->
        <script type="text/javascript" src ="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/main.js"></script>
        
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="../js/map.js"></script>


        <?php 
        
            $current_dir = "../img/headerimg";

            $dir = opendir($current_dir);

            while(($file = readdir($dir)) !== false)
                {
                    if($file != "." && $file != "..")
                    {
                        //Append each file in directory to end of array
                        $imagesInDir[] = $file;
                    }
                }

            $headerimg = "<img src='../img/headerimg/" . $imagesInDir[array_rand($imagesInDir)] ."' alt='headerimg' />";
            

        ?>

    </head>
    <body>
        <div class ="container">        
            <header>            
                <?php 
                    echo "$headerimg";
                ?>
            </header>
            <nav>     	           
                <?php include "../view/navFull.php"; ?>
            </nav> 
            <section class ="content-main">


            