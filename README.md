# Controle de séries

Sistema para controlar os episódios assistidos de cada temporada de uma série.

## Ambiente necessário

Para rodar este sistema, é necessário ter instalado:

- Composer
- PHP >= 7.3.0
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
    - Ctype PHP Extension
    - JSON PHP Extension
    - BCMath PHP Extension
    
## Docker

Para facilitar a configuração, o Docker pode ser utilizado, fazendo uso do Dockerfile na raiz deste projeto.

## Iniciar o sistema

Tendo garantido que o ambiente está pronto, basta executar os seguintes comandos para preparar e rodar o sistema:

- `docker built -t php-laravel .` (para "buildar" a imagem do PHP)
- `docker run --rm -it -v $(pwd):/app -w /app -u $(id -u):$(id -g) composer install` (apenas na primeira vez, para instalar as dependências)
- `touch database/database.sqlite` (para criar o arquivo do banco SQLite)
- `docker run --rm -v $(pwd):/app -w /app -it -u $(id -u):$(id -g) php-laravel php artisan key:generate` (para gerar a chave de criptografia do Laravel)
- `docker run --rm -v $(pwd):/app -w /app -it -u $(id -u):$(id -g) php-laravel php artisan migrate` (para configurar o schema do banco)
- `docker run --rm -v $(pwd):/app -w /app -it -u $(id -u):$(id -g) php-laravel php ./vendor/bin/phpunit` (para rodar os testes)
- `docker run --rm -v $(pwd):/app -w /app -it -p 8000:8000 php-laravel php artisan serve --host=0.0.0.0 --port=8000` (para subir o servidor)

Após rodar estes comandos, você deve poder acessar o sistema em seu navegador através da URL http://localhost:8000
