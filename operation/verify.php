<?php
include '../admin/includes/sessionclient.php';
$conn = $pdo->open();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = htmlspecialchars(sha1($_POST['password']));
    try{
        $stmt = $conn->prepare("SELECT * FROM tbl_client WHERE Email = ? AND Password = ?");
        $stmt->execute(array($email,$password));
        $nbre = $stmt->rowCount();

        if($nbre == 1){
            $row = $stmt->fetch();
            $_SESSION['id_client'] = $row['CodeClient'];
            $_SESSION['client'] = $row['NomClient'];
        }
        else{
            $_SESSION['error'] = 'Compte introuvable';
        }
    }
    catch(PDOException $e){
        echo "Erreur de connexion: " . $e->getMessage();
    }

}
else{
    $_SESSION['error'] = 'Entrez vos identifiants de connexion d\'abord';
}

$pdo->close();
header('location: ../cli_dashboard.php');

?>
