<?php
include_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIIT - TEST</title>

</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
    }

    .style_dikit {
        width: 100%;
        background-color: #f1f1c1;
    }
</style>

<body>

    <pre>
    Tulis SQL Query :
        1. Total amount transaksi terminal SV0003
        2. Total amount transaksi kartu Bank C
        3. Tampilkan report dengan kolom sebagai berikut :

     1. SELECT
            a.terminal,
            SUM(a.amount) AS amount
        FROM
            tb_transaksiatm a
        WHERE
            a.terminal = 'SV0003'
        GROUP BY
            a.terminal

        <?php
        $sqlGetTotalAmoutByTerminalSV0003 = "SELECT a.terminal, SUM(a.amount) AS amount FROM tb_transaksiatm a WHERE a.terminal = 'SV0003' GROUP BY a.terminal";
        $resultTotalAmoutByTerminalSV0003 = $conn->query($sqlGetTotalAmoutByTerminalSV0003);
        if ($resultTotalAmoutByTerminalSV0003->num_rows > 0) {
        ?>
            <table class="style_dikit" style="width:50%">
                <tr>
                    <th>No</th>
                    <th>Terminal</th>
                    <th>Amount</th>
                </tr>
                <?php
                $no = 1;
                while ($row = $resultTotalAmoutByTerminalSV0003->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row["terminal"]; ?></td>
                    <td><?php echo $row["amount"]; ?></td>
                </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
            <?php

        } else {
            echo "0 results";
        }

            ?>
        <br/>
    2. 	SELECT
            SUM(a.amount) AS amount,
            c.bank
        FROM
            tb_transaksiatm a
        LEFT JOIN tb_issuer c ON
            LEFT(a.nomor_kartu, 4) = c.prefix
        WHERE
            c.bank = 'C'
        GROUP BY
            c.bank
        <br/>
        <?php
        $sqlGetTotalAmoutByCardBankC = "SELECT SUM(a.amount) AS amount, c.bank FROM tb_transaksiatm a LEFT JOIN tb_issuer c ON LEFT(a.nomor_kartu, 4) = c.prefix WHERE c.bank = 'C' GROUP BY c.bank";
        $resultTotalAmoutByCardBankC = $conn->query($sqlGetTotalAmoutByCardBankC);
        if ($resultTotalAmoutByCardBankC->num_rows > 0) {
        ?>
            <table class="style_dikit" style="width:50%">
                <tr>
                    <th>No</th>
                    <th>Total Amount</th>
                    <th>Bank</th>
                </tr>
                <?php
                $no = 1;
                while ($row = $resultTotalAmoutByCardBankC->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row["amount"]; ?></td>
                    <td><?php echo $row["bank"]; ?></td>
                </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
        <?php
        } else {
            echo "0 results";
        }
        ?>
    3.  SELECT
            b.merk,
            COUNT(b.merk) AS Jumlah_Transaction,
            SUM(a.amount) AS Total_Amount
        FROM
            tb_transaksiatm a
        LEFT JOIN tb_terminalatm b ON
            a.terminal = b.nomor_terminal
        LEFT JOIN tb_issuer c ON
            LEFT(a.nomor_kartu, 4) = c.prefix
        GROUP BY
            b.merk
        <br/><br/>

        <?php
        $sqlGetReportByMerk = "SELECT b.merk, COUNT(b.merk) AS jumlah_transaction, SUM(a.amount) AS total_amount FROM tb_transaksiatm a LEFT JOIN tb_terminalatm b ON a.terminal = b.nomor_terminal LEFT JOIN tb_issuer c ON LEFT(a.nomor_kartu, 4) = c.prefix GROUP BY b.merk";
        $resultReportByMerk = $conn->query($sqlGetReportByMerk);
        if ($resultReportByMerk->num_rows > 0) {
        ?>
            <table class="style_dikit" style="width:50%">
                <tr>
                    <th>No</th>
                    <th>Merk</th>
                    <th>Jumlah Transaksi</th>
                    <th>Total Amount</th>
                </tr>
                <?php
                $no = 1;
                while ($row = $resultReportByMerk->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row["merk"]; ?></td>
                    <td><?php echo $row["jumlah_transaction"]; ?></td>
                    <td><?php echo $row["total_amount"]; ?></td>
                </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
        <?php
        } else {
            echo "0 results";
        }
        ?>
        <b>SOAL PSEUDO-CODE</b>
        <br/>
        <br/>
    1.  Tulis program untuk menampilkan 100 bilangan <b>Ganjil pertama</b>
        <?php
        $i = 0;
        for ($number = 1; $number <= 200; $number++) {
            if ($number % 2 == 1) {
                $i++;
                echo "Bilangan ganjil ke - " . $i . " adalah " . $number . "<br/>";
            }
        }
        ?>


    2.  Tulis program untuk menampilkan 100 bilangan <b>Prima pertama</b>
        <?php
        $number = 0;
        for ($i = 1; $i <= 545; $i++) {

            $k = 0;
            for ($b = 1; $b <= $i; $b++) {
                if ($i % $b == 0) {
                    $k++;
                }
            }
            if ($k == 2) {
                $number++;
                echo "Bilangan Prima ke - " . $number . " adalah " . $i . '<br>';
            }
        }
        ?>
        
    3.	Tulis Program untuk menghitung angka factorial ( misal 5! )
        <?php
        $ParamValue = 5;
        for ($i = 1; $i <= $ParamValue; $i++) {
            $NumberFactorial = 1; // set value default

            if ($i == $ParamValue) {
                //echo $i . "! = ";
                for ($j = $i; $j > 0; $j--) // karena ascending, nilai awal dimulai dari $i dan tiap kali perulangan dikurang 1
                {
                    if ($j == 1) {
                        //echo "1 = " . $ParamValue;
                        echo "1";
                    } else {
                        echo $j . " x ";
                    };
                    $NumberFactorial *= $j; // menghitung hasil NumberFactorial
                }
                echo "</br>";
            }
        }

        ?>
     </pre>


</body>

</html>