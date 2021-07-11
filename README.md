# Centro Virtual de Daimoku

## Estrutura

Esse é um projeto Laravel/PHP com algumas mudanças na estrutura de pastas para acomodar no servidor hostinger onde ele está hospedado.

Pastas:

- `daimoku`: pasta raiz do projeto Laravel

- `public_html\daimoku`: pasta pública do apache

## Setup local:

Criar link simbólico dentro da pasta raiz, apontando para pasta pública:

		$ cd daimoku
		$ ln -s ../public_html/daimoku public

Rodar servidor sem apache:

		$ cd daimoku
		$ php artisan serve --host 0.0.0.0

Rodar agendador:

		$ php artisan schedule:work

## Deploy

Instalação:

		$ git clone
		$ cd daimoku
		$ ln -s ../public_html/daimoku public
		$ composer install
		$ npm install

Publicar a pasta `public_html/daimoku` no apache.

Colocar o seguinte comando num cronjob:

		php artisan schedule:run

## Versão publicada

Acesse em: https://andredsp.tech/daimoku

