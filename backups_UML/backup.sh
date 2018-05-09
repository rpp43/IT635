#!/bin/bash
LOGDATE=$(date +"%Y_%m_%d_%I_%M_%p")
mysqldump -uroot -pHitachi --all-databases --master-data > /root/backup/db$LOGDATE.sql

