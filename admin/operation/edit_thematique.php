<?php
include '../includes/sessionconnected.php';

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $detail = $_POST['detail'];
    $filename = $_FILES['photo']['name'];
    if(!empty($filename)){
        move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$filename);
    }

    $conn = $pdo->open();
    if($detail=='' AND $filename=='' AND $titre!=''){
        try{
            $stmt = $conn->prepare("UPDATE tbl_categorie_pub SET Categorie=:titre WHERE CodeCateg=:code");
            $stmt->execute(['titre'=>$titre, 'code'=>$id]);
            $_SESSION['success'] = 'Thématique modifié';
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }
    }
    elseif($detail=='' AND $titre!=''  AND $filename!=''){
        try{
            $stmt = $conn->prepare("UPDATE tbl_categorie_pub SET Categorie=:titre, Photo=:photo WHERE CodeCateg=:code");
            $stmt->execute(['titre'=>$titre, 'photo'=>$filename, 'code'=>$id]);
            $_SESSION['success'] = 'Thématique modifié';
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }
    }else{
        try{
            $stmt = $conn->prepare("UPDATE tbl_categorie_pub SET Categorie=:titre, Contenue=:detail, Photo=:photo WHERE CodeCateg=:code");
            $stmt->execute(['titre'=>$titre, 'detail'=>$detail, 'photo'=>$filename, 'code'=>$id]);
            $_SESSION['success'] = 'Thématique modifié';
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }
    }



    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header("location: ../thematique.php");

?>
