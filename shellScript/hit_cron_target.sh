#!/bin/bash

src='/var/www/html/repoImage/';
target='/var/www/html/repoImage/repo_list/'

for i in $(cat $target/warehouse.txt);
do
	IP=`echo $i`
	#Tes :
	#see="curl -x $i $1 ";
	#echo $IP;
	nohup curl -A "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.112 Safari/534.30" --proxy $IP $1 &
done
