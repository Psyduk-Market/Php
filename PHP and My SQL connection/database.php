<?php
require_once("config.php");
require_once("Item.php");

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error)
{
    fatalError($conn->connect_error);
    return;
}

/**
 * Queries the database for all shopping list items.
 *
 * For each result returned from the querry create a new Item and add to an array of Items.
 * Order the results returned by name.
 *
 * @param mysqli $conn A connection to a mysql database.
 *
 * @return a list of Items
 */


//echo $result[0];

function getAllItems($conn)
{
	$items = array();

    $sql = "SELECT * FROM shopping_list";
    $result = $conn->query($sql);
    if (!$result) die($conn->error);
    $rows = $result->num_rows;
//    echo $rows;

    for ($j=0; $j < $rows; $j++){
        $result->data_seek($j);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        $name =  $rows['name'];
        $price = $rows['price'];
        $quantity = $rows['quantity'];
        $item = new Item ($name, $price, $quantity);
//        echo $name . $price . $quantity;
        array_push($items, $item);
//        echo $item->display();
    }

    $result->close();

	return $items;
}

/**
 * Inserts an item into the shopping_list table.
 *
 * @param Item $item The item to insert into the database.
 * @param mysqli $conn A connection to a mysql database.
 */
function insertItem($item, $conn)
{
    // First version of using sql
//    $name = sanitizeInput($item->getName(), $conn);
//    $price = sanitizeInput($item->getPrice(), $conn);
//    $quantity = sanitizeInput($item->getQuantity(), $conn);
////    echo $name . $price . $quantity;
//    $sql = "INSERT INTO shopping_list(name,price,quantity) VALUES('$name','$price','$quantity')";
//
//    echo $sql;
//    $result = $conn->query($sql);
//    if (!$result) die($conn->error);
    // Second version with improved protection to prevent html input and sql injection
    $name = sanitizeInput($item->getName(), $conn);
    $price = sanitizeInput($item->getPrice(), $conn);
    $quantity = sanitizeInput($item->getQuantity(), $conn);
    $stmt = $conn->prepare("INSERT INTO shopping_list(name,price,quantity) VALUES(?,?,?)");
    $stmt->bind_param('sii',$name,$price, $quantity);
    $stmt->execute();
    if($stmt->errno)
    {
        fatalError($stmt->error);
    }
}

/**
 * Delete all items with a give item name.
 *
 * @param string $item_name The name of the item(s) to remove.
 * @param mysqli $conn A connection to a mysql database.
 */
function deleteItem($item_name, $conn)
{
    // First version prevent html input
//    $item_check_format = sanitizeInput($item_name, $conn);
//
//    $sql = "DELETE FROM shopping_list WHERE name = '{$item_check_format}'";
//
//    echo $sql;
//    $result = $conn->query($sql);
//    if (!$result) die($conn->error);
    // Second version prevent from html input and sql injection
    // The result when sql injection appear - the program will do nothing
    $item_check_format = sanitizeInput($item_name, $conn);
    $stmt = $conn->prepare("DELETE FROM shopping_list WHERE name = ?");
    $stmt->bind_param('s',$item_check_format);
    $stmt->execute();
    echo "This is sql injection input! I got chu!! FBI OPEN UP!!!!";
    if($stmt->errno)
    {
        fatalError($stmt->error);
    }
}

/**
 * Clears all items in the shopping_list table.
 *
 * @param mysqli $conn A connection to a mysql database.
 */
function clearShoppingList($conn)
{
    $sql = "TRUNCATE TABLE shopping_list";
    $conn->query($sql);
}

/**
 * Sanitizes an input string.
 *
 * Check to see if magic quotes are being used, if they are strip slashes from the input string.
 * Use the real_escape_string function of the database to escape the input string.
 * prevent XSS by calling htmlentities function on the input string.
 * Return the sanitized string.
 *
 * @param string $input The string to sanitize.
 * @param mysqli $conn A connection to a mysql database.
 *
 * @return a sanitized string.
 */
function sanitizeInput($input, $conn)
{

    if (get_magic_quotes_gpc()) {
        $input = stringslashes($input);
    }
    $input = $conn->real_escape_string($input);
//    Convert some characters to HTML entities
    return htmlentities($input);

}

/**
 * Echos an mysql error.
 *
 * @param string $error The error passed.
 */
function fatalError($error)
{
    $message = mysql_error();
    echo <<< _END
Something went wrong :/
<p>$error: $message</p>
_END;
}
 ?>
