docker build -t ap-php-server .
docker run -d --name running-server ap-php-server
docker exec -i ap-php-server mysql -uuser -ppassword name_db < dump.sql
