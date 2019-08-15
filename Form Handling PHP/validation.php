<!DOCTYPE html>
<html>
    <body>

    <h2>HTML Form Validation</h2>

    <form action="validation.php" method="get">
        Date Of Birth:<br>
        <input type="date" name="dob" value="">
        <br>
        Favourite colour:<br>
        <input type="text" name="favouritecolour" value="">
        <br><br>
        <input type="submit" value="Submit">
    </form>

    <p>Enter your date of birth and favourite colour.</p>

    </body>
</html>

<?php

if(isset($_GET["dob"])) {
    $input_dob = $_GET["dob"];
    check_dob($input_dob);

}
if (isset($_GET["favouritecolour"])) {
    $input_colour = $_GET["favouritecolour"];
    $result = check_favourite_colour($input_colour);
    echo $result;
}

/**
 * Takes in a string representation of a dob and informs the user if it is valid.
 * @param $input String representation of a date of birth
 */
function check_dob($input) {
    // BEGIN EXERCISE 3a.
    if ($input) {
//        echo $input;
        if (date("Y-m-d") < $input){
            echo "The date you submitted is after today!" . "<br>";
        }
        else {
            echo "The UNIX time for the date you entered is " .  strtotime($input) . "<br>";
        }
    }
    else {
        echo "Please enter a date!" . "<br>";
    }
}


/**
 * Takes in a colour and informs the user if it is in the favourite colours array.
 * @param $colour String representation of a colour.
 */
function check_favourite_colour($colour) {
//    echo $colour;
    $favourite_colours = array("blue", "red", "yellow", "orange", "black");
    $colour = strtolower($colour);
    // BEGIN EXERCISE 3b.
    if (!$colour) {
        return "Please enter your favourite colour" . "<br>";
    } else {
        if (in_array($colour, $favourite_colours)) {
            return "The colour you entered is one of the favourite colours" . "<br>";
        } else {
            return "This isn't one of the favourite colours!" . "<br>";
        }
    }
}