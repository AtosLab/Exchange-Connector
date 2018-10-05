FROM ubuntu:16.04

# Perform an update and install packages
RUN apt-get update && apt-get install -y \
    apache2 \
    apache2-bin \
    php \
    language-pack-en-base \
    libapache2-mod-wsgi-py3 \
    libffi-dev \
    libpq-dev \
    libssl-dev \
    libapache2-mod-php7.0 \
    php7.0-xml \
    php7.0-mcrypt \
    php7.0-gd \
    php7.0-curl \
    php7.0-dev \
    postgresql \
    postgresql-contrib \
    python3-dev \
    python3-setuptools \
    python3-pip nano \
    php-pgsql \
    bash \
 && rm -rf /var/lib/apt/lists/*

RUN pip3 install requests
RUN pip3 install psycopg2

USER postgres

RUN    /etc/init.d/postgresql start &&\
    psql --command "CREATE USER test WITH SUPERUSER PASSWORD 'test';"

USER root
#copy source code
COPY exchange /var/www/html/exchange
COPY python_insert /var/www/html/python_insert
COPY agent.sh /var/www/html/

#RUN python3 /var/www/html/python_insert/insert.py
CMD service apache2 start

EXPOSE 80 8000 5432
