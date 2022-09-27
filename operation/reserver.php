<?php
include '../admin/includes/sessionclient.php';

if(isset($_POST['reserver'])){
    $client = $_POST['id'];
    $date = $_POST['date'];
    $site = $_POST['site'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("SELECT * FROM tbl_reservation WHERE CodeClient=$client AND CodeSite=$site AND Status=0");
        $stmt->execute();
        $nbre = $stmt->rowCount();
        if($nbre==1){
            $_SESSION['error'] = 'Vous avez déjà reservé ce site!!!';
        }else{
            $stmt = $conn->prepare("INSERT INTO tbl_reservation(CodeSite,CodeClient,DateDepart,Status) 
												VALUES(:site,:client,:date,:statut)");
            $stmt->execute(['site'=>$site,'client'=>$client,'date'=>$date,'statut'=>0]);
            $_SESSION['success'] = 'Merci, vous venez d\'effectuer votre reservation. Payer à notre bureau!!!';
        }


    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header('location: ../cli_dashboard');

?>
