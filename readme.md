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

## Iniciar o sistema

Tendo garantido que o ambiente está pronto, basta executar os seguintes comandos para preparar e rodar o sistema:

- `composer install` (apenas na primeira vez, para instalar as dependências)
- `php artisan serve` (para subir o servidor)

Após rodar este comando, você deve poder acessar o sistema em seu navegador através da URL http://localhost:8000