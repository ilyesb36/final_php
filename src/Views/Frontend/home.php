<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */
 ?>


<h3> POST(S) </h3><? 
foreach($posts as $post){
    echo 'Post numéro : ' . $post->getId(). '<br>' .
        'Titre : ' .$post->getTitre() . '<br>' .
         'Texte : ' .$post->getTexte() . '<br>' .
         'Fait à ' . $post->getDate() . ' Par ' . $post->getAuthor()->getPseudo() . '<br>';

    echo ' <a href="/dashboard"><button type="button" class="btn btn-warning">Modifier</button></a>';
    echo '<a href="/delete/' . $post->getId() . '"<button type="button" class="btn btn-warning">Delete</button></a>';
    echo "<br> --------------------------------------- <br>";

}
?>
