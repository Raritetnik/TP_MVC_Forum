<?php

function forum_controller_accueil(){
    require(MODEL_DIR.'/forum.php');
    $data = forum_model_list();
    render(VIEW_DIR.'/forum/accueil.php', $data);
}

function forum_controller_publier($request) {
    require(MODEL_DIR.'/forum.php');
    $data = forum_model_list();
    $errors = forum_verification_publication($request);
    $data = $data + $errors;
    if(!$data['isValid']){
        render(VIEW_DIR.'/forum/accueil.php', $data);
    } else {
        $request['id'] = $_SESSION['userId'];
        $request['datePublication'] = date("Y-m-d");
        //print_r($request);
        forum_model_publication($request);
        header("Location: ?module=forum&action=accueil");
    }
}

function forum_controller_edit($request) {
    require(MODEL_DIR.'/forum.php');
    $data = forum_model_find($request['id']);
    render(VIEW_DIR.'/forum/edit.php', $data);
}

function forum_controller_delete($request) {
    require(MODEL_DIR.'/forum.php');
    forum_model_delete($request);
    header("Location: ?module=forum&action=accueil");
}

function forum_controller_modify($request) {
    require(MODEL_DIR.'/forum.php');

    $data = forum_model_find($request['id']);
    $errors = forum_verification_publication($request);
    $data = array_merge($data, $errors);
    if(!$data['isValid']){
        render(VIEW_DIR.'/forum/edit.php', $data);
    } else {
        forum_model_modify($request);
        header("Location: ?module=forum&action=accueil");
    }
}


/* *************************** */

function forum_verification_publication($information) {
    $erreur['isValid'] = true;
    foreach($information as $key=>$value){
        $$key = $value;
        if($key == 'titre'){
            if(strlen($value)<5 || strlen($value)>100 ){
                $erreur['e_titre'] = "Le titre doit etre entre 2 et 100 caractères";
                $erreur['isValid'] = false;
            }
        }elseif($key == 'article'){
            if(strlen($value)>1000 ){
                $erreur['e_article']= "L'article peut avoir un maximum de 1000 caractères";
                $erreur['isValid'] = false;
            }
        }
    }
    return $erreur;
}


?>