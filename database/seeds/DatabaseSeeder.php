<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        /*factory(App\Models\User::class,4)->create();
        factory(App\Models\Region::class,4)->create();
        factory(App\Models\Proyecto::class, 10)->create();
        factory(App\Models\Gerente::class,10)->create();
        factory(App\Models\Operacion::class,1000)->create();*/
        //$this->call(CreateDefaultUsersSeeder::class);
        //$this->call(OperacionDetTableSeeder::class);
        $this->call(OperacionHistoricoTableSeeder::class);

    }
}
