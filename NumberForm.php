<!doctype html>

<html>
	<head>
<!--
	    exercise 02_04_01
	    Author: Nathan Howard
	    Date: 09.25.18
	   Filename: NumberForm.php
-->
		<title>Number Form</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
        <h1>Number Form</h1>
        <?php
            $displayForm = true;
            $number = "";
//            determining if we have got here from a form submission or not
            if (isset($_POST['submit'])) {
                $number = $_POST['number'];
//                checks the number to make sure its numeric
                if (is_numeric($number)) {
                    $displayForm = false;
                } else {
                    echo "<p>You need to enter a numeric value.</p>\n";
                    $displayForm = true;
                }
//            decides whether the form needs to be displayed
            }
            if ($displayForm) {
                ?>
                    <form action="NumberForm.php" name="numberForm" method="post">
                        <p>
                            Enter a number: <input type="text" name="number" value="<?php echo $number; ?>">
                        </p>
                        <p>
                            <input type="reset" value="Clear Form">&nbsp;&nbsp;
                            <input type="submit" value="Send Form" name="submit">
                        </p>
                    </form>
                <?php
//                decides to calculate the squared number if the form doesn't need to be showed
            } else {
                echo "<p>Thank you for entering a number.</p>\n";
                echo "<p>Your number, $number, squared is " . ($number * $number) . ".";
                echo "<p><a href=\"NumberForm.php\">Try Again</a></p>\n";
            }
       ?>
	</body>
</html>