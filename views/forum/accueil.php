<header>
    <h1>Bienvenu sur le forum de Collège Maisonneuve</h1>
</header>
<main>
    <div class="contenu">
        <?php
        if(!isset($data['e_titre'])){ $data['e_titre'] = "";}
        if(!isset($data['e_article'])){ $data['e_article'] = "";}
        ?>
        <?php if(isset($_SESSION['user'])) {?>
        <form action='index.php?module=forum&action=publier' method='post' class="bloc_texte">
            <h3>Nom utilisateur: <?php echo ($_SESSION['user']);?></h3>
            <label>
                Titre:
                <input type="text" name='titre'>
            </label>
            <p class="error"><?php echo $data['e_titre']; ?></p>
            <label>
                <p>Commentaire:</p>
                <textarea name="article" id="comment"></textarea>
            </label>
            <p class="error"><?php echo $data['e_article']; ?></p>
            <input type="submit" value="Envoyer">
        </form> <?php }?>
        <div class="bloc_information">
            <p>Vous êtes sur la page de forum de Collège Maisonneuve. Vous pouvez laissez une message d'article que vous désirer partager avec les autres utilisateurs. Tous les sujets sont abordable dans les limites de la décence.</p>
        </div>
    </div>
    <div class="liste_comments">
        <!-- ******************************** -->
        <?php if(isset($data)){ foreach($data as $row) { if(isset($row['id'])) { ?>

        <div class="comment">
            <img class="profil-icon" src="resources/images/profile.png" alt="">
            <div class="comment__content">
                <div class="comment_autor">
                    <h3>Utilisateur: <span><?php echo $row["nom"]; ?></span></h3>
                    <h4>Titre: <span><?php echo $row["titre"]; ?></h4>
                </div>
                <div class="comment_texte">
                    <p><?php echo $row["article"] ?></p>
                    <div>
                    <p>Publié: <?php echo $row["datePublication"] ?></p>
                    <div>
                        <?php if(isset($_SESSION['user']) && ($row['nom'] == $_SESSION['user'])) {
                        echo "<a href='?module=forum&action=edit&id=".$row['id']."'>Éditer</a>";
                        echo "<a href='?module=forum&action=delete&id=".$row['id']."'>Supprimer</a>";}?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******************************** -->
        <?php }}}?>
    </div>
</main>