<form class='form-space' action="index.php?module=user&action=connect" method="post">
<?php if(!isset($data)) { $data = null; } ?>
<div class="form">
    <input type="hidden" name="username" >
        <label>
            Username
            <input type="text" name="username">
        </label>
        <label>
            Password
            <input type="password" name="password" >
        </label>
        <span class="error"><?php echo $data; ?></span>
        <input type="submit" value="Connecter">
</div>
</form>
