FROM wordpress:6.4-php8.2-apache

# Instalacja zależności systemowych (np. git, unzip)
RUN apt-get update && apt-get install -y \
    less \
    unzip \
    nano \
    && rm -rf /var/lib/apt/lists/*

# Ustawienia PHP (opcjonalnie)
# COPY custom-php.ini /usr/local/etc/php/conf.d/

# Kopiuj motyw do katalogu WordPressa
COPY . /var/www/html/wp-content/themes/bieszczady-draft

# Ustaw domyślny motyw
ENV WORDPRESS_CONFIG_EXTRA="define('WP_DEFAULT_THEME', 'bieszczady-draft');"
