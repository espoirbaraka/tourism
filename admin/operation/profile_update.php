<?php
include '../includes/sessionconnected.php';

if(isset($_GET['return'])){
    $return = $_GET['return'];

}
else{
    $return = '../home.php';
}

if(isset($_POST['save'])){
    $password_actuel = sha1($_POST['password_actuel']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $photo = $_FILES['photo']['name'];
    if($password_actuel == $user['password']){
        if(!empty($photo)){
            move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$photo);
            $filename = $photo;
        }
        else{
            $filename = $user['photo'];
        }


        $conn = $pdo->open();

        try{
            $stmt = $conn->prepare("UPDATE tbl_user SET username=:username, password=:password, email=:email, Photo=:photo WHERE id=:code");
            $stmt->execute(['username'=>$username, 'password'=>$password, 'email'=>$email, 'photo'=>$filename, 'code'=>$user['id']]);

            $_SESSION['success'] = 'Compte mis à jour avec succès';
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }

        $pdo->close();

    }
    else{
        $_SESSION['error'] = 'Mot de passe incorrect';
    }
}
else{
    $_SESSION['error'] = 'Compléter les informations réquises avant tout';
}

header('location:'.$return);

?>