<!doctype html>

<html>
	<head>
<!--
	    exercise 02_04_01
	    Author: Nathan Howard
	    Date: 09.25.18
	   Filename: ProcessScholarship.php
-->
		<title>Process Scholarship</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
        <h2>Process Scholarship</h2>
        <?php
//            gets rid of the slashes in the posts fname and lname
            $firstName = stripslashes($_POST['fName']);
            $lastName = stripslashes($_POST['lName']);
//            thanks the person who filled out the form
            echo "Thank you for filling out the scholarship form, " , $firstName , " " , $lastName , ".";
        ?>
	</body>
</html>