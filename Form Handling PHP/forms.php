<!DOCTYPE html>
<html>
    <body>

    <h2>HTML Forms</h2>

    <form action="forms.php" method="get">
        First name:<br>
        <input type="text" name="firstname" value="">
        <br>
        Last name:<br>
        <input type="text" name="lastname" value="">
        <br><br>
<!--        This is button-->
        <input type="submit" value="Submit">
    </form>

    <p>Enter your first and last name, then hit submit.</p>

    </body>
</html>

<?php

// Please do not modify this section, only comment out which part you are not currently testing
// ==========================================================================================================
// Check if there an input assigned for $first_name
//if (isset($_GET["firstname"])) {
//    $first_name = $_GET["firstname"];
//    say_hi($first_name);
//}

if (isset($_GET["firstname"], $_GET["lastname"])) {
    $first_name = $_GET["firstname"];
    $last_name = $_GET["lastname"];

    say_hello($first_name, $last_name);
}
// ==========================================================================================================


/**
 * A function which says hello to the user and prints their name in uppercase.
 * @param $first String first name of the user.
 */
function say_hi($first) {
    // BEGIN EXERCISE 1 & EXERCISE 2a.
    echo "Hello " . $first;
}

/**
 * A function which will say hello to a user given their first and last names.
 * @param $first String first name of the user.
 * @param $last String last name of the user.
 */
function say_hello($first, $last) {
    // BEGIN EXERCISE 2b.
    if ($first && $last){
    echo "Hello " . $first . " " . $last;
    }
    else {
        echo "Hello " . $first;
    }
}