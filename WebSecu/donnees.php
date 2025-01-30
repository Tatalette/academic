<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=htmlspecialchars(trim($_POST['nom']));
    $prenom=htmlspecialchars(trim($_POST['prenom']));
    $birthday=htmlspecialchars(trim($_POST['birthday']));
    $email=htmlspecialchars(trim($_POST['email']));
    $password=htmlspecialchars(trim($_POST['password']));
    $genre=htmlspecialchars(trim($_POST['genre']));
}

    if(empty($name) || empty($prenom) || empty($email) || empty($password) || empty($genre)){
        die("Tous les champs sont obligatoires");
    }
    
    $hashedpassword=password_hash($password,PASSWORD_BCRYPT);
    $data=[
        'name'=> $name,
        'email' => $email,
        'birtday' => $birthday,
        'password' => $hashedPassword
    ]

    $xmlFile = new DOMDocument('1.0','utf-8');
    $xmlFile->appendChild($compte = $xmlFile ->createElement('compte'))
    
    }


?>