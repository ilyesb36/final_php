<?php

$manager = new PersonnageManager(PDOFactory::getMySqlConnection());

$nom = $_POST['nom'];
$classe  = $_POST['classe'];


echo "<h1>Ajouter un Autheur</h1>";
echo "L'auteur a été ajouté !";
echo "<br> <br>";
echo "Redirection automatique dans 2 secondes";
header("Refresh:2;url=index.php");