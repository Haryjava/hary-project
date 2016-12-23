<?php
$this->load->view('template/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet"
      type="text/css" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html"/>
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />

<!-- Timepicker and Customs -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQueryUI/jquery-ui.css')?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQueryUI/hovereffect.css')?>" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQueryUI/jquery-1.12.4.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQueryUI/jquery-ui.js') ?>" type="text/javascript"></script>
<!--------------------->

<!--- for countdown --->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<link rel="stylesheet" type="text/css" href="http://localhost:81/template/css/jquery.countdown.css">
<script type="text/javascript" src="http://localhost:81/template/js/jquery.plugin.js"></script>
<script type="text/javascript" src="http://localhost:81/template/js/jquery.countdown.js"></script>
<!--------------------->

<!-- Just for fun with font awesome -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!------------------------------------>
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <!--<h1>
        tester : <i class="fa fa-qq" aria-hidden="true"></i> Hit Bot Simulation
        <small>Display</small><br>
    </h1>-->
    <h1>
        tester : <i class="fa fa-linux" aria-hidden="true"></i>Hit Bot Simulation
        <small>Display</small><br>
    </h1>
	<!-------------------------------------- Timer -------------------------------------->
	
	<?php
        	header("Cache-Control: no-cache");
	        header("Pragma: no-cache");
	        $year = date("Y");
        	$month = date("m", strtotime("-1 month"));
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
	        $hr = date("H", strtotime("+$fin hours"));
        	$mn = date("i");
	        $sc = date("s");

        	//echo $hr.' '.$mn.' '.$sc.' : '.$fin;
    	?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost:81/template/css/jquery.countdown.css">
    <script type="text/javascript" src="http://localhost:81/template/js/jquery.plugin.js"></script>
    <script type="text/javascript" src="http://localhost:81/template/js/jquery.countdown.js"></script>
	<style type="text/css">
        body{
            #text-align: center;
            #background: #00ECB9;
            #font-family: sans-serif;
            #font-weight: 100;
        }

        h1{
            #color: #396;
            #font-weight: 100;
            #font-size: 40px;
            #margin: 40px 0px 20px;
        }

        #clockdiv{
            font-family: sans-serif;
            color: #fff;
            display: inline-block;
            font-weight: 110;
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
            
	        //year = new Date(2016, 11 - 3, 8, <?php echo $hr;?>, 1, 1);
            //year = new Date(<?php echo $year; ?>, 11 - 3, <?php echo $dt; ?>, <?php echo $hr;?>, 1, 1);
            year = new Date(<?php echo $year; ?>, <?php echo $month; ?>, <?php echo $dt; ?>, <?php echo $hr;?>, 1, 1);
            $('#dvCountDown').countdown({until: year, format: 'HMS'});
        });
	</script>
    <div align="center">
	<div id="clockdiv">
		<div id="dvCountDown">

		</div>
	</div>
    </div>
	<!----------------------------------------------------------------------------------->
    <ol class="breadcrumb">
        <li><a href="http://localhost/dashboard5"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <!--------------------------------------------Hit Bot Information--------------------------------------->

    <div class="row">
        <div class="col-sm-6">
            <div class="box box-info">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Latest Historical Hit</h3>
                </div>
                <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                ?>
                <?php
                $directory='/var/www/html/regresilinier/regresilinier/application/views/result/';
                $inform = exec('ls -latr /var/www/html/regresilinier/regresilinier/application/views/result/ | grep \'.txt\' | tail -1 | awk \'{print $9}\'');
                $display = file_get_contents("$directory$inform");

                echo "<iframe width='530px' height='350px' style='background-color: black' frameborder='0' frameborder='no' scrolling='yes' src='http://localhost:81/testing.php'>";
                echo "</iframe>";
                ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <i class="ion ion-stats-bars"></i>
                    <h3 class="box-title">Hit Stats</h3>
                </div>
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-9 col-sm-8">
                            <div class="pad">
                                <!-- Map will be created here -->
                                <?php
                                // Failed contained status :
                                // 400 Proxy detectou um erro
                                // 401 Unauthorized
                                // 504 Gateway Timeout
                                // etc
                                $totalResult = exec('/bin/bash /var/www/html/repoImage/stats.sh > /var/www/html/repoImage/fullstats.txt');
                                $fin = file_get_contents("/var/www/html/repoImage/fullstats.txt");
                                echo "<pre>".$fin."</pre>";
                                ?>
                            </div>
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Downloads ProxyList Success   <i class="fa fa-hand-o-down fa-1x" aria-hidden="true"></i></span>
                                    <!--- These part was handled by cronjob ---->
                                    <span class="info-box-number">
                                        <a href="http://localhost:81/<?php $now = date("Ymd"); /*$oneLast = date("Ymd",strtotime('-1 day'));*/ echo $now;?>-getHere.txt">Click Here</a>
                                        <!--<script>
                                            window.onload() = function() {
                                                window.open("url","_blank");
                                            }
                                        </script>-->
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 70%"></div>
                                    </div>
                                    <span class="progress-description">
                                        Summary
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="pad box-pane-right bg-green" style="min-height: 220px">
                                <div class="description-block margin-bottom">
                                    <i class="fa fa-bar-chart fa-2x"></i>
                                    <h5 class="description-header">
                                        <?php
                                        //$firstBar = shell_exec("grep success /var/www/html/repoImage/fullstats.txt | awk '{print $6}'");
					$firstBar = shell_exec("cat /var/www/html/repoImage/repo_list/warehouse.txt | sort -u | wc -l");
                                        echo $firstBar;
                                        ?></h5>
                                    <span class="description-text">Success Hit</span>
                                </div>
                                <div class="description-block margin-bottom">
                                    <i class="fa fa-area-chart fa-2x"></i>
                                    <h5 class="description-header">
                                        <?php
                                            //$secondBar = shell_exec("grep fail /var/www/html/repoImage/fullstats.txt | awk '{print $6}'");
						$secondBar = shell_exec("cat /var/www/html/repoImage/repo_list/warehouse.txt | wc -l");
                                            echo $secondBar;
                                        ?></h5>
                                    <span class="description-text">Total Hit</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--------------------------------------------Hit Bot Simulation--------------------------------------->

    <div class="row">
        <div class="col-md-7">
            <div class="box box-info">
                <div class="box-header" align="left">
                    <i class="fa fa-archive"></i>
                    <h3 class="box-title">Define Archive</h3>

                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <!--<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div>
                <div class="col-xs-5" align="left">
                    <span class="label label-warning">Upload Archive</span>
                    <?php

                    error_reporting(E_ALL);
                    ini_set('display_errors',1);

                    echo "<br>";
                    //ini_set('max_execution_time', 300);
                    $timePointLess = date("Ymd")."_full.txt";
                    if(isset($_POST['btn-upload']))
                    {
                        $timePoint = date("YmdHis").".txt";
                        $timePointLess = date("Ymd")."_full.txt";
                        $file = $timePoint.rand(1000,100000)."-".$_FILES['file']['name'];
                        $file_loc = $_FILES['file']['tmp_name'];
                        $file_size = $_FILES['file']['size'];
                        $file_type = $_FILES['file']['type'];
                        $folder="/var/www/html/regresilinier/regresilinier/application/views/uploads/";

                        // new file size in KB
                        $new_size = $file_size/1024;
                        // new file size in KB

                        // make file name in lower case
                        $new_file_name = strtolower($file);
                        // make file name in lower case

                        $final_file=str_replace(' ','-',$new_file_name);
                        if(move_uploaded_file($file_loc,$folder.$final_file))
                        {
                            exec("/bin/bash /var/www/html/repoImage/exec.sh 2>&1");

                            ?>
                            <!--<script>
                                alert('successfully uploaded');
                                window.location.href='http://localhost/dashboard5';
                            </script>-->
                            <?php
                        }
                        else
                        {
                            ?>
                            <script>
                                alert('error while uploading file');
                                window.location.href='http://localhost/dashboard5';
                            </script>
                            <?php
                        }

                    }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file" />
                        <button class="pull-left btn btn-default" type="submit" name="btn-upload">upload</button>
                    </form>

                </div>

                <div class="col-xs-3">
                    <span class="label label-primary">Populate List Proxy</span>
                    <?php

                    echo "<br>";
                    //ini_set('max_execution_time', 300);
                    if(isset($_POST['btn-populate']))
                    {
                        $folderPop="/var/www/html/regresilinier/regresilinier/application/views/populate/*";
                        $dst="/var/www/html/regresilinier/regresilinier/application/views/populate_final/";
                        exec("cat $folderPop > $dst/$timePointLess");
                        //echo 'Populate IP has been located at : '.$dst;
                        ?>
                        <script>
                            setTimeout(function() {
                                alert('Success Populated!');
                            }, 2000);
                        </script>
                        <?php
                    }
                    else
                    {
                        ?>
                        <!--<script>
                            setTimeout(function() {
                                alert('Populate failed');
                            }, 3000);
                        </script>-->
                        <?php
                    }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <button class="pull-center btn btn-default" type="submit" name="btn-populate">populate first</button>
                    </form>
                    <!------------------------------OOOOOOO----------------------------------->
                    <br />
                </div>

                <div class="col-xs-3">
                    <span class="label label-success">Get Attachments Manually</span>
                    <?php

                    echo "<br>";
                    if(isset($_POST['btn-attachment']))
                    {
                        exec("/bin/bash /var/www/html/repoImage/get.sh");
                        ?>
                        <script>
                            setTimeout(function() {
                                alert('Get Attachments process !..');
                            }, 2000);
                        </script>
                        <?php
                    }
                    else
                    {
                        ?>
                        <!--<script>
                            setTimeout(function() {
                                alert('Populate failed');
                            }, 3000);
                        </script>-->
                        <?php
                    }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <button class="pull-center btn btn-default" type="submit" name="btn-attachment">Process</button>
                    </form>
                    <!------------------------------OOOOOOO----------------------------------->
                    <br />
                </div>

                <div class="col-xs-1"></div>
                <div class="box-footer clearfix">
                    <!-- Emptying content of this tag make your box-info fit and proper -->
                </div>
            </div>
        </div>
        <!---------------------------------------------------- Curl Target with Param ---------------------->
        <div class="col-md-5">
            <div class="box box-info">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="box-header" align="left">
                    <i class="fa fa-external-link"></i>
                    <h3 class="box-title">Curl Target Form</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <!--<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div>
                <?php
                if(isset($_POST['submit']))
                {
                    $uri_target = $_POST['btn-uri-target'];
                    exec("/bin/bash /home/hary/hit_target.sh $uri_target");
                    //$see = "/bin/bash /home/hary/hit_target.sh $uri_target";
                    //echo $uri_target;
                    ?>
                    <script>
                        setTimeout(function() {
                            alert('URI has been hit !!');
                        }, 2000);
                    </script>
                    <?php
                }
                else
                {
                    ?>
                    <!--<script>
                        setTimeout(function() {
                            alert('Hit failed');
                        }, 3000);
                    </script>-->
                    <?php
                }
                ?>
                <div class="col-xs-7" align="left">
                    <span class="label label-danger">Input URI Target</span>
                    <input type="text" class="form-control" name="btn-uri-target" placeholder="Input Target Here" id="btn-uri-target">
                </div>
                <div class="col-xs-3">
                        <br>
                        <button class="btn btn-sm btn-info btn-flat pull-center" type="submit" name="submit" id="submit">Hit Target</button>
                    <!------------------------------OOOOOOO----------------------------------->
                    <br />
                </div>

                <div class="col-xs-1"></div>
                <div class="box-footer clearfix">
                    <!-- Emptying content of this tag make your box-info fit and proper -->
                </div>
                    </form>
            </div>
        </div>
    </div>

    <!---------------------------------------------------------------------------------------------------------------->
</section>
<!-------------------------------------------------------------------------------------------------------------------->
<?php
$this->load->view('template/js');
?>

<!--tambahkan custom js disini-->
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>

<!-- Don't care with above datepicker plugins -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQueryUI/jquery-ui.js') ?>" type="text/javascript"></script>
<!--------------------->

<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/chartjs/Chart.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard2.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>

<!--- for countdown --->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<link rel="stylesheet" type="text/css" href="http://localhost:81/template/css/jquery.countdown.css">
<script type="text/javascript" src="http://localhost:81/template/js/jquery.plugin.js"></script>
<script type="text/javascript" src="http://localhost:81/template/js/jquery.countdown.js"></script>
<!--------------------->


<?php
$this->load->view('template/foot');
?>

