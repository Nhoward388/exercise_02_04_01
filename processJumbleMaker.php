<!doctype html>

<html>
	<head>
<!--
	    Project 02_04_01
	    Author: Nathan Howrad
	    Date: 9.27.18
	    Filename: processJumbleMaker.php
-->
		<title>Jumble Maker</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
        <h2>Jumble Maker</h2>
        <?php
//            global variables
            $errorCount = 0;
            $words = array();
            
//            function that will display error based on the the arguments of error message and field name
            function displayError($fieldName,$errorMsg) {
                global $errorCount;
                echo "Error for \"$fieldName\": $errorMsg<br>\n";
            }
       
//            function to validate the word
            function validateWord($data, $fieldName) {
                global $errorCount;
                $retval = "";
//                condition to determine whether it is empty or not
                if (empty($data)) {
                    displayError($fieldName, "This field is required");
                    ++$errorCount;
                    $retval = "";
                } else {
                    $retval = trim($data);
                    $retval = stripslashes($retval);
//                    decision making to determine whether the word is between 4 and 7 letters while being only letters
                    if (strlen($retval) < 4 || strlen($retval) > 7) {
                        displayError($fieldName, "Words must be between 4 and 7 characters in length");
                    }
                    if (preg_match("/^[A-Za-z]+$/i", $retval) == 0) {
                        displayError($fieldName, "Words must consist only of letters");
                    }
                }
                $retval = strtoupper($retval);
                $retval = str_shuffle($retval);
                return $retval;
            }
//            fills the words array with validated words
            $words[] = validateWord($_POST['word1'], "Word 1");
            $words[] = validateWord($_POST['word2'], "Word 2");
            $words[] = validateWord($_POST['word3'], "Word 3");
            $words[] = validateWord($_POST['word4'], "Word 4");
//            Prints the jumbled word or makes the user aware of an error
            if ($errorCount > 0) {
                echo "Please use the \"Back\" button to re-enter any missing data.<br>\n";
            } else {
                $wordNum = 0;
                foreach ($words as $word) {
                    echo "Word " . ++$wordNum . ":$word<br>\n";
                }
            }
       ?>
	</body>
</html>