<?php
function forum_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT Forum.id, titre, article, datePublication, Utilisateur.nom  FROM Forum
    INNER JOIN Utilisateur ON utilisateur_id = Utilisateur.id ORDER BY Forum.id DESC;";
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
    $sql = "INSERT INTO Forum (titre, article, datePublication, utilisateur_id) VALUES ('$titre','$article','$datePublication','$id');";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function forum_model_find($request) {
    require(CONNEX_DIR);
    $sql = "SELECT * FROM Forum WHERE id='$request'";
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
    $sql = "UPDATE Forum SET article = '$article', titre = '$titre' WHERE id = '$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function forum_model_delete($request) {
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "DELETE FROM Forum WHERE id = '$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}
?>