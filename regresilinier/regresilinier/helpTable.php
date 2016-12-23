<?php
/**
 * Created by PhpStorm.
 * User: hary
 * Date: 7/27/2016
 * Time: 7:12 PM
 */
    /*var $koneksi;
    var $selectDB;
    var $result;
    var $row;
    var $jumlah;*/

    $nameserver = "localhost";
    $username   = "root";
    $passwd     = "";
    $dbname     = "regresi";
    $koneksi    = mysql_connect($nameserver, $username, $passwd)or die('error'.mysql_errno());

    /*$this->selectDB = mysql_select_db($dbname, $koneksi);
    if(!$this->selectDB){
        echo "Gagal";
    }*/

    echo "
    <html>
        <table border='1'>
            <tr>
                <th>No.</th>
                <th>X</th>
                <th>Y</th>
                <th>X<sup>2</sup></th>
                <th>Y<sup>2</sup></th>
                <th>X.Y</th>
            </tr>";
    $i = 0;
    $sql = "SELECT number_ticket as x, closed_hour as y from tbltransact_dummy";
    $resultCorrelation = mysql_query($sql);
    while($hasilCorrelation = mysql_fetch_array($resultCorrelation)){
        $i++;
        $squareX = $hasilCorrelation['x']*$hasilCorrelation['x'];
        $squareY = $hasilCorrelation['y']*$hasilCorrelation['y'];
        $mulXY = $hasilCorrelation['x']*$hasilCorrelation['y'];
        echo $i." ".$hasilCorrelation['x']." ".$hasilCorrelation['y']." ".$squareX." ".$squareY." ".$mulXY;
        echo "\n";
        $totalX[] = $hasilCorrelation['x']; //Sigma atau total X
        $totalY[] = $hasilCorrelation['y']; //Sigma atau total Y
        $totalSquareX[] = $squareX; //Sigma atau total dari X kuadrat atau bisa menggunakan fungsi sqrt()
        $totalSquareY[] = $squareY; //Sigma atau total dari Y kuadrat atau bisa menggunakan fungsi sqrt()
        $totalMulXY[] = $mulXY; //Sigma atau total dari X kali Y
    }
    echo "Jumlah ".array_sum($totalX)." ".array_sum($totalY)." ".array_sum($totalSquareX)." ".array_sum($totalSquareY)." ".array_sum($totalMulXY);

    echo "
        </table>
    </html>";
