FROM php:7.2.2-fpm
RUN apt-get update && apt-get install -y mysql-client --no-install-recommends \
 && docker-php-ext-install pdo_mysql

ARG INSTALL_EXIF=false
RUN if [ ${INSTALL_EXIF} = true ]; then \
    # Enable Exif PHP extentions requirements
    docker-php-ext-install exif && \
     docker-php-ext-enable exif \
;fi