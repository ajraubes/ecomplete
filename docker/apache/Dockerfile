FROM httpd:2.4-alpine

RUN apk update \
    && apk upgrade \
    && apk add --no-cache bash

# Copy apache vhost file to proxy php requests to php-fpm container
COPY httpd.conf /usr/local/apache2/conf/ecomplete.httpd.conf
RUN echo "Include /usr/local/apache2/conf/ecomplete.httpd.conf" \
    >> /usr/local/apache2/conf/httpd.conf

EXPOSE 80 443

WORKDIR /usr/local/apache2
