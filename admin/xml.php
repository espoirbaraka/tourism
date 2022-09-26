<?php
include 'includes/sessionconnected.php';

function parseToXML($htmlStr)
{
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}


// Select all the rows in the markers table
$stmt = $conn->prepare("SELECT * FROM tbl_site
                              INNER JOIN tbl_categorie
                              ON tbl_site.CodeCategorie=tbl_categorie.CodeCategorie");
$stmt->execute();
if (!$stmt) {
    die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
foreach ($stmt as $row){
    // Add to XML document node
    echo '<marker ';
    echo 'id="' . $row['CodeSite'] . '" ';
    echo 'name="' . parseToXML($row['Designation']) . '" ';
    echo 'address="' . parseToXML($row['Adresse']) . '" ';
    echo 'lat="' . $row['Latitude'] . '" ';
    echo 'lng="' . $row['Longitude'] . '" ';
    echo 'type="' . $row['Categorie'] . '" ';
    echo '/>';
}



// End XML file
echo '</markers>';

?>
