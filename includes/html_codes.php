<?php
/**
 * Created by PhpStorm.
 * User: amin
 * Date: 29.09.17
 * Time: 02:33
 */
// Header and Search Bar
function headerAndSearchCode(){
    $defaultText = htmlentities($_GET['keywords']);
    echo '
        <header id=\"main_header\">
            <div id=\"rightAlign\">
        </header>
    ';
    // Links
    topRightLinks();
    echo '
            </div>
            <a href=\"index.php\" ><img src=\"imaages/mainLogo.png\"></a>
        </header>

       <div id=\"top_search\">
            <form name=\"input\" action=\"search.php\" method=\"get\">
                <input type=\"text\" id=\"keywords\" name=\"keywords\" size=\"100\" class=\"searchBox\" 
                    value=\"$defaultText\"> &nbsp;
                <select id=\"category\" name=\"category\" class=\"searchBox\">
    ';
    // include categories
    createCategoryList();
    echo '      </select>
                <input type=\"submit\" value="Search" class="button"/>
            </form>
       </div>
    ';
}
function topRightLinks(){
    if( isset($_SESSION['user_id']) ){
        echo '<a href="register.php">Register</a> | <a href="login.php">Login</a>';
    }else{
        $x = $_SESSION['user_id'];
        $result = mysqli_query("SELECT * FROM messages WHERE  receiver=$x AND status='unread'") or die(
        mysqli_error());
        $num = mysqli_num_rows($result);
        if($num == 0){
            echo '<a href="messages_inbox.php">Messages</a> | ';
        }else{
            echo "<span class=\"usernames\"><a href=\"messages_inbox.php\">Messages</a></span> |";
        }
        echo '<a href="addItem.php">Add Item</a> | <a href="account.php">My Account</a> | 
           <a href="logout.php">Logout</a>';
    }
}
function createCategoryList(){
    if( ctype_digit($_GET['category']) ){
        $x = $_GET['category'];
    }else{
        $x = 999;
    }
    echo "<option>All Categories</option>";
    $i = 0;
    while (1){
        if(numberToCategory($i) == "Category Does not Exist"){
            break;
        }else{
            echo "<option value=\"$i\" ";
            if($i == $x){
                echo ' SELECTED';
            }echo ">";
            echo numberToCategory($i);
            echo "</option>";
        }$i++;
    }
}
function numberToCategory($n){
    switch ($n){
        case 0:
            $cat = "Shoes";
            break;
        case 1:
            $cat = "Rugs";
            break;
        case 2:
            $cat = "Furniture";
            break;
        case 3:
            $cat = "Computer & IT";
            break;
        case 4:
            $cat = "Stationary";
            break;
        default:
            $cat = "Category Does not Exist";
    }
    return $cat;
}
?>