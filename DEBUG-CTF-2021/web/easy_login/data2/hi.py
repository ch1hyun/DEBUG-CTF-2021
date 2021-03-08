import os
os.system('sudo winpty docker exec -it apm_to_docker-compose-master_mysql_1 bash;mysql -u root -p db_root_password < ./Dump20210206.sql')
