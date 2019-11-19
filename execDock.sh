sudo docker build -t ap-php-server .
echo "Container built"
sudo docker images ls
sudo docker run -d -p 8080:80 -v $HOME/Mobility/www:/var/www/html --name running-server ap-php-server:latest
echo "Container is running"
#sudo docker exec running-server bash -c "chmod 777 /var/run/mysqld/mysqld.sock"
sudo docker exec running-server bash -c "echo 'd /var/run/mysqld 0755 mysql mysql -' > /etc/tmpfiles.d/mysql.conf"
cat dump.sql | sudo docker exec -i running-server /usr/bin/mysql -uroot  mysql
