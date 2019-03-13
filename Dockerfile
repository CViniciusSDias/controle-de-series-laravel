FROM php:7.3-cli

RUN apt-get update && apt-get install -y libxml2-dev libzip-dev
RUN docker-php-ext-install mbstring tokenizer xml ctype bcmath zip