<!DOCTYPE HTML>

<h1> Ajouter un post </h1>

<div>
    <form method="post" action="" enctype="multipart/form-data">
        <p>
        	<label value = "Title"> Intitulé du post: </label><input type = "text" name="titre"></input>
        </p>
        <p>
        	<label value ="Content"> Contenu </label></br>
        	<textarea name = "texte" rows= "10" cols= "60"></textarea>
        </p>
        <input type='file' name="uploadedFile">
        <p>
        	<input type= "submit" name="uploadBtn" value="Poster" ></input>
        </p>
    </form>
</div>