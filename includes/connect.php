<?php
/**
 * Created by PhpStorm.
 * User: amin
 * Date: 25.09.17
 * Time: 15:54
 */
$connect = mysqli_connect('localhost','root','mysql');
if (!$connect){
    die('Could not connect'.error_get_last() );
}
$db_selected = mysqli_select_db($connect, "lisa");
if (!$db_selected){
    die('Could not select db'.error_clear_last());
}
?>