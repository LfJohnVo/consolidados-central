<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CreateDefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            'name'              => 'john',
            'email'             => 'john@gmail.com',
            'password'          => Hash::make('Administrador1'),
            'email_verified_at' => Carbon::now(),
        ];

        /** @var User $user */
        User::create($input);
    }
}
