sudo docker build -t ap-php-server .
echo "Container built"
sudo docker images ls
sudo docker run -d -p 8080:80 -v ./www:/var/www/html --name running-server ap-php-server:latest
echo "Container is running"
sudo docker exec -i running-server mysql -uroot -ppassword mysql < dump.sql
