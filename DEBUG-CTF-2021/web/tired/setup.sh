sudo docker-compose up -d
sleep 10
sudo docker exec -i race-condition_mysql_1 mysql -u root -pexample < ./setup.sql
