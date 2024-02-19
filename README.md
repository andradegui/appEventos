# meusEventos

- PHP 7.4
- MySQL

## Quando iniciar o projeto em uma outra máquina
- composer install
- php artisan key:generate
- criar BD marketplace
- php artisan migrate
- rodar seeders

## Subir servidor
- php artisan serve

## Migrations

- php artisan migrate:install
- php artisan migrate

### Criar Migration
- php artisan make:migration create_
- php artisan migrate:status

### Recriar Migration
- php artisan migrate:fresh

### Fazer DUMP do banco de dados
- php artisan schema:dump

## Models
- php artisan make:model *Event* 

### Criar Model c/ Migration
- php artisan make:model Profile -m

## Controller
- php artisan make:controller *NomeController*

## Tinker
- php artisan tinker

## Seeder
- php artisan db:seed
- php artisan make:seeder

## Factory
- php artisan make:factory 