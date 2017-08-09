<?php

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
        factory(App\User::class,5)->create();
        
         DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.fr',
                'password' => Hash::make('admin')
            ],
        ]);
    }
}