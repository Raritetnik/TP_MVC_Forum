<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=à, initial-scale=1.0">
    <title>MVC</title>
    <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
    <nav class="navigation">
        <a href="?module=forum&action=accueil">Accueil</a>
        <div>
            <?php
            if(isset($_SESSION['user'])) {
                echo "<a href='#'>".$_SESSION['user']."</a>";
                echo "<a href='?module=user&action=logout'>Déconnection</a>";
             } else {
                echo "<a href='?module=user&action=login'>Connection</a>";
                echo "<a href='?module=user&action=create'>Créer compte</a>";
             }?>
        </div>
    </nav>
    <div class="container">
        <?php echo $content; ?>
    </div>
</body>
</html>