<!DOCTYPE html>
<html>
<head>
    <title>Arrays and loops in PHP</title>
</head>
<body>
<h1>Tutorial 2 - Arrays!</h1>

<?php
    $nums = array(5, 11, 14, 52, -80, 2, 4, 3, 8, 15, -12, 142);
    $sentence = "Hello and welcome to the second tutorial of INFO 263";
    $people = array("Jeff"=>"Red", "Alice"=>"Black", "Alex"=>"Green", "Batman"=>"Yellow", "Bruce"=>"Green",
        "Sally"=>"Blue", "Ashley"=>"Yellow", "Steve"=>"Black", "Michael"=>"Yellow", "Charlie"=>"Blue", "Ben"=>"Yellow");

    function print_array($nums) {
        // BEGIN EXERCISE 1.
        echo "Every numbers in an array" . "<br>";
        for ($count = 0; $count <= count($nums); $count++){
            echo $nums[$count] . "<br>";
        }
    }

    function print_smallest_number($nums) {
        // BEGIN EXERCISE 2a.
        echo "Smallest number" . "<br>";
        echo min($nums) . "<br>";
    }

    function print_largest_number($nums) {
        // BEGIN EXERCISE 2b.
        echo "Largest number" . "<br>";
        echo max($nums) . "<br>";
    }

    function print_odd_numbers($nums) {
        // BEGIN EXERCISE 3.
        echo "Odd numbers" . "<br>";
        for ($count = 0; $count <= count($nums); $count++){
            if ($nums[$count] % 2 == 1){
                echo $nums[$count] . "<br>";
            }
        }
    }

    function remove_even_numbers($nums) {
        echo "Remove even numbers" . "<br>";
        $even_nums = array();
        $odd_nums = $nums;
        for ($count = 0; $count <= count($nums); $count++){
            if ($nums[$count] % 2 == 0) {
                array_push($even_nums, $nums[$count]);
//                echo $nums[$count] . "<br>";
            } else {
                array_push($odd_nums, $nums[$count]);
            }
        }
//        print_r($even_nums);
        print_r($odd_nums);
        echo "<br>";
        // BEGIN EXERCISE 4.
    }

    function reverse_the_sentence($sentence) {
        // BEGIN EXERCISE 5.
        echo "Reverse the sentence" . "<br>";
        // Transform a string vraible into array
        $temp = explode(' ', $sentence);
        $reverse = array();
        for ($word = count($temp); $word >= 0; $word--){
            array_push($reverse, $temp[$word]);
        }
        $reverse = implode(' ', $reverse);
//        print_r($temp);
        print_r($reverse);
        echo "<br>";
    }

    function print_favourite_colours($people) {
        // BEGIN EXERCISE 6.
        echo "Show each person favourite colour" . "<br>";
        foreach($people as $person => $colour){
            echo "$person: $colour" . "<br>";
        }
    }

    function print_colour_occurrences($people) {
        // BEGIN EXERCISE 7.
        echo "Show the total number of people favourite colour" . "<br>";
        $result = array_count_values($people);
        foreach($result as $colour => $total){
            if ($total > 1) {
                    echo "$total" . " people have " . "$colour" . " as their favourite colour" . "<br>";
            } else {
                echo "$total" . " person has " . "$colour" . " as their favourite colour" . "<br>";
            }
        }
        echo "<br>";
//        print_r($result);
    }

    print_array($nums);
    print_smallest_number($nums);
    print_largest_number($nums);
    print_odd_numbers($nums);
    remove_even_numbers($nums);
    reverse_the_sentence($sentence);
    print_favourite_colours($people);
    print_colour_occurrences($people)

?>
</body>
</html>
