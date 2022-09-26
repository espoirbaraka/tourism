<?php
include ("admin/includes/sessionclient.php");

$id = $_GET['code'];

$stmt = $conn->prepare("SELECT * FROM tbl_categorie WHERE CodeCategorie = $id");
$stmt->execute();
$categorie = $stmt->fetch();





$stmt2 = $conn->prepare("SELECT CodeSite as id, Designation, Description, Adresse, Longitude, Latitude, Prevision, TempsPrevision, tbl_site.Image as image, Categorie, Province FROM tbl_site
                                            INNER JOIN tbl_categorie
                                            ON tbl_site.CodeCategorie=tbl_categorie.CodeCategorie
                                            INNER JOIN tbl_province
                                            ON tbl_site.CodeProvince=tbl_province.CodeProvince  
                                            WHERE tbl_site.CodeCategorie=$id                                                                                                      
                                            ORDER BY CodeSite DESC");
$stmt2->execute();

include ("includes/head.php");

include ("includes/header.php");

include("includes/detail_categorie/content.php");

include("includes/footer.php");
?>











