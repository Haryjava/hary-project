#!/bin/bash

dateNow=`date +"%Y%m%d"`
target='/var/www/html/repoImage/repo_list/'
dst='/var/www/html/repoImage';

# Generate files into /var/www/html/repoImages/$date-getHere.txt in order link can be downloaded
###src='/var/www/html/regresilinier/regresilinier/application/views/result';
####grep -B 9 -A 9 'HTTP/1.1 200 OK' $src/$dateNow* > $dst/$dateNow-getHere.txt

cat $target/warehouse.txt | sort -u > $dst/$dateNow-getHere.txt
