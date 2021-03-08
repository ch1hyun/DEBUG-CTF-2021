#!/bin/bash
sudo docker-compose build;sudo docker-compose up -d
sleep 10
sudo docker exec -i easy_login_mysql_1 mysql -u root -pexample < ./setup.sql
