<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

var_dump($_SESSION["isAuthor"], "IS AUTHOR ? "); 
var_dump($_SESSION["isAdmin"], "IS ADMIN ? "); ?>


<h3> POST(S) </h3><? 
foreach($posts as $post){
        echo $post['titre'] . '<br>' . $post['texte'] . '<br>' . $post['date'] . '<br><br>'; 
}

?>