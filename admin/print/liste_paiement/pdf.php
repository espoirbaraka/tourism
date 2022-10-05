<?php
include '../../includes/sessionconnected.php';
require_once '../dompdf/autoload.inc.php';
ob_start();

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM tbl_reservation
                                        INNER JOIN tbl_site
                                        ON tbl_reservation.CodeSite=tbl_site.CodeSite
                                        INNER JOIN tbl_client
                                        ON tbl_reservation.CodeClient=tbl_client.CodeClient
                                        LEFT JOIN tbl_paiement
                                        ON tbl_reservation.CodeReservation=tbl_paiement.CodeReserv    
                                        WHERE Status=1
                                        ORDER BY DateDepart DESC");
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
$nom="liste de paiement";
$pdf->stream($nom, array('Attachment'=>0,false));

?>