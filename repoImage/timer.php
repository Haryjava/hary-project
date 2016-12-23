<html>
<head>
    <?php
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        $year = date("Y");
        $month = date("m");
        $dt = date("d");
        $conn = mysqli_connect('localhost', 'root', '123456', 'stat');

        if (!$conn) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        $query = "SELECT nilai from condt where id='1'";
        $valHour = mysqli_query($conn,$query);
        while($res = mysqli_fetch_array($valHour,MYSQL_ASSOC)){
            $fin = $res['nilai'];
        }
        //$hr = date("H");
        $hr = date("H", strtotime("+$fin hours"));
        $mn = date("i");
        $sc = date("s");

        //echo $hr.' '.$mn.' '.$sc.' : '.$fin;
    ?>
    <title>jQuery Countdown</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost:81/template/css/jquery.countdown.css">
    <script type="text/javascript" src="http://localhost:81/template/js/jquery.plugin.js"></script>
    <script type="text/javascript" src="http://localhost:81/template/js/jquery.countdown.js"></script>
    <style type="text/css">
        body{
            text-align: center;
            #background: #00ECB9;
            font-family: sans-serif;
            font-weight: 100;
        }

        h1{
            color: #396;
            font-weight: 100;
            font-size: 40px;
            margin: 40px 0px 20px;
        }

        #clockdiv{
            font-family: sans-serif;
            color: #fff;
            display: inline-block;
            font-weight: 100;
            text-align: center;
            font-size: 15px;
        }

        #clockdiv > div{
            padding: 10px;
            border-radius: 3px;
            background: #00BF96;
            display: inline-block;
        }

        #clockdiv div > span{
            padding: 15px;
            border-radius: 3px;
            background: #00816A;
            display: inline-block;
        }

        .smalltext{
            padding-top: 5px;
            font-size: 16px;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            var year = new Date();
            var thn = year.getYear();
            var bln = year.getMonth();
            var hr = year.getDate();
            //year = new Date(year.getFullYear(), 11 - 1, 20);
            //new Date(year, month, day, hours, minutes, seconds, milliseconds)

            //year = new Date(thn, bln, hr, 16, 52,30);
            //year = new Date(2016, 9, 7, 11, 52,30);
            year = new Date(2016, 8, 8, <?php echo $hr;?>, 1, 1);
            $('#dvCountDown').countdown({until: year, format: 'HMS'});
            //$('#year').text(austDay.getFullYear());
        });
    </script>
</head>
<body>
<div id="clockdiv">
    <div id="dvCountDown">

    </div>
</div>
</body>
</html>
