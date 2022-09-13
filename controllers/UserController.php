<?php

function user_controller_create(){
    render(VIEW_DIR.'/user/create.php');
}

function user_controller_insert($request){
    require(MODEL_DIR.'/user.php');
    $data = user_verification_create($request);
    $data = array_merge($data, $request);

    if($data['isValid']){
        user_model_insert($request);
        header("Location: ?module=forum&action=accueil");
    } else {
        render(VIEW_DIR.'/user/create.php', $data);
    }
}


/** Connection et Déconnection de l'utilisateur */
function user_controller_connect($request) {
    require(MODEL_DIR.'/user.php');
    $user = user_model_verification($request);
    if(isset($user)) {
        $_SESSION['user'] = $user['nom'];
        $_SESSION['userId'] = $user['id'];
        header("Location: ?module=forum&action=accueil");
    } else {
        $data = "Mauvais username ou password. Reessayer";
        render(VIEW_DIR.'/user/login.php', $data);
    }
}
function user_controller_login() {
    render(VIEW_DIR.'/user/login.php');
}
function user_controller_logout() {
    session_unset();
    render(VIEW_DIR.'/user/login.php');
}


/* ************************ */

function user_verification_create($information) {
    $erreur['isValid'] = true;
    foreach($information as $key=>$value){
        $$key = $value;
        if($key == 'nom'){
            if(strlen($value)<2 || strlen($value)>25 ){
                $erreur['e_nom'] = "Le nom doit etre entre 2 et 25 carac";
                $erreur['isValid'] = false;
            }
        }elseif($key == 'username'){
            if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                $erreur['e_username']= "username doit etre un courriel valide";
                $erreur['isValid'] = false;
            }
        }elseif($key == 'password'){
            if(strlen($value)<6 || strlen($value)>20 ){
                $erreur['e_password']= "Le mot de passe doit etre entre 6 et 20 carac";
                $erreur['isValid'] = false;
            }
        }
    }
    return $erreur;
}