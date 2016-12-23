#!/bin/bash

wkt=`date +"%m-%d-%y"`
yearNow=`date +"%y"`;

dir='/var/www/html/repoImage/';

cd $dir;
nohup curl http://localhost:81/attach.php &

sleep 10

cd $dir;
file=`ls -latr | grep zip | awk '{print $9}' | tail -1`
mkdir -p $dir/$wkt
mv $file $dir/$wkt
cd $dir/$wkt
unzip $file
cat full_list*/* >> $dir/$wkt/target-$wkt.txt

#### Cron Only #####
cat $dir/*-$yearNow/target-* >> $dir/warehouse_list/warehouse.txt
