# meusEventos

- `Laravel v8`
- `PHP v8.2`
- `MySQL`
- `Bootstrap v4.5`

## Quando iniciar o projeto em uma outra máquina
- composer install
- php artisan key:generate
- criar BD marketplace
- php artisan migrate
- rodar seeders

## Subir servidor
- php artisan serve

## Listar Rotas
- php artisan route:list

> Filtrar rotas da aplicação
- php artisan route:list --name=events.

## Migrations

- php artisan migrate:install
- php artisan migrate

### Criar Migration
- php artisan make:migration create_
- php artisan migrate:status

#### Criar Migrations junto com as Seeder
- php artisan migrate:refresh --seed

### Editar Migration
- php artisan make:migration edit_profiles_table --table=profiles

### Criar migration tabela pivot (Relacionamento N:N)
> Colocar nome das tabelas já criadas em order alfabética
- php artisan make:migration create_category_event_table

### Recriar migration sem dados
- php artisan migrate:fresh

### Fazer DUMP do banco de dados
- php artisan schema:dump

## Models
- php artisan make:model *Event* 

### Criar Model c/ Migration
- php artisan make:model Profile -m

## Controller
- php artisan make:controller *NomeController*

>Cria  a controller com todos os métodos necessários 
- php artisan make:controller *NomeController* -r

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
> Verifica se o parâmetro passado no array está inserido na base.  
> Se estiver inserido, ele destrói/delta a relação.  
> Se estiver não inserido, ele cria/insere a relação.  
- $e->categories()->sync([1]);  

### Exemplo criando dados utilizando Factory
- Photo::factory()->make();  

### Exemplo criando dados utilizando Factory com relacionamento HasOne (1:1)
- User::factory(3)->hasProfile()->create();

### Exemplo criando dados utilizando Factory com relacionamento HasMany (1:N)
- Event::factory()->has(Photo::factory(3))->create();
> ou  
- Event::factory(3)->hasPhotos(3)->create();

### Exemplo criando dados utilizando Factory com relacionamento BelongsTo (partindo do Profile)
- Profile::factory()->forUser()->create();

## Seeder
- php artisan db:seed
- php artisan make:seeder

## Factory
- php artisan make:factory 

## Colocando autenticação na aplicação
- composer require laravel/ui
- php artisan ui: bootstrap --auth
- npm i 
- npm run dev

> verificar se irá carregar as telas
- http://127.0.0.1:8000/login
- http://127.0.0.1:8000/register

## Configuração p/ mascara de data
- npm i inputmask -D

- em resources\js\bootstrap.js

```
/**
 * Inputmask
 */

var Inputmask = require('inputmask');

```
- npm run dev

## P/ fazer imagens aparecer
- php artisan storage:link
