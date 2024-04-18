<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10) // Crio 10 usuários
            ->has(
                Event::factory(5) // Cada usuário terá 30 eventos
                    ->hasPhotos(4) // Cada evento terá 4 fotos
                    ->hasCategories(3) // Cada evento terá 3 categorias
                )
            ->hasProfile() // Cada usuário terá 1 perfil
            ->create();
         

    }
}
