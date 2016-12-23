#!/bin/bash

#dateNow=`date +"%Y%m%d"`
#dst='/var/www/html/repoImage';
#cat /$dst/$dateNow-getHere.txt | grep 'to:' | awk '{print $5}' | sed -e 's/\///g' >> /$dst/$dateNow-target.txt

#IP=`cat /$dst/$dateNow-target.txt`

############################################

dateNow=`date +"%m-%d-%y"`;
src='/var/www/html/repoImage/';
dos2unix $src/$dateNow/target-$dateNow.txt;

for i in $(cat $src/$dateNow/target-$dateNow.txt);
do
	IP=`echo $i`
	#Tes :
	#see="curl -x $i $1 ";
	#echo $IP;
	nohup curl -A "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.112 Safari/534.30" --proxy $IP $1 &
done
