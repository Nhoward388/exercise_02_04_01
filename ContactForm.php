<!doctype html>

<html>
	<head>
<!--
	    Project_02_04_01
	    Author: Nathan Howard
	    Date: 09.28.19
	    Filename: ContactForm.php
-->
		<title>Contact Form</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
        <?php
//            global variables
            $showForm = true;
            $errorCount = 0;
            $sender = "";
            $email = "";
            $message = "";
            $subject = "";
//            function to display the form
            function displayForm($sender, $email, $subject, $message) {
                ?>
                    <h2 style="text-align: center;">Contact Me</h2>
                    <form name="contact" action="ContactForm.php" method="post">
                        <p>Your name: <br><input type="text" name="Sender" value="<?php echo $sender; ?>"></p>
                        <p>Your E-mail:<br><input type="text" name="Email" value="<?php echo $email; ?>"></p>
                        <p>Subject:<br><input type="text" name="Subject" value="<?php echo $subject; ?>"></p>
                        <p>Message:<br>
                            <textarea name="Message"><?php echo $message ?></textarea>
                        </p>
                        <p>
                            <input type="reset" value="Clear Form">&nbsp;&nbsp;
                            <input type="submit" name="Submit" value="Send Form">
                        </p>
                    </form>
                <?php
            }
//            function to validate inputs based on the data and the fieldname
            function validateInput($data, $fieldName) {
                global $errorCount;
                if (empty($data)) {
                    echo "\"$fieldName\" is a required field.<br>\n";
                    ++$errorCount;
                    $retval = "";
                } else {
                    $retval = trim($data);
                    $retval = stripslashes($retval);
                }
                return $retval;
            }
//            function that will validate the email based on the pattern
            function validateEmail($data, $fieldName) {
                global $errorCount;
                if (empty($data)) {
                    echo "\"$fieldName\" is a required field.<br>\n";
                    ++$errorCount;
                    $retval = "";
                } else {
                    $retval = trim($data);
                    $retval = stripslashes($retval);
                    $pattern = "/^[\w-]+(\.[\w-]+)*@" . "[\w-]+(\.[a-z]{2,})$/i";
                    if (preg_match($pattern, $retval) == 0) {
                        echo "\"$fieldName\" is not a valid e-mail address.<br>\n";
                        ++$errorCount;
                    }
                }
                return $retval;
            }
//            will validate inputs and email if the post is submitted and then decide whether to show form
            if (isset($_POST['Submit'])) {
                $sender = validateInput($_POST['Sender'], "Your Name");
                $email = validateEmail($_POST['Email'], "Your E-Mail");
                $subject = validateInput($_POST['Subject'], "Subject");
                $message = validateInput($_POST['Message'], "Message");
                if ($errorCount == 0) {
                    $showForm = false;
                } else {
                    $showForm = true;
                }
            }
//            will show the form if theres no errors and to re-enter information.
            if ($showForm) {
                if ($errorCount > 0) {
                    echo "<p>Please re-enter the form information.</p>\n";
                }
                displayForm($sender, $email, $subject, $message);
//                mail the form if the form doesn't need to be redisplayed
            } else {
                $senderAddress = "$sender <$email>";
                $headers = "From: $senderAddress\nCC:$senderAddress";
                $result = mail("nahoward2017@cox.net", $subject, $message, $headers);
                if ($result) {
                    echo "<p>Your message has been sent. Thank you, " . $sender . ".</p>\n";
                } else {
                    echo "<p>There was an error sending your message, " . $sender . ".</p>\n";
                }
            }
        ?>
	</body>
</html>