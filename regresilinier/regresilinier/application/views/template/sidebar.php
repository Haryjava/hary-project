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
<!-- Just for fun with font awesome -->
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!------------------------------------>

<aside class="main-sidebar">
    <section class="sidebar">
        <form action="#" method="POST" class="sidebar-form">
            <?php
            if(isset($_POST['imaging']))
            {
                $uri = $_POST['uri'];
                $schedule = $_POST['schedule'];
                exec("/bin/bash /home/hary/hit_target.sh $uri_target 2>&1");
                ?>
                <script>
                    setTimeout(function() {
                        alert('Congrats, cron has been setup !!');
                    }, 2000);
                </script>
                <?php
            }
            else
            {
                ?>
                <!--<script>
                    setTimeout(function() {
                        alert('Both of field cannot be empty');
                    }, 2000);
                </script>-->
                <?php
            }
            ?>
        <div class="user-panel">
            <div class="pull-left image">
                <img src="http://localhost:83/user2-160x160.JPG" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
        <!------------------------ Current Status ------------------------------------------------------>
		<p>Current Status</p>
                <!--<script>
                    $(document).ready(function(){
                        $("button").click(function(){
                            $("#p1").css("color", "red")
                        });
                    });
                </script>
                <p id="p1"><i class="fa fa-circle" aria-hidden="true"></i> Inactive (stop)</p>-->
                <?php
                    header("Cache-Control: no-cache");
                    header("Pragma: no-cache");
                    $conn = mysqli_connect('localhost', 'root', '123456', 'stat');

                    if (!$conn) {
                        echo "Error: Unable to connect to MySQL." . PHP_EOL;
                        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                        exit;
                    }
                    $query = "SELECT status from condt where id='1'";
                    $sql = mysqli_query($conn, $query);
                    while($hasil= mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                        $popl = $hasil['status'];
                        if($popl == '1'){?>
                            <font color="#7cfc00"><i class="fa fa-circle" aria-hidden="true"></i> Active (running)</font>
                <?php
                        }else{?>
                            <font color="red"><i class="fa fa-circle" aria-hidden="true"></i> Inactive (stop)</font>
                <?php
                        }
                    }

                ?>
            </div>
        <!---------------------------------------------------------------------------------------------->
        </div>
            <?php
                require_once "/var/www/html/repoImage/stat.php";
            ?>

            <?php
                header("Cache-Control: no-cache");
                header("Pragma: no-cache");
                $conn = mysqli_connect('localhost', 'root', '123456', 'stat');

                if (!$conn) {
                    echo "Error: Unable to connect to MySQL." . PHP_EOL;
                    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                    exit;
                }

                if(isset($_POST['submit'])){
                    $uri = $_POST['uri'];
                    $schedule = $_POST['schedule'];
                    if(empty($uri) || empty($schedule)) {
                        echo "One of field cannot be empty !!";
                        header('Location: http://localhost/index.php/dashboard5');
                        /*echo "<script>
                            alert('One of both field cannot be empty !!');
                        </script>";*/
                    }else{
                        $query = "UPDATE condt set uri='$uri',nilai='$schedule' where id='1'";
                        $sql = mysqli_query($conn, $query);
                        // Preventing re-submit in form action
                        header('Location: http://localhost/index.php/dashboard5');
                    }
                }elseif(isset($_POST['button1'])){
                    $enable = $_POST['enable'];
                    $query = "UPDATE condt set status='$enable' where id='1'";
                    mysqli_query($conn, $query);
                    // Preventing re-submit in form action
                    header('Location: http://localhost/index.php/dashboard5');
                }elseif(isset($_POST['button2'])){
                    $disable = $_POST['disable'];
                    $query = "UPDATE condt set status='$disable' where id='1'";
                    mysqli_query($conn, $query);
                    // Preventing re-submit in form action
                    header('Location: http://localhost/index.php/dashboard5');
                }
                mysqli_close($conn);
            ?>
        <form method="post" action="">
            <div class="input-group">
                <input type="text" name="uri" class="form-control" placeholder="URI Destination..." style="width:130%;"/>
                <span class="input-group-btn">
                    <!--<button class="btn btn-flat"><i class="fa fa-search"></i></button>-->
                </span>
            </div>
            <br>
            <div class="input-group">
                <input type="text" name="schedule" class="form-control" placeholder="Time Schedule per N Hour .." style="width:130%;"/>
                <span class="input-group-btn">
                    <!--<button class="btn btn-flat"><i class="fa fa-hourglass-start aria-hidden="true""></i></button>-->
                </span>
            </div>
            <br>
            <div class="span9 btn-block">
                <span class="input-group-btn">
                    <button name="submit" id="submit" class="btn btn-default" style="display: block; width: 100%;">Set Schedule</button>
                </span>
            </div>
        <!--</form>-->
            <!--</form>-->
        <!----------------------------------------------------- Gagalkan form disini -------------------------------------------------------->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog fa-spin fa-1x fa-fw"></i> <span>Service Action </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <input type="hidden" name="enable" value='1'/>
                    <button id="button1" name="button1" class="btn btn-primary btn-md" value="enable">enable</button>
                    <input type="hidden" name="disable" value='0'/>
                    <button id="button2" name="button2" class="btn btn-primary btn-md" value="disable">disable</button>
                </ul>
            </li>
        </form>
                <li class="treeview">
                    <a href="<?php echo site_url('dashboard5') ?>"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Hit Bot Simulation </a>
                </li>
                <li class="treeview">
                    <a href="<?php echo site_url('dashboard86') ?>"><i class="fa fa-sitemap" aria-hidden="true"></i> Multi Bot Form </a>
                </li>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

