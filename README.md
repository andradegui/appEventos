# meusEventos

- `Laravel v8`
- `PHP v7.4`
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
- php artisan route:listj

## Migrations

- php artisan migrate:install
- php artisan migrate

### Criar Migration
- php artisan make:migration create_
- php artisan migrate:status

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