<?php if(isset($_SESSION['user']) && ($_SESSION['userId'] == $data['utilisateur_id'])) {?>
<form action='index.php?module=forum&action=modify&id=<?php echo $data['id']; ?>' method='post' class="bloc_texte">
<?php
    if(!isset($data['e_titre'])){ $data['e_titre'] = "";}
    if(!isset($data['e_article'])){ $data['e_article'] = "";}
    ?>
    <h3>Nom utilisateur: <?php echo ($_SESSION['user']);?></h3>
    <label>
        Titre:
        <input type="text" name='titre' value="<?php echo $data['titre']?>">
    </label>
    <p class="error"><?php echo $data['e_titre']; ?></p>
    <label>
        <p>Commentaire:</p>
        <textarea name="article" id="comment"><?php echo $data['article']?></textarea>
    </label>
    <p class="error"><?php echo $data['e_article']; ?></p>
    <input type="submit" value="Envoyer">
</form> <?php } else {
    header("Location: ?module=forum&action=accueil");
}?>