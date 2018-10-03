<!--
Project_02_04_02
Author: Nathan Howard
Date: 09.1.18
Filename: Paycheck.php
-->
<?php
    echo "<h2>Your Next Paycheck</h2>";
//    global variable to decide her $errorcount
    $errorCount = 0;
//    decides whether we got here from a post
    if (isset($_POST['Submit'])) {
//        runs each variable through validity checks
        $wages = validateField($_POST['pay'], "Wages");
        $hours = validateField($_POST['time'], "Hours");   
    }
//    function to validate the field
    function validateField($value, $fieldName) {
        global $errorCount;
//        makes sure the value isnt empty
        if (!empty($value)) {
//            makes sure it's a number
            if (is_numeric($value) === true) {
                return $value;
            } else {
                $errorCount++;
                echo "$value is not valid. Please re-enter your $fieldName";
            }    
        }        
    }
//    will only calculate if there's no variables
    if ($errorCount === 0) {
//        decision making for overtime
        if ($hours > 40) {
            $hours = (($hours - 40) * 1.5);
        }
        $paycheck = $hours * $wages;
        echo "Your paycheck is " . $paycheck . ".";
    } 
//    link to recalculate 
    echo "<br>You can recalculate <a href='http://10.106.15.116/Exercise/exercise_02_04_01/Paycheck.html'>here</a>.";
?>