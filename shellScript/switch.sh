#!/bin/bash

#testTime=`date +"%H:%m:%S"`
testTime=`date | awk '{print $4}'`

domain=`mysql -hlocalhost -uroot -p'123456' stat -e "select uri from condt;" | grep -v uri`
timing=`mysql -hlocalhost -uroot -p'123456' stat -e "select nilai from condt;" | grep -v nilai`
look=`cat /var/spool/cron/crontabs/root | grep hit_cron | awk '{print $2}' | sed -e 's/\///g'`; 
numb=`ps aux | grep "curl -A" | grep -v grep | awk '{print $27}' | wc -l`
list=`ps aux | grep "curl -A" | grep -v grep | awk '{print $27}' | awk -F ':' '{print $1}' | tail -1`

sed -i 's/1 \*\/'$look'/1 \*\/'$timing'/g' /var/spool/cron/crontabs/root


###  Testing Only for a moment !!!! ####
if [[ $numb -eq "" ]];
then
	echo "$testTime Rebuilt to url:$domain - - [NULL: waiting]" >> /var/www/html/regresilinier/regresilinier/application/views/result/realtime.txt
else
	echo "$testTime Rebuilt to url:$domain - - [$list]" >> /var/www/html/regresilinier/regresilinier/application/views/result/realtime.txt
fi
