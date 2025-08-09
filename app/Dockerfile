FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt update && \
    apt install -y apache2 php libapache2-mod-php php-mysqli openssh-server sudo mariadb-client && \
    apt clean

RUN useradd -m john && \
    echo 'john:john123' | chpasswd && \
    echo 'john ALL=(ALL) NOPASSWD: /bin/cp' >> /etc/sudoers && \
    chsh -s /bin/bash john

RUN mkdir -p /var/www/html && chown -R www-data:www-data /var/www/html && \
    mkdir /var/run/sshd

COPY init.sh /init.sh
RUN chmod +x /init.sh

EXPOSE 80 22
CMD ["/init.sh"]
