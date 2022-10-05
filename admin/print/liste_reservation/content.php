<?php
//include '../../includes/sessionconnected.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    <h2>LISTE DES RESERVATIONS</h2>
    <h5> Imprimmé le <?= date("d.m.Y h:i") ?></h5>
</header>
<div class="tab">
    <table>
        <thead>
        <tr>
            <th> Site</th>
            <th>Client</th>
            <th>Date reservation</th
            <th>Date depart</th>

        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($stmt as $reservation) {
            echo "
                          <tr>
                            <td>" . $reservation['Designation'] . "</td>
                            <td>" . $reservation['NomClient'] . ' ' . $reservation['PostnomClient'] . "</td>
                            <td>".date("d/m/Y", strtotime($reservation['Date']))."</td>
                            <td>".date("d/m/Y", strtotime($reservation['DateDepart']))."</td>
                          </tr>
                        ";
        } ?>
        </tbody>
    </table>
</div>
</body>
</html>
<style>
    * {
        padding: 0;
        margin: 0;
        font-family: 'Franklin Gothic Medium', 'Times New Roman', Times, serif;
    }

    body {
        padding: 5px;
    }

    .titre span {
        color: green;
        font-size: 1.3em;
    }

    header {
        width: 100%;
    }

    header h2 {
        text-align: center;
        margin: 5px 30px;
        border-bottom: 0.2px solid gray;
        font-weight: 100;
    }

    header h5 {
        text-align: center;
        margin: 5px 30px;
        color: red;
        font-weight: 100;
    }

    .tab {
        margin: 5px 30px;
        border: 0.2px solid black;
    }

    .tab table {
        border-collapse: collapse;
        width: 100%;
    }

    .tab table thead {
        background: rgba(128, 128, 128, 0.2);
        color: black;
    }

    .tab table thead tr th {
        padding: 5px 2px;
    }


    .tab table tbody tr td {
        border: 0.1px solid rgba(128, 128, 128, 0.2);
    }

    .tab table tbody tr:nth-child(even) {
        background: rgba(128, 128, 128, 0.1);
    }
</style>