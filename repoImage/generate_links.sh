#!/bin/bash

#dateNow=`date -d '1 day ago' +"%Y%m%d"`
dateNow=`date +"%Y%m%d"`
# Generate files into /var/www/html/repoImages/$date-getHere.txt in order link can be downloaded
src='/var/www/html/regresilinier/regresilinier/application/views/result';
dst='/var/www/html/repoImage';
grep -B 9 -A 9 'HTTP/1.1 200 OK' $src/$dateNow* > $dst/$dateNow-getHere.txt