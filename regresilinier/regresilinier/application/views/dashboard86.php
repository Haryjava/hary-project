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

<!-- Just for fun with font awesome -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!------------------------------------>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        tester : <i class="fa fa-windows" aria-hidden="true"></i> MultiBot Simulation
        <small>Display</small><br>
    </h1>
    <ol class="breadcrumb">
        <li><a href="http://localhost/dashboard5"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <script>
        $(document).ready(function(){
            var i = $('input').size() + 1;
            $('#add').click(function(){
                //$('<div><input type="text" class="field" name="dynamic[]" value="' + i + '"/></div>').fadeIn('slow').appendTo('.inputs');
                $('<div><input type="text" class="field" name="dynamic[]" style="width: 23%" "/></div><br>').fadeIn('slow').appendTo('.inputs');
                i++;
            });
            $('#remove').click(function(){
                if(i > 1){
                    $('.field:last').remove();
                    i--;
                }
            });
            $('#reset').click(function(){
                while(i > 2){
                    $('.field:last').remove();
                    i--;
                }
            });
            $('.submit').click(function(){
                var answer = [];
                $.each($('.field'), function(){
                    answer.push($(this).val());
                });

                if(answer.length == 0){
                    answer = "none";
                }

                alert(answer);
                return false;
            });
        });
    </script>
    <div class="dynamic-form">
        <a href="#" id="add">Add</a> | <a href="#" id="remove">Remove</a> | <a href="#" id="reset">Reset</a>
        <form>
            <div class="inputs">
                <div><input type="text" name="dynamic[]" class="field" value="" placeholder="Input uri here.." style="width: 23%"/></div><br>
            </div>
            <input name="submit" type="button" class="submit" value="Hit it/ them !!">
        </form>
    </div>

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


<?php
$this->load->view('template/foot');
?>


