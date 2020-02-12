FROM php:7.4-cli

RUN apt-get update && apt-get install -y libxml2-dev libzip-dev libonig-dev libnss3 libx11-dev
RUN docker-php-ext-install mbstring tokenizer xml ctype bcmath zip
