FROM openjdk:latest
COPY deb.list /etc/apt/sources.list
COPY / /root/

#版本号
RUN echo "v@"$(date +%Y%m%d%H%M%S) >/v
RUN     cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
        && rm -f /etc/apt/sources.list.d/* \
        && cd /root/ && tar -xzf /root/kafka_2.10-0.10.1.0.tgz  && mv /root/kafka_2.10-0.10.1.0 /usr/local/kafka

EXPOSE 9092

CMD cd /usr/local/kafka &&  bin/zookeeper-server-start.sh config/zookeeper.properties && bin/kafka-server-start.sh config/server.properties

#清理掉中间过程文件
RUN     apt-get clean \
        && rm -rf /var/lib/apt/lists/*
