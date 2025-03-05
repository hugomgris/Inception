#Debian image
FROM debian:bullseye

#Installation of necessary packages
RUN apt update && apt install -y nginx openssl

#Creation of necessary directories for SSL
RUN mkdir -p /etc/nginx/ssl

#Generation of self-signed SSL certificate
RUN openssl req -x509 -nodes -out /etc/nginx/ssl/inception.crt -keyout /etc/nginx/ssl/inception.key -subj "/C=ES/ST=Catalunya/L=Barcelona/O=42/OU=42/CN=hmunoz-g.42.fr/UID=hmunoz-g"

#Copy custom Nginx conf file
COPY conf/nginx.conf /etc/nginx/nginx.conf

#Expose ports
EXPOSE 443

#Command to run Nginx in foreground
CMD ["nginx", "-g", "daemon off;"]
