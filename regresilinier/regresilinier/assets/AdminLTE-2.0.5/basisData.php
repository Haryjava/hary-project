<?php
/**
 * Created by PhpStorm.
 * User: hary
 * Date: 7/16/2016
 * Time: 5:33 PM
 */

class database{
    var $koneksi;
    var $selectDB;
    var $result;
    var $row;
    var $jumlah;

    const POPULASI = '280';
    //Nilai tingkat kesalahan/ taraf signifikansi yang diberikan sebesar 10%, disamping 95% atau 0.05
    // (dari taraf signifikansi 5% yang biasa digunakan oleh ilmu sosial karena perilaku manusia yang berbeda-beda)
    const KONSTANTA = '1'; // Atau 100%
    //Function tambahan dibawah ini digunakan untuk table penolong dan persamaan regresi linier

    function getData(){
        $con = mysqli_connect("localhost","root","","regresi");
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }

        $sql = "SELECT COUNT(id) as numb from tbltransact_dummy";
        $resultSample = mysqli_query($con,$sql);
        while($hasilSample= mysqli_fetch_array($resultSample,MYSQLI_ASSOC)){
            $hasil = $hasilSample['numb'];
        }
        return $hasil;
    }

    function numPopulation(){
        $con = mysqli_connect("localhost","root","","regresi");
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }
        // Checking Population to define Sample Number
        $sql = "SELECT sum(number_ticket) as sample from tbltransact";
        $resultSample = mysqli_query($con,$sql);
        while($hasilSample= mysqli_fetch_array($resultSample,MYSQLI_ASSOC)){
            $popl = $hasilSample['sample'];
        }
        if($popl=='74' && $popl<'75'){
            echo '280';
        }elseif($popl>='75' && $popl<'78'){
            echo '300';
        }elseif($popl>='78' && $popl<'80'){
            echo '350';
        }elseif($popl>='80' && $popl<'82'){
            echo '400';
        }elseif($popl>='82' && $popl<'86'){
            echo '450';
        }elseif($popl>='86' && $popl<'89'){
            echo '600';
        }elseif($popl>='89' ){
            echo '800';
        }
        //return database::POPULASI;
    }

    function numSample(){
        $con = mysqli_connect("localhost","root","","regresi");
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }


        // Bypass nilai constant KONSTANTA, query langsung dari table
        $sql = "SELECT sum(number_ticket) as sample from tbltransact";
        $resultSample = mysqli_query($con,$sql);
        while($hasilSample= mysqli_fetch_array($resultSample,MYSQLI_ASSOC)){
            echo $hasilSample['sample'];
        }
    }

    function tablePenolong(){ // Digunakan langsung pada template dashboard 3
        $con = mysqli_connect("localhost","root","","regresi");
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }

        $i = 0;
        $sql = "SELECT number_ticket as x, closed_hour as y from tbltransact_dummy";
        $resultCorrelation = mysqli_query($con,$sql);
        while($hasilCorrelation = mysqli_fetch_array($resultCorrelation,MYSQLI_ASSOC)){
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
    }

    // Mencari nilai-nilai/ 'value of' untuk persamaan rumus regresi linier sederhana y = a + b . x
    function valueofB(){
        $con = mysqli_connect("localhost","root","","regresi");
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }

        $sql = "SELECT number_ticket as x, closed_hour as y from tbltransact_dummy";
        $resultCorrelation = mysqli_query($con,$sql);
        while($hasilCorrelation = mysqli_fetch_array($resultCorrelation,MYSQLI_ASSOC)){
            $mulXY = $hasilCorrelation['x']*$hasilCorrelation['y'];
            $squareX = $hasilCorrelation['x']*$hasilCorrelation['x'];
            $totalX[] = $hasilCorrelation['x'];
            $totalY[] = $hasilCorrelation['y'];
            $totalSquareX[] = $squareX;
            $totalMulXY[] = $mulXY;
        }
        //$n = database::DATAPENOLONG;
        $n = database::getData();
        $sigmaMulXY = array_sum($totalMulXY);
        $sigmaX = array_sum($totalX);
        $sigmaY = array_sum($totalY);
        $sqrtX = array_sum($totalSquareX);

        $top = ($n*$sigmaMulXY)-($sigmaX*$sigmaY);
        $bottom = ($n*$sqrtX)-pow($sigmaX,2);
        $b = $top/$bottom;
        // Mengambil 7 digit presisi dalam desimal
        return number_format((float)$b,7,'.','');
    }

    function valueofA(){
        $con = mysqli_connect("localhost","root","","regresi");
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }


        $sql = "SELECT number_ticket as x, closed_hour as y from tbltransact_dummy";
        $resultCorrelation = mysqli_query($con,$sql);
        while($hasilCorrelation = mysqli_fetch_array($resultCorrelation,MYSQLI_ASSOC)){
            $totalX[] = $hasilCorrelation['x'];
            $totalY[] = $hasilCorrelation['y'];
        }
        $sigmaX = array_sum($totalX);
        $n = database::getData();
        $xAksen = $sigmaX/$n;
        $xAksenDec = number_format((float)$xAksen,4,'.','');

        $sigmaY = array_sum($totalY);
        $yAksen = $sigmaY/$n;
        $yAksenDec = number_format((float)$yAksen,6,'.','');

        $getValueofB = database::valueofB();
        $a = $yAksenDec - ($getValueofB*$xAksenDec);
        return $a;
    }

    function numCorrelation(){
        $con = mysqli_connect("localhost","root","","regresi");
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }

        $sql = "SELECT number_ticket as x, closed_hour as y from tbltransact_dummy";
        $resultCorrelation = mysqli_query($con,$sql);
        while($hasilCorrelation = mysqli_fetch_array($resultCorrelation,MYSQLI_ASSOC)){
            $squareX = $hasilCorrelation['x']*$hasilCorrelation['x'];
            $squareY = $hasilCorrelation['y']*$hasilCorrelation['y'];
            $mulXY = $hasilCorrelation['x']*$hasilCorrelation['y'];
            $totalX[] = $hasilCorrelation['x'];
            $totalY[] = $hasilCorrelation['y'];
            $totalSquareX[] = $squareX;
            $totalSquareY[] = $squareY;
            $totalMulXY[] = $mulXY;
        }
        $n = database::getData();
        $sigmaXMulY = array_sum($totalMulXY);
        $sigmaX = array_sum($totalX);
        $sigmaY = array_sum($totalY);
        $sigmaSquareX = array_sum($totalSquareX);
        $sigmaSquareY = array_sum($totalSquareY);
        $sigmaXsquare = array_sum($totalX)*array_sum($totalX);
        $sigmaYsquare = array_sum($totalY)*array_sum($totalY);

        $top = ($n*$sigmaXMulY)-($sigmaX*$sigmaY);
        $bottom = sqrt(($n*$sigmaSquareX-$sigmaXsquare)*($n*$sigmaSquareY-$sigmaYsquare));
        $r = $top/ $bottom;
        // Hasil di absolute-kan
        return abs(number_format((float)$r,2,'.',''));
    }

    function coefDetermination(){
        $getNumCorrelation = database::numCorrelation();
        $konstanta = database::KONSTANTA;
        $KP = ($getNumCorrelation*$getNumCorrelation)*$konstanta;
        $percentage = $KP*100;
        return $KP." atau ".$percentage."%";
    }

    function getRange(){
        $con = mysqli_connect("localhost","root","","regresi");
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }

        $sql = "SELECT sum(number_ticket) as numb from tbltransact";
        $resultSample = mysqli_query($con,$sql);
        while($hasilSample= mysqli_fetch_array($resultSample,MYSQLI_ASSOC)){
            $hasil = $hasilSample['numb'];
        }
        //echo $hasil; //checking
        $stat = $hasil;
        $x = 1;
        //Unmark logic dibawah ini untuk detail lama pengerjaan
        //echo "<b>y = a + b . x</b></br>";
        /*echo "y = a + b . x"."\n";
        while($x<=$stat){
            $getValueofA = database::valueofA();
            $getValueofB = database::valueofB();
            $y = $getValueofA+($getValueofB*$x);
            // Menggantikan fungsi ceil dan floor
            //echo round($y)." = ".$getValueofA." + ".$getValueofB." * ".$x."</br>";
            echo round($y)." = ".$getValueofA." + ".$getValueofB." * ".$x."\n";
            $x++;
        }*/
        //Ikhtisar lama pengerjaan gangguan
        echo "<b>Jumlah Ticket Masuk | Waktu (Jam)</b></br>";
        while($x<=$stat){
            $getValueofA = database::valueofA();
            $getValueofB = database::valueofB();
            $y = $getValueofA+($getValueofB*$x);
            $insY = round($y);
            $sqlsert = "insert into range_table VALUES ('$x','$insY')";
            mysqli_query($con,$sqlsert);
            $x++;
        }

        $rangeDate = "SELECT x, y from range_table group by y";
        $resultRange = mysqli_query($con,$rangeDate);
        while($dataRange = mysqli_fetch_array($resultRange,MYSQLI_ASSOC)){
            $range = $dataRange['x']+2;
            if($dataRange['x']==1){
                echo "<pre>0 s.d. ".$dataRange['x']."     ".$dataRange['y']."</br></pre>";
            }
            if($dataRange['x']>1){
                echo "<pre>".$dataRange['x']." s.d. ".$range."     ".$dataRange['y']."</br></pre>";
            }
        }
    }
}

