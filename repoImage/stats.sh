#!/bin/bash
tgldash=`date +"%Y-%m-%d"`

target='/var/www/html/repoImage/repo_list/'

success=`cat $target/warehouse.txt | sort -u | wc -l`
total=`cat $target/warehouse.txt | wc -l`

echo "Stats for today $tgldash";
echo "Total success unique of Hit      : $success";
echo "Total of Hit 		       : $total";
