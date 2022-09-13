<?php
function forum_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT forum.id, titre, article, datePublication, utilisateur.nom  FROM `forum`
    INNER JOIN utilisateur ON utilisateur_id = utilisateur.id ORDER BY forum.id DESC;";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}

function forum_model_publication($request) {
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "INSERT INTO forum(titre, article, datePublication, utilisateur_id) VALUES ('$titre','$article','$datePublication','$id');";
    mysqli_query($con, $sql);
    mysqli_close($con);
}


function forum_model_edit() {
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "UPDATE user SET name = '$name', email = '$email', birthday = '$birthday', userCityId = '$userCityId' WHERE userId = '$userId'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function forum_model_find($request) {
    require(CONNEX_DIR);
    $sql = "SELECT * FROM forum WHERE id='$request'";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $result;
}

function forum_model_modify($request) {
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "UPDATE forum SET article = '$article', titre = '$titre' WHERE id = '$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function forum_model_delete($request) {
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "DELETE FROM forum WHERE id = '$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}
?>