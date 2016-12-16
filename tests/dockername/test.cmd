cd  %~pd0
docker-compose up -d

ping 127.0.0.1 -n 6 > nul

docker ps -a