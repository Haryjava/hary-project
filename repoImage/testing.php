<?php
//echo "<meta http-equiv='refresh' content='1'>";
echo "
<head>
<script type='text/JavaScript'>
function timedRefresh(timeoutPeriod) {
	setTimeout('location.reload(true);',timeoutPeriod);
}
</script>
</head>";

echo "<body onload='JavaScript:timedRefresh(1000);'>";

#$directory='/var/www/html/regresilinier/regresilinier/application/views/result/';
#$inform = exec('ls -latr /var/www/html/regresilinier/regresilinier/application/views/result/realtime.txt | grep \'.txt\' | tail -1 | awk \'{print $9}\'');
$inform = exec('ls -latr /var/www/html/regresilinier/regresilinier/application/views/result/realtime.txt | awk \'{print $9}\'');
$display = file("$inform");


//$timePoint = date("YmdHis");
//echo $timePoint;


for ($i = max(0, count($display)-11); $i < count($display); $i++) {
  echo "<font color='lime'><pre>".$display[$i]."</pre></font>";
}

//echo "<font color='lime'><pre>".$display."</pre></font>";
