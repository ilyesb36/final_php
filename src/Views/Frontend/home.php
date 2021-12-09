<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */
 ?>


<h3> POST(S) </h3><? 
foreach($posts as $post){
        echo $post['titre'] . '<br>' . $post['texte'] . '<br>' . $post['date'] . '<br><br>'; 
}

?>