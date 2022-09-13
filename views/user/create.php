<form class='form-space' action="index.php?module=user&action=insert" method="post">
    <?php
    if(!isset($data['e_nom'])){ $data['e_nom'] = "";}
    if(!isset($data['e_username'])){ $data['e_username'] = "";}
    if(!isset($data['e_password'])){ $data['e_password'] = "";}


    if(!isset($data['nom'])){ $data['nom'] = "";}
    if(!isset($data['username'])){ $data['username'] = "";}
    ?>
    <div class="form">
        <label>
            <p>Nom</p>
            <input type="text" name="nom" value="<?php echo $data['nom'];?>">
        </label>
        <span class="error"><?php echo $data['e_nom']; ?></span>
        <label>
            <p>Date de naissance</p>
            <input type="date" name="dateNaissance">
        </label>
        <label>
            <p>Username</p>
            <input type="email" name="username" value="<?php echo $data['username'];?>">
        </label>
        <span class="error"><?php echo $data['e_username']; ?></span>
        <label>
            <p>Mot de passe</p>
            <input type="password" name="password">
        </label>
        <span class="error"><?php echo $data['e_password']; ?></span>
        <input type="submit" id="sub" value="Créer compte">
    </div>
</form>
