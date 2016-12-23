<?php
	$con = mysqli_connect("localhost","root","123456","stat");
                    if(mysqli_connect_errno()){
                        echo "Failed to connect to MySQL: ".mysqli_connect_error();
                    }

                    $sql = "SELECT uri,nilai as numb from condt";
                    $resultSample = mysqli_query($con,$sql);
                    while($hasilSample= mysqli_fetch_array($resultSample,MYSQLI_ASSOC)){
                        $hasil = $hasilSample['numb'];
			$hasil2 = $hasilSample['uri'];
                    }
                    echo "<font size='2' color='yellow'>Last scheduled set : per ".$hasil." Hours<br>
			Hit to URI : ".$hasil2." 
</font>";
?>
