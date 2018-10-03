<!doctype html>

<html>
	<head>
<!--
	    exercise 02_04_01
	    Author: Nathan Howard
	    Date: 09.25.18
	   Filename: ProcessScholarship2.php
-->
		<title>Process Scholarship 2</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
        <h2>Process Scholarship 2</h2>
        <?php
//            global variable to keep track of errors
            $errorCount = 0;
//            echo the an error message for the field name
            function displayRequired($fieldName) {
                echo "The field \"$fieldName\" is required.<br>\n";
            }
//            function to validate inputs
            function validateInput($data, $fieldName) {
                global $errorCount;
//                decides whether its empty and increases error count
                if (empty($data)) {
                    displayRequired($fieldName);
                    ++$errorCount;
                    $retVal = "";
                } else {
//                    process the value if its not empty
                    $retVal = trim($data);
                    $retVal = stripslashes($retVal);
                }
//                leave function with return  value
                return $retVal;
            }
//            function that uses html to redisplay a form
            function redisplayForm($firstName, $lastName) {
            ?>
                <h2 style= "text-align: center">Scholarship Form</h2>
                <form action="ProcessScholarship2.php" method="post" name="scholarship">
                    <p>First Name: <input type="text" name="fName" value="<?php echo $firstName; ?>"></p>
                    <p>Last Name: <input type="text" name="lName" value="<?php echo $lastName; ?>"></p>
                    <p>
                        <input type="reset" value="Clear Form">&nbsp;&nbsp;
                        <input type="submit" value="Send Form">
                    </p>
                
                </form>
            <?php
            }
//            first name and last name variables that parse through the inputs
            $firstName = validateInput($_POST['fName'], "First Name");
            $lastName = validateInput($_POST['lName'], "Last Name");
//            redisplays form if there were errors
            if ($errorCount > 0) {
                echo "$errorCount errors: Please re-enter the information below.<br>\n";
                redisplayForm($firstName, $lastName);
            } else {
                echo "Thank you for fill out the scholar ship form, " . $firstName . " " . $lastName . ".";   
            }
        ?>
	</body>
</html>