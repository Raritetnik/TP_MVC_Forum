<?php

function user_model_insert($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO utilisateur (nom, username, password, dateNaissance) VALUES ('$nom','$username','$password', '$dateNaissance')";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function user_model_verification($request) {
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "SELECT id, nom, password FROM utilisateur WHERE username = '$username';";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($result);
    mysqli_close($con);
    if(password_verify($password, $result['password'])){
        return $result;
    } else {
        return null;
    }
}

?>