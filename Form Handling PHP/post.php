<!DOCTYPE html>
<html>
    <body>
    <h2>POST Requests</h2>
<?php

require_once "Credential.php";

if (isset($_COOKIE['username'])) {
    // Username cookie is set, show welcome message
    $username = $_COOKIE['username'];
    echo "<p>Welcome back $username!</p>";
} else {
    // Cannot find username cookie, display login form
    echo <<< EOT
        <p>Login with your username and password.</p>
        <form action="post.php" method="POST">
            Username:<br>
            <input type="text" name="username" value="">
            <br>
            Password:<br>
            <input type="password" name="password" value="">
            <br><br>
            <input type="submit" value="Login">
        </form>
EOT;
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = htmlentities($_POST["username"]);
    $password = $_POST["password"];

//    login_user($username, $password);
    $result = authenticate($username, $password);
    echo $result;
}

/**
 * Function which attempts to login in a user and shows either an error message on a failed attempt or a success message
 * if the user's username and password match the one stored on the server.
 * @param $username String user's username
 * @param $password String user's password
 */
function login_user($username, $password) {
    $server_user = "superman";
    $server_pass = "Kryptonite";

    // BEGIN EXERCISE 4b
    if ($username == $server_user && $password == $server_pass) {
        echo "Welcome to INFO 2631" . "<br>";
    } else {
        echo "ACCESS DENIED! Incorrect username/password";
    }
}


/**
 * Attempts to authenticate a user by checking if their credentials match that which are stored in the credentials array.
 * @param $user String username we are trying to use to authenticate.
 * @param $pass String password we are trying to use to authenticate.
 */
function authenticate($user, $pass) {
    $credential1 = new Credential("batman", "bruce");
    $credential2 = new Credential("spiderman", "peter_parker");
    $credential3 = new Credential("ethan-hunt", "impossible");
    $credential4 = new Credential("black.panther", "Wakanda");
    $credentials = array($credential1, $credential2, $credential3, $credential4);

    // BEGIN EXERCISE 4c.
//    echo $credential1->validate("batman", "bruce");
//    echo $user . $pass;
    if (!$user && !$pass) {
        return "Please enter your username and password" . "<br>";
    } else {
        for ($i=0; $i < count($credentials); $i++) {
//            echo $i;
            if ($credentials[$i]->validate($user, $pass)) {
                setcookie("username", $user, time() + (86400 * 30), "/");
                return "Welcome to INFO 2631" . "<br>";
            }
        }
        return "ACCESS DENIED! Incorrect username/password";

    }
    // BEGIN EXERCISE 5.
//    setcookie("username", $user, time() + (86400 * 30), "/"); // 86400 = 1 day
}

?>

    </body>
</html>
