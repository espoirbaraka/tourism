<?php
include ("admin/includes/sessionclient_connect.php");

$id = $_GET['code'];

$stmt = $conn->prepare("SELECT CodeSite as id, Designation, Description, Adresse, Longitude, Latitude, Prevision, TempsPrevision, tbl_site.Image as image, Gestionnaire, Categorie, Province FROM tbl_site
                                            INNER JOIN tbl_categorie
                                            ON tbl_site.CodeCategorie=tbl_categorie.CodeCategorie
                                            INNER JOIN tbl_province
                                            ON tbl_site.CodeProvince=tbl_province.CodeProvince 
                                            WHERE CodeSite = $id");
$stmt->execute();
$site = $stmt->fetch();

include ("includes/head.php");

include ("includes/header.php");

include("includes/reserver/content.php");

include("includes/footer.php");
?>











