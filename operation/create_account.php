<?php
include '../admin/includes/sessionclient.php';

if(isset($_POST['inscription'])){
    $nom = $_POST['nom'];
    $postnom = $_POST['postnom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $nationalite = $_POST['nationalite'];
    $password = $_POST['password'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("INSERT INTO tbl_client(NomClient,PostnomClient,PrenomClient,Telephone,Nationalite,Email,Password) 
												VALUES(:nom,:postnom,:prenom,:telephone,:nationalite,:email,:password)");
        $stmt->execute(['nom'=>$nom,'postnom'=>$postnom,'prenom'=>$prenom,'telephone'=>$telephone,'nationalite'=>$nationalite,'email'=>$email,'password'=>$password]);
        $_SESSION['success'] = 'Compte crée';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header('location: ../connection');

?>
