<?php
include '../includes/sessionconnected.php';

if(isset($_GET['return'])){
    $return = $_GET['return'];

}
else{
    $return = '../home';
}

if(isset($_POST['save'])){
    $password_actuel = sha1($_POST['password_actuel']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $photo = $_FILES['photo']['name'];
    if($password_actuel == $user['Password']){
        if(!empty($photo)){
            move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$photo);
            $filename = $photo;
        }
        else{
            $filename = $user['photo'];
        }


        $conn = $pdo->open();

        try{
            $stmt = $conn->prepare("UPDATE tbl_user SET Username=:username, Password=:password, Photo=:photo WHERE CodeUser=:code");
            $stmt->execute(['username'=>$username, 'password'=>$password, 'photo'=>$filename, 'code'=>$user['CodeUser']]);

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