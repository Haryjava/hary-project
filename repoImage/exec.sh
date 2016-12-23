#!/bin/bash

latest='/var/www/html/repoImage';
src='/var/www/html/regresilinier/regresilinier/application/views/uploads';
dst='/var/www/html/regresilinier/regresilinier/application/views/result';
file=`ls -latr $src | awk '{print $9}' | grep '.txt' | tail -1`;
name=`ls -latr $src | awk '{print $9}' | grep '.txt' | tail -1 | sed -e 's/.txt//g'`;

#Make sure that format was supported
dos2unix $src/$file;
check=`ps aux | grep curl| grep -v grep | wc -l`

if [[ $check -eq "0" ]];
then
    for i in $(cat $src/$file);
    do
            nohup curl -Ivs $i >> $dst/$name.txt 2>&1 &
    done
else
    exit;
fi
