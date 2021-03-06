cd %~dp0
chcp 65001
docker build -t docker-kafka:latest .

docker rm -f kafka-test
docker run -d -p 9092:9092 --name kafka-test docker-kafka:latest
docker ps -a
docker exec kafka-test ps aux

docker commit kafka-test docker-kafka:latest