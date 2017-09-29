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
    echo '
            </div>
            <a href=\"index.php\" ><img src=\"imaages/mainLogo.png\"></a>
        </header>

       <div id=\"top_search\">
            <form name=\"input\" action=\"search.php\" method=\"get\">
                <input type=\"text\" id=\"keywords\" name=\"keywords\" size=\"100\" class=\"searchBox\" 
                    value=\"$defaultText\"> &nbsp;
                <select id=\"category\" name=\"category\" class=\"searchBox\">
              
       </div>
    ';
    // include categories
    echo '      </select>
                <input type=\"submit\" value="Search" class="button"/>
            </form>
    ';
}
?>