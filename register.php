<?php
/**
 * Created by PhpStorm.
 * User: amin
 * Date: 25.09.17
 * Time: 16:10
 */
session_start();
include ("includes/connect.php");
include ("includes/html_codes.php");

$error_message = "Please fill up the form correctly!";

if(empty($error)){
    if (mysqli_num_rows($result) == 0){
        $result = mysqli_query("INSERT INTO tempusers (user_id, username, email, password, activation)
        VALUES ('', $username, $email, $password, $activation)") or die(mysqli_error());
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="css/main.css">
        <script
            src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
            integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
            crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    </head>
    <body>
        <div id="wrapper">
            <?php
                headerAndSearchCode();
            ?>
            <aside id="left_side"></aside>
            <section id="right_side">
                <form id="generalForm" class="container" method="post" action="">
                    <h3>Register</h3>
                    <?php echo $error_message; ?>
                    <div class="field">
                        <label for="username">Username: </label>
                        <input type="text" class="input" id="username" name="username" maxlength="20"/>
                    </div>
                    <div class="field">
                        <label for="email">Email: </label>
                        <input type="email" class="input" id="email" name="email" maxlength="80"/>
                    </div>
                    <div class="field">
                        <label for="password">Password: </label>
                        <input type="password" class="input" id="password" name="password" maxlength="20"/>
                    </div>
                    <input type="submit" name="submit" id="submit" class="button" value="Submit">
                </form>
            </section>
        </div>
    </body>
</html>
