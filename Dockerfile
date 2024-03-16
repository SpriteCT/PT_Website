FROM ubuntu:latest

ENV TZ=Europe/London
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql

COPY . /var/www/html

RUN a2enmod rewrite

EXPOSE  80
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN echo "CustomLog /dev/stdout combined" >> /etc/apache2/apache2.conf
RUN echo "ErrorLog  /dev/stderr" >> /etc/apache2/apache2.conf


CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
