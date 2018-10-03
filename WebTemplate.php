<!doctype html>

<html>
	<head>
<!--
	    exercise 02_04_01
	    Author: Nathan Howard
	    Date: 09.25.18
	   Filename: WebTemplate.php
-->
		<title>Web Template</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body> 
        <?php include("inc_header.html"); ?>
        <div style="width: 20%; text-align: center; float: left;"></div>
        <?php include("inc_buttonnav.html"); ?>
<!--        start of dynamic content section-->
        <?php
            if (isset($_GET['content'])) {
                switch ($_GET['content']) {
                    case 'About Me':
                        include("inc_about.html");
                        break;
                    case 'Contact Me':
                        include("inc_contact.html");
                        break;
                    case 'Home':
//                        a value of home means to display default page/
                    default:
                        include("inc_home.html");
                        break;
                }
            } else { //no button selected
                include("inc_home.html");
            }
        ?>
<!--        end of dynamic content section-->
        <?php include("inc_footer.php"); ?>
	</body>
</html>