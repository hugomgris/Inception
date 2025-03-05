FROM debian:buster

RUN apt update -y && apt install php-fpm php-mysql -y && apt install curl -y

COPY tools/wp.sh /
COPY tools/wp-config.php /

RUN chmod +x /wp.sh

CMD [ "/wp.sh" ]
