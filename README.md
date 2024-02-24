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

### Criar Migration Tabela Pivot (Relacionamento N:N)
> colocar nome das tabelas já criadas em order alfabética
- php artisan make:migration create_category_event_table

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

### Exemplo Definindo namaspace
- namespace App\Models;

### Exemplo buscando um dado
- $e = Event::find(1);

### Exemplo salvando dados em uma relação N:N
- $e->categories()->attach([1, 2, 3]);

### Exemplo deletando dados em uma relação N:N
- $e->categories()->detach([1]);

### Exemplo sync (substitui o dado)
- $e->categories()->sync([1]);

### Exemplo toggle
> *verifica se o parâmetro passado no array está inserido na base.  
> Se estiver inserido, ele destrói/delta a relação.  
> Se estiver não inserido, ele cria/insere a relação.  
- $e->categories()->sync([1]);

## Seeder
- php artisan db:seed
- php artisan make:seeder

## Factory
- php artisan make:factory 