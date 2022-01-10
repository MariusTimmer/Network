FROM    php:apache

LABEL   version="0.1" \
        description="A simple version of a social network written in PHP. " \
        author="Marius Timmer <admin@mariustimmer.de>" \
        org.opencontainers.image.authors="admin@mariustimmer.de" \
        org.opencontainers.image.url="https://github.com/MariusTImmer/Network" \
        org.opencontainers.image.version="0.1" \
        org.opencontainers.image.vendor="Marius Timmer" \
        org.opencontainers.image.licenses="GPL-3.0" \
        org.opencontainers.image.title="Network" \
        org.opencontainers.image.description="A simple version of a social network written in PHP. "

# Copy the application into the container
COPY    ./ /var/www/

# Let the html directory point to our htdocs directory
RUN     rm -rf /var/www/html && \
        ln -s /var/www/htdocs /var/www/html

# Install requred PHP extensions
RUN     docker-php-ext-install gettext
