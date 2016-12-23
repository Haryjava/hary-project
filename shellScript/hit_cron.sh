#!/bin/bash

name=`mysql -hlocalhost -uroot -p'123456' stat -e "select uri from condt;" | grep -v uri`
check=`mysql -hlocalhost -uroot -p'123456' stat -e "select status from condt;" | grep -v status`

if [[ $check -eq "0" ]];
then
	exit;
else
	echo "Schedule Run .. " >> /var/www/html/regresilinier/regresilinier/application/views/result/2016090212223217449-be.txt
	/home/hary/hit_cron_target.sh $name
fi
