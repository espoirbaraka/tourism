<?php
include '../../includes/sessionconnected.php';
require_once '../dompdf/autoload.inc.php';
ob_start();

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM tbl_reservation
                                                INNER JOIN
                                                tbl_site
                                                ON tbl_reservation.CodeSite=tbl_site.CodeSite
                                                INNER JOIN tbl_client
                                                ON tbl_reservation.CodeClient=tbl_client.CodeClient");
$stmt->execute();

require_once 'content.php';



 $html=ob_get_contents();
 ob_clean();
use Dompdf\Dompdf;
use Dompdf\Options;
 $options =  new Options();
 $options->set('defaultFont', 'Courier');
$pdf= new Dompdf($options);
$pdf->setPaper("A4", "portrait");
$pdf->loadHtml($html);
$pdf->render();
$nom="liste des reservations";
$pdf->stream($nom, array('Attachment'=>0,false));

?>