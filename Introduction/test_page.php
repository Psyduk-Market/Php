<?php
/**
 * Created by PhpStorm.
 * User: cna27
 * Date: 25/07/2019
 * Time: 9:25 AM
 */

// Exercise 1
echo ">>> Exercise 1";
echo "<br>";
// Create variable
$aVariable = 1;

// In php requires "$" to create or access variable
//notVariable = "This won't work";

// Exercise 2
echo ">>> Exercise 2";
echo "<br>";
$location = "University of Canterbury";
//$location = 23;
$weather = "raining";
echo "The weather at the {$location} is {$weather}";

// Replace the $location and $weather will result in different output
// Changing the value of $location from string to int the format below will still work (Will not result in error)

echo "<br>";

// Exercise 3
echo ">>> Exercise 3";
echo "<br>";
// Casting
$a = 56;
$b = 12;
$c = $a / $b;
echo $c;

echo "<br>";

// echo result to integer instead of float
$c = (int) ($a / $b);
echo $c;
echo "<br>";

// Exercise 4
echo ">>> Exercise 4";
echo "<br>";
//Function parameters
function myFunction($myParam)
{
    $count = $myParam;
    // In this case strtolower($count) is not needed because the input string is alreayd in lower case
    return strtoupper($count). " " . $count;
}

echo myFunction("parameter");
echo "<br>";

// Exercise 5
echo ">>> Exercise 5";
echo "<br>";

// Variable Scoping

// This will use the variable $x = 5 not 2 because 5 is declared inside the function
// and 2 has not been referred with in the function
$x = 2;
function doStuff()
{
    $x = 5;
    echo "doStuff() result = " . $x . "<br/>";
}

doStuff();

// This will use $x = 2
function addTwo($value)
{
    return $value += 2;
}

$x = 2;
echo $x . "<br/>";

$y = addTwo($x);

echo "Calling addTwo() result y = " . $y . "<br/>";
echo $x . "<br/>";

// Exercise 6
echo ">>> Exercise 6" . "<br>";

// conditionals
$count = 6;
if ($count % 2 == 0)
{
    echo "Even" . "<br/>";
}

$str = "MyString";
if (strtoupper($str) == $str){
    echo "uppercase" . "<br/>";
}
elseif (strtolower($str) == $str) {
    echo "Lowercase" . "<br/>";
}
else {
    echo "Mixedcase" . "<br/>";
}

// || or
// && and
// ! not

function FizzBuzz($value){
    if (($value % 3 == 0) && ($value % 5 == 0)){
        return "FizzBuzz" . "<br/>";
    }
    elseif ($value % 5 == 0){
        return "Buzz" . "<br/>";
    }
    elseif ($value % 3 == 0) {
        return "Fizz" . "<br/>";
    }
}

echo FizzBuzz(30);


// Exercise 7
echo ">>> Exercise 7" . "<br>";

// Switches
// Make sure to use "break" after the condition is satastify
$favclour = "red";
switch($favclour)
{
    case "red":
        echo "Your favourite colour is red!";
        break;
    case "green":
        echo "Your favourite colour is green!";
        break;
    case "blue":
        echo "Your favourite colour is blue!";
        break;
    default:
        echo "Your favourite colour is neither red, green or blue!";
}
echo "<br>";

// Exercise 8
echo ">>> Exercise 8" . "<br>";



?>