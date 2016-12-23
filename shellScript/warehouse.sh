#!/bin/bash

wkt=`date +"%y"`
time1=`date +"%H"`

tgl=`date +"%m-%d-%y"`
yearNow=`date +"%y"`;

dir='/var/www/html/repoImage/';
repo='/var/www/html/repoImage/repo_list/';

######################################################
############### Collecting Lists #####################

if [[ $time1 -eq "23" ]];
then
	cat $dir/*-$wkt/full*/* >> $repo/warehouse.txt
	dos2unix $repo/warehouse.txt
elif [[ $time1 -eq "14" ]];
then
	cd $dir;
	nohup curl http://localhost:81/attach.php &

	sleep 10

	cd $dir;
	file=`ls -latr | grep zip | awk '{print $9}' | tail -1`
	mkdir -p $dir/$tgl
	mv $file $dir/$tgl
	cd $dir/$tgl
	unzip $file
	cat full_list*/* >> $dir/$tgl/target-$tgl.txt

#### Cron Only #####
	cat $dir/*-$yearNow/target-* >> $dir/warehouse_list/warehouse.txt

else
	echo 'Waiting.. ' >> /tmp/checking.log
fi
